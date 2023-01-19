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


  
}