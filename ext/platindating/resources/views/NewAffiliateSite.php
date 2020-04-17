<?php
Namespace Core\Resources\Views;

use Core\Resources\Templates\DefaultTemplate;
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

    $this->template = new DefaultTemplate();

    $this->topElements = [
      new Navigation()
    ];

    $this->gridElements = [
      "container" => [
        "class" => "container-fluid",
        "rows" => [
          "cols" => [
            [
              "class" => "pd-2",
              "elements" => [
                new \Core\Resources\Forms\AffiliateSites(),
              ]
            ],
            [
              "class" => "pd-2",
              "elements" => [
                new RecordsTable([
                  "model" => "\Core\Resources\Forms\AffiliateSites",
                  "fields" => ["title"]
                ]),

              ]
            ],
          ]
        ]
      ]
    ];

    $this->elements = [
        [
          [
            new \Core\Resources\Forms\AffiliateSites(),
          ],
          [
            new RecordsTable([
              "model" => "\Core\Resources\Forms\AffiliateSites",
              "fields" => ["title"]
            ]),
          ],
        ]
    ];

  }

}

?>
