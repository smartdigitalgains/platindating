<?php
namespace Core\Cron\Tasks;

use seregazhuk\PinterestBot\Factories\PinterestBot;

/**
 *
 */
class PostToPinterest
{

  private $credentials;

  function __construct()
  {
  }

  public function excute()
  {

    $bot = PinterestBot::create();
    // Login
    $bot->auth->login('tizian.thost@outlook.com', 'T4n3nb4umn12');

    // Get lists of your boards
    $boards = $bot->boards->forUser('tizianthost');

    $bot->pins->create('https://smartdigitalgains.com/bg.jpg', $boards[0]['id'], 'hallo');

}

}
