<?php
Namespace Core\Models\ViewElements;

/**
 *
 */
class Login
{

  function __construct()
  {
    // code...
  }

  public function render(){

    echo "
    <pre>
    <input type='text' placeholder='Username' />
    <input type='password' placeholder='Password' />
    \n
    <input type='submit' value='Login' />
    </pre>
    ";

  }

}


 ?>
