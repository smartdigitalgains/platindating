<?php
Namespace Core\Views\Modules;

/**
 *
 */
class Compiler
{

  private static $model;

  function __construct()
  {
    // code...
  }

  static function compile($model)
  {

    self::$model = $model;

    //RENDER TEMPLATE HEADER
    echo '
    <!doctype html>
    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    ';

    self::includeHeaderAssets();

    echo'
    </head>
    <body>
    ';

    self::render(self::$topElements);

    foreach(self::$gridElements as $key => $container){


      echo '
      <div class="'.$container['class'].'">
      ';

      foreach($container['rows'] as $key => $row){

        echo '
        <div class="row">
        ';

        foreach($row as $key => $col){

          echo '
          <div class="col '.$col['class'].'">
          ';

          self::render($col['elements']);

        echo'
        </div>
        ';

      }

      echo'
      </div>
      ';

    }

    echo '</div>';

    }


    echo'
    </body>
    ';

  }


  static function render($elements)
  {

    foreach($elements as $element){

      $reflect = \Core\Utilities::reflect($element);

      switch($reflect['namespaceName']){

        case 'Core\Resources\ViewElements':
          $element->render();
        break;

        case 'Core\Resources\Forms':
          \Core\Forms\Controller::render($element);
        break;

      }
    }

  }

  static function includeHeaderAssets()
  {
    foreach(self::$model->externalJs as $extJs){
      echo "<script src='".$extJs."'></script>";
    }
    foreach(self::$model->internalJs as $extJs){
      echo "<script src='".$extJs."'></script>";
    }

    foreach(self::$model->externalCss as $extCss){
      echo "<link rel='stylesheet' href='".$extCss."' />";
    }
    foreach(self::$model->internalCss as $extCss){
      echo "<link rel='stylesheet' href='".$extCss."' />";
    }
  } 


}

?>
