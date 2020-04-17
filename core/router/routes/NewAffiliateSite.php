<?php
Namespace Core\Router\Routes;

/**
 *
 */
class newAffiliateSite
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "new-affiliate-site";
    $this->label = "New Affiliate Site";
  }

  public function route()
  {
    (new \Core\Views\Controller('\Core\Models\Views\NewAffiliateSite'))->render();
  }
}

?>