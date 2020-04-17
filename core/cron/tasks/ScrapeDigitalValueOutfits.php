<?php
namespace Core\Cron\Tasks;

use Rct567\DomQuery\DomQuery as DomQuery;
use Core\Connection;
use Core\Utilities;

ini_set('max_execution_time', 0);
ini_set('memory_limit', '1G');
set_time_limit(0);

/**
 *
 */
class ScrapeDigitalValueOutfits
{

  protected $baseUrl = 'https://diva-srv.de';
  protected $scrapeSets =
  [
      [
        "startUrl" => '/toolz/overview.beta.php?kategorie=Outfits-Frauen&submit=Content+laden!',
        "gender" => 'women'
      ],
      [
        "startUrl" => '/toolz/overview.beta.php?kategorie=Outfits-Männer&submit=Content+laden!',
        "gender" => 'men'
      ]
  ];
  protected $html;
  protected $pagesToScrape = array();

  function execute()
  {

    foreach($this->scrapeSets as $scrapeSet){

      $this->loadPagesToScrape($scrapeSet['startUrl']);

      $i = 0;

      foreach($this->pagesToScrape as $page):

        $this->html = Utilities::curl($this->baseUrl.$page);

        $dom = new DomQuery($this->html);

        $elements = $dom->find('#manager-wrapper')->children();

        foreach($elements as $key => $element){

          $dom = new DomQuery($element->getOuterHtml());
          $set[$key]['asins'] = json_encode(explode(',' , $dom->find('.asininput')->text()), TRUE);
          $set[$key]['image_src'] = str_replace('http://diva-srv.de/toolz/php/otfcompress.php?url=', '', $dom->find('.outfit-img > a > img')->attr('src'));
          $set[$key]['image'] = implode('-', json_decode($set[$key]['asins'])).'.jpg';

          if (!file_exists(PATH.'/donwload/')) {
            echo $_SERVER['DOCUMENT_ROOT'].'/donwload/';
            mkdir(PATH.'/donwload/', 0777, true);
          }

          file_put_contents(PATH.'/donwload/'.$set[$key]['image'], file_get_contents($set[$key]['image_src']));

          if(!empty($set[$key]['image'])){

            $query = Connection::connect()->prepare("INSERT INTO s3v3r_outfits (img_org_src, img_src, type, asins) VALUES (:img_org_src, :img_src, :type, :asins)");

             $query->execute([
               "img_org_src" => $set[$key]['image_src'],
               "img_src" => $set[$key]['image'],
               "type" => $scrapeSet['gender'],
               "asins" => $set[$key]['asins']
             ]);

          }

        }

        unset($this->pagesToScrape);

        $i++;

      endforeach;

    }

  }

  protected function loadPagesToScrape($startUrl)
  {
    $this->html = Utilities::curl($this->baseUrl.$startUrl);

    $dom = new DomQuery($this->html);

    $links = $dom->find('.pagination')->children();

    foreach($links as $page){
       $dom  = new DomQuery($page->getOuterHtml());
       $this->pagesToScrape[] = $dom->attr('href');
    }

  }

}

 ?>
