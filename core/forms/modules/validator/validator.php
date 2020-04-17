<?php
Namespace Core\Forms\Modules;

/**
 *
 */
class Validator
{

  static $model;
  static $currentElement;
  static $errors;

  function __construct()
  {
  }

  static function finish($model){
    
    if($model->get('finishers')){

        foreach($model->get('finishers') as $finisher){
        
            $finisher->execute();
    
        }

    }

    return ((isset($_SESSION['core']['forms']['validator']['errors']) > 0) ? false : true);

  }

  static function validateRestrictions($model)
  {

    foreach($model->get('elements') as $element){

      if(isset($element->restrictions)){

        foreach($element->restrictions as $restriction){

          $data = (isset(($model->get('data'))['data'][$element->name]) ? ($model->get('data'))['data'][$element->name] : NULL);

          $restriction->execute($data, $element->label);

          unset($data);

        }

      }

    }

    return ((isset($_SESSION['core']['forms']['validator']['errors']) > 0) ? false : true);

  }

  static function errorInfo()
  {
    foreach($_SESSION['core']['forms']['validator']['errors'] as $e){
      
      echo'
      <script>
      $(document).ready(function(){
        $.toast({
          title: "c0r3",
          content: "'.$e.'",
          type: "info",
          delay: 5000
        });
      })
      </script>
      ';
    }
    
    unset($_SESSION['core']['forms']['validator']['errors']);
  }

}

?>
