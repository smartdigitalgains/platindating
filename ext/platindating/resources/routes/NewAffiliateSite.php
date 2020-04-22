<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class NewAffiliateSite
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "new";
    $this->label = "Neue Affiliate Seite anlegen";
  }

  public function route()
  {
  
    \Core\Compiler::compile('\Core\Resources\Views\NewAffiliateSite');

  }

}

?>
