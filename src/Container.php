<?php

namespace App;
// registre de serveis
final class Container{
  
  protected static $services=[];
  

  public static function bind($key,$value){
    self::$services[$key]=$value;
  }

  // public static function search($key){
  //   if(in_array($key,self::$services)){
  //     return true;
  //   }
  //   return false;
  // }

  public function get($key){
    if(!array_key_exists($key,self::$services)){
      throw new \Exception("No {$key} is bound in container");
      
    }
    return self::$services[$key];
      
    }
}

