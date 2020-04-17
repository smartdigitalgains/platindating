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

    print_r($model);

    foreach($model->elements as $element){

      $reflect = \Core\Utilities::reflect($element);

      switch($reflect['namespaceName']){

        case 'Core\Models\ViewElements':
          echo 'test';
          $element->render();
        break;

        case 'Core\Models\Forms':
          \Core\Forms\Controller::render($element);
        break;

      }

    }

  }

}

?>
