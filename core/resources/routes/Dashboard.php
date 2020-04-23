<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class Dashboard
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "/";
    $this->label = "Dashboard";
  }

  public function route()
  {
    
    \Core\Compiler::compile('\Core\Resources\Views\Dashboard');

  }

}

?>
