<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class Home
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "/";
    $this->label = "Home";
  }

  public function route()
  {
    
    (new \Core\Views\Controller('\Core\Resources\Views\Home'))->render();

  }

}

?>
