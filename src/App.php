<?php

namespace App;

use App\Request;

final class App{
  protected Request $request;
  protected Session $session;
  
  function __construct(){
    $this->request = new Request();
    $this->session = new Session();
    $controller=$this->request->getController();
    $action = $this->request->getAction();
    $this->dispatch($controller);  
    
  }

  
  public function dispatch($controller){
    try{
      //comprobar si tenim el controlador
      $nameController = '\\App\Controllers\\'.ucfirst($controller).'Controller';
      $objContr = new $nameController($this->request,$this->session);
      if(method_exists($objContr,$this->request->getAction())){
        call_user_func([$objContr,$this->request->getAction()]);
      }else{
        call_user_func([$objContr,'error']);
      }
       
    }catch(\Exception $e){
      die($e->getMessage());
    }
    
  }
}

