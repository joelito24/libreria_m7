<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class BookController extends Controller{
  
  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }

  public function index(){
    //las dos sirven
    $idLibroData = $_POST['idLibroData'];
    // $idLibroData = $this->request->post("idLibroData");
    $existe = $this->qb->select(['idlibro'])->table('prestamo')->where(['idlibro'=>$idLibroData])->limit(1)->exec()->fetch();
    if(!$existe){
      $fecha = $_POST['today'];
      // $allLibros = $this->qb->select(['*'])->table('libros')->where(['idlibro'=>$idLibroData])->exec()->fetch();
      $idUser = $this->session->get('user')['idusuario'];
      $table = 'prestamo';
      $data = ['idusuario'=>$idUser, 'idlibro'=>$idLibroData, 'fecha'=>$fecha];
      $result= $this->qb->insert($table,$data);
      echo json_encode(array('success' => 1));
    } 
    else {
      echo json_encode(array('success' => 0));
    }
    

  } 
}   





