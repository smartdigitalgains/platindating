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
class Accounts
{

  private $setup;
  private $migration;
  public $data;

  function __construct()
  {

    $this->schema = [
      [
        "column" => "email",
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
      // [
      //   "column" => "accountTypeId",
      //   "type" => "INT(8)"
      // ]
    ];

    $this->elements = [
      // new SelectBox([
      //   "label" => "choose Account Type",
      //   "name" => "accountTypeId",
      //   "populate" => [
      //     "model" => "\Core\Models\Forms\Proxys",
      //     "label" => "name"
      //   ],
      //   "restrictions" => [new Required()]
      // ]),
      new TextInput([
        "name" => "email",
        "label" => "Email",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "username",
        "label" => "Username",
        "restrictions" => [new Required()]
      ]),
      new TextInput([
        "name" => "password",
        "label" => "Password",
        "restrictions" => [new Required()]
      ])
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
