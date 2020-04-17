<?php
Namespace Core\Views\Modules;

/**
 *
 */
class Compiler
{

  function __construct()
  {
    // code...
  }

  static function compile($model)
  {

    //RENDER TEMPLATE HEADER
    echo '
    <!doctype html>
    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    ';

    foreach($model->template->externalCss as $extCss){
      echo "<link rel='stylesheet' href='".$extCss."' />";
    }

    echo'
    </head>
    <body>
    <div class="container-fluid">
    ';

    //RENDER VIEW ELEMENTS
    foreach($model->elements as $rows){

      echo'
      <div class="row">
      ';


      foreach($rows as $col){

        echo '
        <div class="col p-2">
        ';
        
        foreach($col as $element){

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
        
        echo'
        </div>
        ';

      }

      echo'
      </div>
      ';

    }

    echo '
    </div>
    ';
    
    foreach($model->template->externalJs as $extJs){
      echo "<script src='".$extJs."'></script>";
    }
    
    echo'
    </body>
    ';

  }

}

?>
