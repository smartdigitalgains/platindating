<?php
Namespace Core\Router\Routes;

/**
 *
 */
class Tasks
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "tasks";
    $this->label = "Tasks";
  }

  public function route()
  {
    
    // (new \Core\Views\Controller('\Core\Models\Views\Tasks'))->render();

    (new \Core\Cron\Tasks\ScrapeDigitalValueOutfits())->execute();

  }

}

?>
