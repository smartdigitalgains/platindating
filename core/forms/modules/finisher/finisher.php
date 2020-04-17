<?php
Namespace Core\Forms\Modules;

/**
 *
 */
class Finisher
{

  static $model;
  static $currentElement;
  static $errors;

  function __construct()
  {
  }

  static function finish($model)
  {

    foreach($model->get('finishers') as $finisher){

        $finisher->execute();
  
    }  

    return ((isset($_SESSION['core']['forms']['finishers']['errors']) > 0) ? false : true);

  }

  static function errorInfo()
  {
      
    foreach($_SESSION['core']['forms']['finisher']['errors'] as $e){

      echo $e.'<br>';

    }

    unset($_SESSION['core']['forms']['finisher']['errors']);
  }

}

?>
