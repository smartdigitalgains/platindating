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
      <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
          <div class="toast-header">
            <strong class="mr-auto">c0r3</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            '.$e.'
          </div>
        </div>
      </div>
      ';
    }
    unset($_SESSION['core']['forms']['validator']['errors']);
  }

}

?>
