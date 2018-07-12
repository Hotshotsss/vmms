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
  public static function assign($type){
    switch ((int)$type) {
      case 0:
      return 'Admin';
      break;
      case 1:
      return 'Monitoring';
      break;
      case 2:
      return 'Gate - Entrance';
      break;
      default:
      return 'Gate - Exit';
      break;
    }
  }
  public static function redirect($type){
    switch ((int)$type) {
      case 0:
      return '/admin/home';
      break;
      case 1:
      return '/monitor/home';
      break;
      case 2:
      return '/gate/home';
      break;
      default:
      return '/gate/home';
      break;
    }
  }
}
