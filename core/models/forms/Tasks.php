<?php
Namespace Core\Models\Forms;

use \Core\Models\FormElements\TextInput;
use \Core\Models\FormElements\SelectBox;
use \Core\Models\FormElements\TaskSelectBox;
use \Core\Models\FormElements\Submit;
use \Core\Forms\Modules\Validator\Restrictions\Required;

/**
 *
 */
class Tasks
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
        "column" => "campaignId",
        "type" => "INT(8)"
      ],
      [
        "column" => "taskClass",
        "type" => "TEXT CHARACTER SET utf8 COLLATE utf8_bin"
      ]
    ];

    $this->elements = [
      new TextInput([
        "name" => "name",
        "label" => "Task Name",
        "restrictions" => [new Required()]
      ]),
      new SelectBox([
        "name" => "campaignId",
        "label" => "choose Campaign",
        "populate" => [
          "model" => '\Core\Models\Forms\Campaigns',
          "label" => 'name'
        ],
        "restrictions" => [new Required()]
      ]),
      new TaskSelectBox([
        "name" => "taskClass",
        "label" => "choose Task Class",
        "restrictions" => [new Required()]
      ]),
    ];

  }

  public function get($var)
  {
    return $this->$var;
  }

}

?>
