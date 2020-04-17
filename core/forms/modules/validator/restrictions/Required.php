<?php
Namespace Core\Forms\Modules\Validator\Restrictions;

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
