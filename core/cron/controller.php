<?php
namespace Core\Cron;

/**
 *
 */
class Controller
{

  private $task;

  function __construct()
  {
  }

  static function processQueu()
  {

    $queu = \Core\Models\Controller::getRepositories('\Core\Models\Forms\Tasks');

    foreach($queu as $task){

      (new $task)->execute();

    }

  }

}

 ?>
