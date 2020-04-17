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
class NewAffiliateSite
{

  function __construct()
  {

    $this->elements = [
        new \Core\Resources\Forms\AffiliateSites(),
        new RecordsTable([
          "model" => "\Core\Resources\Forms\AffiliateSites"
        ]),
    ];

  }

}

?>
