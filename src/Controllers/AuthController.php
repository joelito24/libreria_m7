<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class AuthController extends Controller{

  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }
  
  public function index(){
    //primer obtentir dades
    // $titol="DAW";
    // return view('auth', ['titol'=>$titol]);
    //render vista home
    return view('auth');
  }

  public function singin(){
    $email = $this->request->post("email");
    $pass = $this->request->post("passwd");
    
    $usuario = $this->qb->select(['*'])->table('usuarios')->where(['email'=>$email])->limit(1)->exec()->fetch();
    
    if($usuario){
      if(password_verify($pass, $usuario[0]->contrasenia)){
        $user = array(
          'idusuario'=>$usuario[0]->idusuario,
          'usuario'=>$usuario[0]->usuario,
          'nombre'=>$usuario[0]->nombre,
          'apellidos'=>$usuario[0]->apellidos,
          'telefono'=>$usuario[0]->telefono,
          'rol'=>$usuario[0]->rol
        );
        $this->session->set('user',$user);
        $error = array('auth' => "");
        $result = true;
      }else{
        $error = array('auth' => "Correo o contraseña incorrectas");
        $result = false;
      }
    }else{ $error = array('auth' => "Este usuario no existe");}
    
    if($result){
      $this->redirect('/');
    }else{
      $this->session->set('error',$error);
      $this->redirect('/auth');
    }
  }

  
}