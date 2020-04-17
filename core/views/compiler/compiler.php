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

    foreach($model->template->externalJs as $extJs){
      echo "<script src='".$extJs."'></script>";
    }
    foreach($model->template->internalJs as $extJs){
      echo "<script src='".$extJs."'></script>";
    }

    foreach($model->template->externalCss as $extCss){
      echo "<link rel='stylesheet' href='".$extCss."' />";
    }
    foreach($model->template->internalCss as $extCss){
      echo "<link rel='stylesheet' href='".$extCss."' />";
    }

    echo'
    </head>
    <body>
    ';

    foreach($model->topElements as $element){

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


    // print_r($model->gridElements);

    foreach($model->gridElements as $key => $container){


      echo '
      <div class="'.$container['class'].'">
      ';

      foreach($container['rows'] as $key => $row){

        echo '
        <div class="row '.$container['class'].'">
        ';


        foreach($row['cols'] as $key => $col){

          echo '
          <div class="col '.$container['class'].'">
          ';

          foreach($col['elements'] as $element){

            $reflect = \Core\Utilities::reflect($element);

            switch($reflect['namespaceName']){

              case 'Core\Resources\ViewElements':
                $element->render();
              break;

              case 'Core\Resources\Forms':
                \Core\Forms\Controller::render($element);
              break;

            }


          echo'
          </div>
          ';

        }

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

}

?>
