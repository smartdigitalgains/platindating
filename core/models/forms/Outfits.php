<?php
Namespace Core\Models\Forms;

use \Core\Models\FormElements\TextInput;
use \Core\Models\FormElements\SelectBox;
use \Core\Models\FormElements\Submit;
use \Core\Forms\Modules\Validator\Restrictions\Required;
use \Core\Forms\Modules\Validator\Finishers\DefaultFinisher;

/**
 *
 */
class Outfits
{

  private $setup;
  private $migration;
  public $data;

  function __construct()
  {

    $this->schema = [
      [
        "column" => "img_org_src",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "img_src",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "type",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "asins",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
    ];

    $this->elements = [
      new TextInput([
        "name" => "img_org_src",
        "label" => "Outfit Original Image Url",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "img_org_src",
        "label" => "New Outfit Image URL",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "type",
        "label" => "Outfit Type",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "asins",
        "label" => "Asins",
        "restrictions" => [new Required()]
      ])
    ];

  }

  public function get($var)
  {
    return $this->$var;
  }

}

?>
