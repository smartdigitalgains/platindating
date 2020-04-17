<?php
Namespace Core\Models\Forms;

use \Core\Models\FormElements\TextInput;
use \Core\Models\FormElements\SelectBox;
use \Core\Models\FormElements\Hidden;
use \Core\Models\FormElements\Submit;
use \Core\Forms\Modules\Validator\Restrictions\Required;
use \Core\Forms\Modules\Validator\Restrictions\ValidIpAdress;

/**
 *
 */
class Proxys
{

  private $setup;
  private $migration;
  public $data;

  function __construct()
  {

    $this->schema = [
      [
        "column" => "name",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "ip",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "port",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "username",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "password",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ],
      [
        "column" => "lastExecuted",
        "type" => "INT(8)"
      ],
    ];

    $this->elements = [
      new TextInput([
        "name" => "name",
        "label" => "Proxy Name",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "ip",
        "label" => "Proxy Ip",
        "restrictions" => [
            new Required(),
            new ValidIpAdress(),
        ]
      ]),
      new TextInput([
        "name" => "port",
        "label" => "Proxy Port"
      ]),
      new TextInput([
        "name" => "username",
        "label" => "Proxy Username",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "password",
        "label" => "Proxy Password",
        "restrictions" => [new Required()]
      ]),
      new Hidden([
        "name" => "lastExecuted",
        "value" => time()
      ])
    ];

  }

  public function get($var)
  {
    return $this->$var;
  }

}

?>
