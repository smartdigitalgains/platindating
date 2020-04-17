<?php
Namespace Core\Resources\Restrictions;

/**
 *
 */
class Required
{

  function __construct()
  {
  }

  function execute($data, $label)
  {

    if(empty($data)){

      $_SESSION['core']['forms']['validator']['errors'][] = $label.' should not be empty';

    }

  }

}

?>
