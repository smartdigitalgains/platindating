<?php
Namespace Core\Resources\ViewElements;

/**
 *
 */
class WelcomeMessage
{

  function __construct()
  {
    // code...
  }

  public function render(){

    echo "
    <pre>
    _    _      _                            _
   | |  | |    | |                          | |
   | |  | | ___| | ___ ___  _ __ ___   ___  | |_ ___     ___ ___  _ __ ___
   | |/\| |/ _ \ |/ __/ _ \| '_ ` _ \ / _ \ | __/ _ \   / __/ _ \| '__/ _ \
   \  /\  /  __/ | (_| (_) | | | | | |  __/ | || (_) | | (_| (_) | | |  __/
    \/  \/ \___|_|\___\___/|_| |_| |_|\___|  \__\___/   \___\___/|_|  \___|
    \n
    version 1.0
    ".\Core::countModules()." modules loaded
    ".\Core::countFiles()." files loaded
    \n
    * your ip has been logged *
    </pre>
    ";

  }

}


 ?>
