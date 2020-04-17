<?php
Namespace Core\Router\Routes;

/**
 *
 */
class Test
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "proxys";
    $this->label = "Proxys";
  }

  public function route()
  {
    (new \Core\Views\Controller('\Core\Models\Views\Proxys'))->render();
  }

}

?>
