<?php
Namespace Core\Models\Views;

use Core\Models\ViewElements\WelcomeMessage;
use Core\Models\ViewElements\Navigation;
use Core\Models\ViewElements\Login;
use Core\Models\ViewElements\RecordsTable;
use Core\Models\ViewElements\BackLink;

/**
 *
 */
class Outfit
{

  function __construct()
  {

    $this->elements = [
      new BackLink(),
      new WelcomeMessage(),
    ];

  }

}

?>
