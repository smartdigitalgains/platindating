<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class Form
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "form";
    $this->label = "Form";
  }

  public function route()
  {
    
    \Core\Compiler::compile('\Core\Resources\Views\Form');

  }

}

?>
