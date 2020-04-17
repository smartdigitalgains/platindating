<?php
Namespace Core\Resources\Forms;

use \Core\Resources\FormElements\TextArea;
use \Core\Resources\FormElements\TextInput;
use \Core\Resources\FormElements\SelectBox;
use \Core\Resources\FormElements\Submit;
use \Core\Resources\Restrictions\Required;
use \Core\Resources\Restrictions\IsInt;
use \Core\Resources\Finishers\DefaultFinisher;

/**
 *
 */
class AffiliateSites
{

  private $setup;
  private $migration;
  public $data;

  function __construct()
  {

    $this->schema = [
      [
        "column" => "title",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "affiliateUrl",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "description",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "rating",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "freeRegistration",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "ageOfUsers",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "userCount",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "plattformHasAds",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "categories",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
    ];

    $this->elements = [
      new TextInput([
        "name" => "title",
        "label" => "Name des Portals",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "affiliateUrl",
        "label" => "Die Affiliate Url",
        "restrictions" => [new Required()]
      ]),
      new TextArea([
        "name" => "description",
        "label" => "Bescheibung",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "rating",
        "label" => "Bewertung",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "freeRegistration",
        "label" => "Registrierung kostenlos?",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "ageOfUsers",
        "label" => "Durchschnittliches Alter der Benutzer",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "userCount",
        "label" => "Anzahl aktiver Benutzer",
        "restrictions" => [
            new Required(),
            new IsInt()
        ]
      ]),
      new TextInput([
        "name" => "plattformHasAds",
        "label" => "Zeigt die Plattform Werbung an?",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "categories",
        "label" => "Kategorien",
        "restrictions" => [new Required()]
      ]),
    ];

    $this->finishers = [
        new DefaultFinisher(),
    ];

  }

  public function get($var)
  {
    return $this->$var;
  }

}

?>
