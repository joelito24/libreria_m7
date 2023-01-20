<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class ProfileController extends Controller{

  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }
  
  public function index(){ 
    // $data = $_POST['data'];
    // var_dump($data);
    // die();

    $prestados = $this->qb->selectWhereWithJoin('libros','prestamo',['libros.*'],'idlibro','idlibro',['prestamo.idusuario',$this->session->get('user')['idusuario']]);

    
    // $prestados = $this->qb->selectWhereWithLeftJoinNotNull('libros','prestamo',['libros.*'],'idlibro','idlibro');
    
    
    
    

    if(isset($_SESSION['user'])){
      return view('profile', ['usuariosQuery' => $_SESSION['user'] , 'prestados'=> $prestados]);
    }else { return view('auth');}
    
    // return view('profile');
  }

  public function updateDatosUser(){
    $username = $this->request->post("usuarioInput");
    $name = $this->request->post("nombreInput");
    $apellidos = $this->request->post("apellidosInput");
    $tel = $this->request->post("telefonoInput");
    $data = ['usuario'=>$username, 'nombre'=>$name, 'apellidos'=>$apellidos, 'telefono'=>$tel];
    $updateUserQuery = $this->qb->update('usuarios', $data, $_SESSION['user']['idusuario'],'idusuario');

    if($updateUserQuery){
        $user = array(
          'idusuario'=>$this->session->get('user')['idusuario'],
          'usuario'=>$username,
          'nombre'=>$name,
          'apellidos'=>$apellidos,
          'telefono'=>$tel,
          'rol'=>$this->session->get('user')['rol']
        );
        $this->session->set('user',$user);
      $this->redirect('/profile');
    }
  }


  public function deletePrestado(){
    $prestamoDataId = $this->request->post("prestamoDataId");
    // var_dump($prestamoDataId);die();
    $hola = $this->qb->remove('prestamo',$prestamoDataId,'idlibro');
    if($hola){
      $this->redirect('/profile');
    }
    
  }
  
}