<?php
Namespace Core\Resources\Views;

use Core\Resources\Templates\DefaultTemplate;
use Core\Resources\ViewElements\WelcomeMessage;
use Core\Resources\ViewElements\Navigation;
use Core\Resources\ViewElements\Login;
use Core\Resources\ViewElements\RecordsTable;
use Core\Resources\ViewElements\BackLink;
use Core\Resources\ViewElements\Sidebar;

/**
 *
 */
class Form
{

  function __construct()
  {

    $this->template = new DefaultTemplate();

    $this->navigation = [
      new Navigation()
    ];

    if(isset($_GET['uid']))

    $formId = $_SESSION['core']['router']['uid'];
    $form = "\Core\Resources\Forms\\".$formId;

    $this->gridElements = [
      "container" => [
        "class" => "container-fluid",
        "rows" => [
          "cols" => [
            [
              "class" => "col-md-2 d-none d-md-block bg-lightpush sidebar p-3",
              "elements" => [
                new BackLink(),
                new Sidebar(),
              ]
            ],
            [
              "class" => "p-3 bg-light ",
              "elements" => [
                new $form
              ]
            ],
            [
              "class" => "p-3",
              "elements" => [
                new RecordsTable([
                  "model" => "\Core\Resources\Forms\AffiliateSites",
                  "fields" => ["uid", "title"],
                  "showFields" => array("title")
                ]),

              ]
            ],
          ]
        ]
      ]
    ];

  }

}

?>
