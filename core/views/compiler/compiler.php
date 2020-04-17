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
    <html>
    ';

    foreach($model->template->externalCss as $extCss){
      echo "<link rel='stylesheet' href='".$extCss."' />";
    }

    echo'
    </html>
    <body>
    ';


    //RENDER VIEW ELEMENTS
    foreach($model->elements as $element){

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

    echo '
    </body>
    ';

  }

}

?>
