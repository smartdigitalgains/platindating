<?php
Namespace Core\Models\Forms;

use \Core\Models\FormElements\TextArea;
use \Core\Models\FormElements\TextInput;
use \Core\Models\FormElements\SelectBox;
use \Core\Models\FormElements\Submit;
use \Core\Forms\Modules\Validator\Restrictions\Required;
use \Core\Forms\Modules\Validator\Restrictions\IsInt;
use \Core\Forms\Modules\Validator\Finishers\DefaultFinisher;

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
        "column" => "titel",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "affiliateLink",
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
        "column" => "userAge",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "onlineUser",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "platformAds",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "categories",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
    ];

    $this->elements = [
      new TextInput([
        "name" => "titel",
        "label" => "Titel",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "affiliateLink",
        "label" => "Affiliate Link",
        "restrictions" => [new Required()]
      ]),
      new TextArea([
        "name" => "description",
        "label" => "Description",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "rating",
        "label" => "Rating",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "freeRegistration",
        "label" => "Free Registration?",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "userAge",
        "label" => "User Age",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "onlineUser",
        "label" => "Online User",
        "restrictions" => [
            new Required(),
            new IsInt()
        ]
      ]),
      new TextInput([
        "name" => "platformAds",
        "label" => "Platform Ads",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "categories",
        "label" => "Categories",
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
