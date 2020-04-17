<?php
Namespace Core\Router\Routes;

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
    print_r($_GET);
    (new \Core\Views\Controller('\Core\Models\Views\Home'))->render();
  }

}

?>
