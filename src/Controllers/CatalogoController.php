<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class CatalogoController extends Controller{
  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }  
  public function index(){
    $catalogo = $this->qb->select(['*'])->table('libros')->exec()->fetch();

    $catalogo = $this->qb->selectWhereWithLeftJoin('libros','prestamo',['libros.*'],'idlibro','idlibro');
    
    if(isset($_SESSION['user'])){
      return view('catalogo', ['catalogo'=>$catalogo]);
    }else { return view('auth');}
    
    
  }
  
  public function error(){
    echo "error";
  }
}