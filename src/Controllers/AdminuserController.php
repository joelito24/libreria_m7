<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class AdminuserController extends Controller{

  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }
  
  public function index(){
    $select = $this->qb->select(['*'])->table('usuarios')->exec()->fetch();
    if(isset($_SESSION['user'])){return view('adminuser',$select);}else { return view('auth');}
  }
  
  public function trDataModal(){
    $trDataIdAjax = $_POST['trDataId'];
    $existe = $this->qb->select(['*'])->table('usuarios')->where(['idusuario'=>$trDataIdAjax])->limit(1)->exec()->fetch();
    if($existe){
      // return view('admincatalog',$existe);
      // echo json_encode(array('success' => 1, 'data' => $existe));
      echo json_encode(array('data' => $existe));
    }    
  }

  public function create(){

    
    $usuario = $this->request->post("cusuario");
    $psw = $this->request->post("ccontrasenia");
    $psswd = password_hash($psw,PASSWORD_BCRYPT,['cost'=>4]);
    
    $nombre = $this->request->post("cnombre");
    $apellidos = $this->request->post("capellidos");
    $email = $this->request->post("cemail");
    $telefono = $this->request->post("ctelefono");
    $rol = $this->request->post("crol");

    $data = ['usuario'=>$usuario, 'contrasenia'=>$psswd, 'nombre'=>$nombre, 'apellidos'=>$apellidos, 'email'=>$email, 'telefono'=>$telefono, 'rol'=>$rol];
    $this->qb->insert('usuarios',$data);

    $this->redirect('/adminuser');

    
  }

  public function update(){    
    $idusuario = $this->request->post("idusuarioname");
    $usuario = $this->request->post("usuarioname");        
    $nombre = $this->request->post("nombrename");
    $apellidos = $this->request->post("apellidosname");
    $email = $this->request->post("emailname");
    $telefono = $this->request->post("telefononame");
    $rol = $this->request->post("rolname");
    $table = 'usuarios';
    $data = ['usuario'=>$usuario, 'nombre'=>$nombre, 'apellidos'=>$apellidos, 'email'=>$email, 'telefono'=>$telefono, 'rol'=>$rol];
    $resultatUpdate = $this->qb->update($table,$data,$idusuario,'idusuario');

    $this->redirect('/adminuser');
  }

  public function delete(){
    $idUpdate = $this->request->post("idusuarioname");
    $this->qb->remove('usuarios',$idUpdate,'idusuario');
    $this->redirect('/adminuser');
  }

  
}