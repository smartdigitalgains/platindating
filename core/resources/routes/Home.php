<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class Tasks
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "home";
    $this->label = "Home";
  }

  public function route()
  {
    
    (new \Core\Views\Controller('\Core\Resources\Views\Home'))->render();

  }

}

?>
