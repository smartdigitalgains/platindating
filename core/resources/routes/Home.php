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
    
    (new \Core\Compiler('\Core\Resources\Views\Home'))->compile();

  }

}

?>
