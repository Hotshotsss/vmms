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

  public static function redirect($type){
    switch ((int)$type) {
      case 0:
      return 'admin/home';
      break;
      case 1:
      return 'monitoring/home';
      break;
      case 2:
      return 'gate/home';
      break;
      default:
      return 'gate/home';
      break;
    }
  }
}
