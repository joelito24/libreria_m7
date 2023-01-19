<?php

namespace App\Controllers;

use App\Controller;
use App\Request;
use App\Session;

final class DashboardController extends Controller{

  function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }

  public function index(){
    //primer obtentir dades
    // $titol="DAW";
    // return view('auth', ['titol'=>$titol]);
    //render vista home
    if(isset($_SESSION['user'])){
    return view('dashboard');
    }else { return view('auth');}
  }

  function reserva(){
    
  }
}