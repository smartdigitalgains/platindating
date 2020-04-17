<?php
Namespace Core\Resources\Routes;

/**
 *
 */
class Tasks
{

  public $slug;
  public $label;

  function __construct()
  {
    $this->slug = "c0r3";
    $this->label = "c0re3 Admin";
  }

  public function route()
  {
  
    echo 'admin interface';

  }

}

?>
