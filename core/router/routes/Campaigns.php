<?php
Namespace Core\Router\Routes;

/**
 *
 */
class Campaigns
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "campgains";
    $this->label = "Campaigns";
  }

  public function route()
  {
    (new \Core\Views\Controller('\Core\Models\Views\Campaigns'))->render();
  }

}

?>
