<?php
Namespace Core\Forms\Modules;
/**
 *
 */
class Messages
{


  function __construct()
  {
  }

  static function show()
  {
    if(!empty($_SESSION['core']['forms']['messages'])){
      foreach($_SESSION['core']['forms']['messages'] as $i){
        echo $i.'<br>';
      }

      unset($_SESSION['core']['forms']['messages']);

    }
  }

}

?>
