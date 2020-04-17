<?php
Namespace Core\Models\ViewElements;

/**
 *
 */
class BackLink
{

  function __construct()
  {

  }

  public function render(){

    echo '<a href="'.$_SESSION['core']['router']['lastRoute'].'">Back</a>';

  }

}


 ?>
