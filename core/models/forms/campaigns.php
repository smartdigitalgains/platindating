<?php
Namespace Core\Models\Forms;

use \Core\Models\FormElements\TextInput;
use \Core\Models\FormElements\TextArea;
use \Core\Models\FormElements\SelectBox;
use \Core\Models\FormElements\Submit;
use \Core\Forms\Modules\Validator\Restrictions\Required;

/**
 *
 */
class Campaigns
{

  public $data;

  function __construct()
  {

    $this->schema = [
      [
        "column" => "name",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "tags",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "description",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "accountId",
        "type" => "INT(8)"
      ],
      [
        "column" => "proxyId",
        "type" => "INT(8)"
      ]
    ];


    $this->elements = [
      new TextInput([
        "name" => "name",
        "label" => "Name",
        "restrictions" => [new Required()]
      ]),
      new TextArea([
        "name" => "tags",
        "label" => "Tags",
        "restrictions" => [new Required()]
      ]),
      new TextArea([
        "name" => "description",
        "label" => "Description"
      ]),
      new SelectBox([
        "name" => "accountId",
        "label" => "choose Account",
        "restrictions" => [new Required()],
        "populate" => [
          "model" => '\Core\Models\Forms\Accounts',
          "label" => 'email'
        ]
      ]),
      new SelectBox([
        "name" => "proxyId",
        "label" => "choose Proxy",
        "restrictions" => [new Required()],
        "populate" => [
          "model" => '\Core\Models\Forms\Proxys',
          "label" => 'name'
        ]
      ])
    ];
  }

  public function get($var)
  {
    return $this->$var;
  }

}

?>
