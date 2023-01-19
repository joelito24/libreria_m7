<?php

namespace App;

final class Request{
  //ESTOS PARAMETROS SE TIENEN QUE RELLENAR
  protected string $controller; 
  protected string $action;
  protected string $method;
  protected string $params;
  protected $arrURI;

  function __construct(){
    
    $reqString=htmlentities($_SERVER['REQUEST_URI']);
    $this->arrURI=explode('/',$reqString);
    array_shift($this->arrURI);
    //PARA SACAR AL METODO
    // $this->setMethod(htmlentities($_SERVER['REQUEST_METHOD']));

    $this->extractURI();
    
  }

  public function setController($controller){
    $this->controller=$controller;
  }

  public function getController(){
    return $this->controller;
  }

  function setAction($action){
    $this->action=$action;
  }

  function getAction(){
    return $this->action;
  }
  
  function setMethod($method){
    $this->method=$method;
  }
  
  function getMethod(){
    return $this->method;
  }
  
  function setParams($params){
    $this->params=$params;
  }
  
  function getParams(){
    return $this->params;
  }
  
  // function setArrURI($arrURI){
  //   $this->arrURI=$arrURI;
  // }

  // function getArrURI(){
  //   return $this->arrURI;
  // }

  public function get($field){
  if($this->method=='POST'){
      return filter_input(INPUT_POST,$field,FILTER_DEFAULT);
    }else return null;
  }
  
  public function post($field){
    if($this->method=='POST'){
      return filter_input(INPUT_POST,$field,FILTER_DEFAULT);
    }else return null;
  }
  
  private function extractURI():void{     
      $length=count($this->arrURI);
      //estudi de casos possibles
      switch($length){
          case 1: //only controller
              if($this->arrURI[0]==""){
                  $this->setController('home');
              }else{
                  $this->setController($this->arrURI[0]);
              }
              $this->setAction('index');
              break;
          case 2: //controller & action
              $this->setController($this->arrURI[0]);
              if($this->arrURI[1]==""){
                  $this->setAction('index');
              }else{
                  $this->setAction($this->arrURI[1]);
              }
          break;
          default: // cont. & act & params
              $this->setController($this->arrURI[0]);
              $this->setAction($this->arrURI[1]);
              $this->Params();
              // $this->params=($this->arrURI[2]);
          break;
      }
      $this->setMethod(\htmlentities($_SERVER['REQUEST_METHOD']));
    

  }

   private function Params():void{
    if($this->arrURI!=null){
        $arr_length=count($this->arrURI);
        if($arr_length > 2){
            //quitar contr, y accion
            array_shift($this->arrURI);
            array_shift($this->arrURI);
            $arr_length=count($this->arrURI);
            if($arr_length % 2 == 0){
                for($i=0;$i<$arr_length;$i++){  
                    if($i%2 == 0){
                        $arr_k[]=$this->arrURI[$i];
                    }else{
                        $arr_v[]=$this->arrURI[$i];
                    }
                }
                $array_res=array_combine($arr_k,$arr_v);
                $this->setParams($array_res);
            }
        }
    }
  }
}
