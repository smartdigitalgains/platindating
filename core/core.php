<?php
/**
 *
 */
class Core
{

  static function load()
  {

    self::loadCore();
    self::loadExt();

  }

  static function loadCore()
  {

    $dir = new RecursiveDirectoryIterator(__DIR__);

    foreach (new RecursiveIteratorIterator($dir) as $file) {

      if (!is_dir($file)) {

        if( fnmatch('*.php', $file) && !strpos($file, 'core.php')){

          $files[] = $file;

        }

      }

    }

    foreach(array_reverse($files) as $file){
      include_once $file;
    }

  }

  static function loadExt()
  {

    $dir = new RecursiveDirectoryIterator(dirname(__DIR__).'/ext/');

    foreach (new RecursiveIteratorIterator($dir) as $file) {

      if (!is_dir($file)) {

        if( fnmatch('*.php', $file) && !strpos($file, 'core.php')){

          $files[] = $file;

        }

      }

    }

    foreach(array_reverse($files) as $file){
      include_once $file;
    }

  }

  static function countModules()
  {
    return count( glob(__DIR__."/*", GLOB_ONLYDIR) );
  }

  static function countFiles()
  {
    
    $files = 0;

    $dir = new RecursiveDirectoryIterator(__DIR__);

    foreach (new RecursiveIteratorIterator($dir) as $file) {

      if (!is_dir($file)) {

        if( fnmatch('*.php', $file) && !strpos($file, 'core.php')){

          $files++;

        }

      }

    }

    return $files;

  }

}

?>
