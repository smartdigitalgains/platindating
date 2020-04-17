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

  }

}

?>
