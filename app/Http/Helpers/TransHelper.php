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

  public static function color($type){
    switch ((int)$type) {
      case 0:
      return '#673AB7';
      break;
      case 1:
      return '#3F51B5';
      break;
      case 2:
      return '#E91E63';
      break;
      default:
      return '#4CAF50';
      break;
    }
  }


  public static function redirect($type){
    switch ((int)$type) {
      case 0:
      return '/admin/home';
      break;
      case 1:
      return '/monitoring/home';
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
