<?php
Namespace Core\Models\ViewElements;

/**
 *
 */
class Navigation
{

  private $routes;

  function __construct()
  {

  }

  public function render(){

    foreach ($_SESSION['routes'] as  $route) {
      echo '<a href="/'.$route->slug.'">'.$route->label.'</a><br>';
    }

  }

}


 ?>
