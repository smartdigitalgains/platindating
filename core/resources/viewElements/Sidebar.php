<?php
Namespace Core\Resources\ViewElements;

/**
 *
 */
class Sidebar
{

  function __construct()
  {

  }

  public function render(){

    echo '
    <div class="position-fixed">

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="#">
            Dashboard
          </a>
        </li>
      </ul>
      
    </div>
    ';
  }

}


 ?>
