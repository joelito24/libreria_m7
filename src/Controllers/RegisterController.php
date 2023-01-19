<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class RegisterController extends Controller {

  public function __construct(Request $request, Session $session){
    // $this->request=$request;
    // $this->session=$session;
    parent::__construct($request,$session);
  }

  public function index(){return view('register');}


 public function signup(){
    // $password = password_hash($passwd,PASSWORD_BYCRYPT,['cost'=>4]);

    $usr = $this->request->post("usr");
     
    $passwd = $this->request->post("passwd");
    $psw = password_hash($passwd,PASSWORD_BCRYPT,['cost'=>4]);
    
    $name = $this->request->post("name");
    $apellidos = $this->request->post("apellidos");
    $email = $this->request->post("email");
    $tel = $this->request->post("tel");

    $existe = $this->qb->select(['email,contrasenia'])->table('usuarios')->where(['email'=>$email])->limit(1)->exec()->fetch();
   
    if(!$existe){
      $table = 'usuarios';
      $data = [  'usuario'=>$usr, 'contrasenia'=>$psw, 'nombre'=>$name, 'apellidos'=>$apellidos, 'email'=>$email, 'telefono'=>$tel, 'rol'=>'cliente'];
      
      $error = array('register' => "");
      $result= $this->qb->insert($table,$data);
      
    } else { 
      
      $error = array('register' => "Este usuario ya existe");
      $result = false;
    }
     
    if($result){
      $this->redirect('/');
    }else{
      $this->session->set('error',$error);
      $this->redirect('/register');
    }
  }

  
}