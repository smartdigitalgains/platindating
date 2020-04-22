<?php
Namespace Core\Resources\Restrictions;

/**
 *
 */
class IsInt 
{

  function __construct()
  {
  }

  function execute($data, $label)
  {

    if(is_int($data)){

      $_SESSION['core']['notification']['forms'][] = $label.' should be integer';

    }

  }

}

?>
