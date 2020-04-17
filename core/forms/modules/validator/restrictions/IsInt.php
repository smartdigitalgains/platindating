<?php
Namespace Core\Forms\Modules\Validator\Restrictions;

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

      $_SESSION['core']['forms']['validator']['errors'][] = $label.' should be integer';

    }

  }

}

?>
