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
    
    \Core\Compiler::compile('\Core\Resources\Views\Home');

  }

}

?>
