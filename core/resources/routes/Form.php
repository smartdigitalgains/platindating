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
   
    if(isset($_SESSION['core']['router']['uid'])){
      \Core\Compiler::compile('\Core\Resources\Views\Form');
    }
    elseif(isset($_SESSION['core']['router']['uid']) && $_SESSION['core']['router']['rid']){
      \Core\Compiler::compile('\Core\Resources\Views\Record');
    }
    else{
      \Core\Compiler::compile('\Core\Resources\Views\Dashboard');
    }

  }

}

?>
