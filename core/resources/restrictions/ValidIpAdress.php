<?php
Namespace Core\Resources\Restrictions;

/**
 *
 */
class ValidIpAdress 
{

  function __construct()
  {
  }

  function execute($data, $label)
  {

    if (!filter_var($data, FILTER_VALIDATE_IP)) {
      $_SESSION['core']['notification']['forms'][] = 'Entered IP Adress is not a valid IP Adress';
    } 

  }

}

?>
