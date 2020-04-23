<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class Dashboard
{

  public $slug;
  public $label;
  public $enableInNavigation;

  function __construct()
  {
    $this->slug = "c0r3";
    $this->label = "Dashboard";
    $this->enableInNavigation = TRUE;
  }

  public function route()
  {
    
    \Core\Compiler::compile('\Core\Resources\Views\Dashboard');

  }

}

?>
