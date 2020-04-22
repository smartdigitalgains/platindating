<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class NewAffiliateSite
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "new";
    $this->label = "Neue Affiliate Seite anlegen";
  }

  public function route()
  {
  
    (new \Core\Compiler('\Core\Resources\Views\NewAffiliateSite'))->compile();

  }

}

?>
