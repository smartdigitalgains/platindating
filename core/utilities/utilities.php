<?php
Namespace Core;
/**
 *
 */
class Utilities
{

  function __construct()
  {
  }


  static function curl($url){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Proxy settings only on live server

    // if (strpos($_SERVER['HTTP_HOST'], '.test') === false) {
    //     curl_setopt($ch, CURLOPT_PROXYPORT, $proxyAuth['port']);
    //     curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    //     curl_setopt($ch, CURLOPT_PROXY, $proxyAuth['ip']);
    //     curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth['loginpassw']);
    // }

    $response = curl_exec($ch);

    curl_close($ch);

    return $response;

    }

  static function getClassesInNamespace($namespace)
  {

    foreach(\get_declared_classes() as $key => $class){

      if(strpos($class, $namespace) === 0){

        $classes[] = new $class;

      }

    }

    return $classes;

  }

  static function reflect($model){

    $model = new \ReflectionClass($model);

    return [
      "inNamespace" => $model->inNamespace(),
      "name" => $model->getName(),
      "namespaceName" => $model->getNamespaceName(),
      "shortName" => $model->getShortName()
    ];

  }

  static function createArrayFromArrayKey($array, $key)
  {

    foreach ($array as $value) {

      if(array_key_exists($key, $value)){

        $arr[] = $value[$key];
      }

    }

    return $arr;

  }

  static function getDirectoryFiles($dir)
  {
    $dir = new \RecursiveDirectoryIterator($dir);

    foreach (new \RecursiveIteratorIterator($dir) as $file) {

      if (!is_dir($file)) {

        if( fnmatch('*.php', $file) && !strpos($file, 'core.php')){

          $files[] = $file;

        }

      }

    }

    return $files;

  }

}

?>
