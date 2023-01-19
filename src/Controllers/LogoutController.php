<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class LogoutController extends Controller{

  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }

  public function logout(){
    $this->session->delete('user');
    $this->redirect('/');
  }

  
}