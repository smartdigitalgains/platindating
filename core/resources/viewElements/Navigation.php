<?php
Namespace Core\Resources\ViewElements;

/**
 *
 */
class Navigation
{

  function __construct()
  {

  }

  public function render(){

    echo '
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">c0r3</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
    ';
    
    foreach ($_SESSION['routes'] as  $route) {
      if($route->enableInNavigation){
        echo '<li class="nav-item active"><a class="nav-link" href="/'.$route->slug.'/">'.$route->label.'</a></li>';
      }
    }
    
    echo'
    </ul>
    </div>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
      </form>
    </nav>
    ';
  }

}


 ?>
