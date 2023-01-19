<?php

  namespace App\Controllers;


use App\Controller;
use App\Request;
use App\Session;

    final class HomeController extends Controller{
  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }
      
      public function index(){
        $valoraciones = $this->qb->select(['isbn','titulo','autor','valoracion','link'])->table('libros')->where(['valoracion' > 5])->limit(3)->exec()->fetch();
        return view('home', ['valoraciones'=>$valoraciones]);
      }
      
      public function error(){
        echo "error";
      }
    
    }
    