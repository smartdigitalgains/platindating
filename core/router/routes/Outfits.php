<?php
Namespace Core\Router\Routes;

/**
 *
 */
class Outfits
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "outfits";
    $this->label = "Outfits";
  }

  public function route()
  {
    (new \Core\Views\Controller('\Core\Models\Views\Outfits'))->render();
  }

}

?>
