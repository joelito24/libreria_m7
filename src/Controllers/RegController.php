<?php

namespace App\Controllers;

final class RegController {

  public function index(){
     
      return view('reg');
    }



  
 public function signup(){
    // $password = password_hash($passwd,PASSWORD_BYCRYPT,['cost'=>4]);
    // $result= $this->qb->select(['email,passwd'])->form('usuaris')->where(['email'=>$email])->limit(1)->exec();
   // var_dump($email);
   $name = $_POST['email'];
    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo $name;
    }
   exit;
    $result= $this->qb->insert($table,$data)->exec()->fetch();
    if($result){
      $this->redirect('/home');
    }else{
      $this->session->set('error',"Session fallida");
      $this->redirect('/reg');
    }
  }

  
}