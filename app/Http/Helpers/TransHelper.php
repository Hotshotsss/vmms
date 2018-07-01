<?php

namespace App\Http\Helpers;

class TransHelper
{

  public static function type($type){
    switch((int)$type){
      case 0:
      return 'Admin';
      break;
      case 1:
      return 'Gate';
      break;
      default:
      return 'Monitoring';
      break;
    }
  }
}
