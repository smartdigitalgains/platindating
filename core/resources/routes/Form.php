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
   
    if(isset($_GET['uid'])){
      \Core\Compiler::compile('\Core\Resources\Views\Dashboard');
    }
    else{
      \Core\Compiler::compile('\Core\Resources\Views\Form');
    }

  }

}

?>
