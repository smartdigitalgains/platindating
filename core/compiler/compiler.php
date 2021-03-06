<?php
Namespace Core;

/**
 *
 */
class Compiler
{

  private static $model;

  function __construct()
  {
  }

  static function compile($model)
  {

    self::$model = new $model;

    //RENDER TEMPLATE HEADER
    echo '
    <!doctype html>
    <head lang="de">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    ';

    self::includeHeaderAssets();

    echo'
    </head>
    <body>
    ';

    if(isset(self::$model->navigation) && !empty(self::$model->navigation)){
      self::render(self::$model->navigation);
    }

    if(isset(self::$model->gridElements) && !empty(self::$model->gridElements)){

      foreach(self::$model->gridElements as $key => $container){


        echo '
        <div class="'.$container['class'].'">
        ';
  
        if(isset($container['rows']) && !empty($container['rows'])){

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

      }
  
      echo '</div>';
  
      }  

    }

    echo'
    </body>
    ';

    if(isset($_SESSION['core']['notification']) && !empty($_SESSION['core']['notification'])){
      \Core\Notification::notify('forms');
    }

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

    if(isset(self::$model->template->externalJs) && !empty(self::$model->template->externalJs)){
      foreach(self::$model->template->externalJs as $extJs){
        echo "<script src='".$extJs."'></script>";
      }  
    }

    if(isset(self::$model->template->internalJs) && !empty(self::$model->template->internalJs)){
      foreach(self::$model->template->internalJs as $extJs){
        echo "<script src='".$extJs."'></script>";
      }  
    }

    if(isset(self::$model->template->externalCss) && !empty(self::$model->template->externalCss)){
      foreach(self::$model->template->externalCss as $extCss){
        echo "<link rel='stylesheet' href='".$extCss."' />";
      }  
    }
    if(isset(self::$model->template->internalCss) && !empty(self::$model->template->internalCss)){
      foreach(self::$model->template->internalCss as $extCss){
        echo "<link rel='stylesheet' href='".$extCss."' />";
      }    
    }

  } 


}

?>
