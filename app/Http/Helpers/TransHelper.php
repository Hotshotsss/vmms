<?php

namespace App\Http\Helpers;

class TransHelper
{

  public static function type($type){
    switch((int)$type){
      case 0:
      return 'admin';
      break;
      case 1:
      return 'gate';
      break;
      default:
      return 'monitoring';
      break;
    }
  }
}
