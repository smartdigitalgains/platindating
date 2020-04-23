<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class Form
{

  public $slug;
  public $label;
  public $enableInNavigation;

  function __construct()
  {
    $this->slug = "form";
    $this->label = "Forms";
    $this->enableInNavigation = FALSE;
  }

  public function route()
  {
   
    \Core\Compiler::compile('\Core\Resources\Views\Form');

  }

}

?>
