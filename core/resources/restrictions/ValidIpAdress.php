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

    if (filter_var($data, FILTER_VALIDATE_IP)) {
        return True;
    } 
    else{
        $_SESSION['core']['forms']['validator']['errors'][] = 'Entered IP Adress is not a valid IP Adress';
        return False;
    }
  }

}

?>
