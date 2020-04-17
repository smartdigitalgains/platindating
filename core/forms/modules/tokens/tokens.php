<?php
Namespace Core\Forms\Modules;

/**
 *
 */
class Tokens
{

  function __construct()
  {
  }

  static function newToken()
  {
    $token = [
      "token" => md5(microtime().rand(100, 999)),
    ];

    $_SESSION['tokens'][$token['token']] = $token;

    echo '<input type="hidden" name="token" value="'.$token['token'].'" />';

  }

  static function validateToken($t)
  {

    if(array_key_exists($t, $_SESSION['tokens'])){

      unset($_SESSION['tokens'][$t]);

      return TRUE;

    }

  }

}

?>
