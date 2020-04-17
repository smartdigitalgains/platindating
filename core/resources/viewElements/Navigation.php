<?php
Namespace Core\Resources\ViewElements;

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

    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
    ';
    
    foreach ($_SESSION['routes'] as  $route) {
      echo '<li class="nav-item active"><a href="/'.$route->slug.'">'.$route->label.'</a></li>';
    }
    
    echo'
    </ul>
    </div>
    </nav>
    ';
  }

}


 ?>
