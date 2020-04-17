<?php
Namespace Core\Router\Routes;

/**
 *
 */
class Accounts
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "accounts";
    $this->label = "Accounts";
  }

  public function route()
  {
    (new \Core\Views\Controller('\Core\Models\Views\Accounts'))->render();
  }

}

?>
