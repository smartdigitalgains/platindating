<?php
Namespace Core\Resources\Views;

use Core\Resources\ViewElements\WelcomeMessage;
use Core\Resources\ViewElements\Navigation;
use Core\Resources\ViewElements\Login;
use Core\Resources\ViewElements\RecordsTable;
use Core\Resources\ViewElements\BackLink;

/**
 *
 */
class Home
{

  function __construct()
  {

    echo 'twst';

    $this->elements = [
      new BackLink(),
      new WelcomeMessage(),
    ];

  }

}

?>
