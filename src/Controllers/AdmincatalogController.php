<?php

namespace App\Controllers;

use App\Session;
use App\Request;
use App\Controller;

final class AdmincatalogController extends Controller{

  public function __construct(Request $request, Session $session){
    parent::__construct($request,$session);
  }
  
  public function index(){
    
    $select = $this->qb->select(['*'])->table('libros')->exec()->fetch();
    
    if(isset($_SESSION['user'])){
    return view('admincatalog',$select);
    }else { return view('auth');}
  }

  public function trDataModal(){
    $trDataIdAjax = $_POST['trDataId'];
    $existe = $this->qb->select(['*'])->table('libros')->where(['idlibro'=>$trDataIdAjax])->limit(1)->exec()->fetch();
    if($existe){
      // return view('admincatalog',$existe);
      // echo json_encode(array('success' => 1, 'data' => $existe));
      echo json_encode(array('data' => $existe));
    }    
  }

  public function create(){
    $isbn = $this->request->post("cisbn");
    $titulo = $this->request->post("ctitulo");
    $link = $this->request->post("clink");
    $npaginas = $this->request->post("cnpaginas");
    $description = $this->request->post("cdescription");
    $autor = $this->request->post("cautor");
    $valoracion = $this->request->post("cvaloracion");

    $data = ['isbn'=>$isbn, 'titulo'=>$titulo, 'link'=>$link, 'npaginas'=>$npaginas, 'descripcion'=>$description, 'autor'=>$autor, 'valoracion'=>$valoracion];
    
    $this->qb->insert('libros',$data);

    
    $this->redirect('/admincatalog');
    

    
  }

  public function update(){
    $idUpdate = $this->request->post("idlibroname");
    $isbnUpdate = $this->request->post("isbnname");
    $tituloUpdate = $this->request->post("tituloname");
    $linkUpdate = $this->request->post("linkname");
    $numpagUpdate = $this->request->post("numpagname");
    $descriptionUpdate = $this->request->post("descriptionname");
    $autorUpdate = $this->request->post("autorname");
    $valoracionUpdate = $this->request->post("valoracionname");
    // var_dump($user);die();

   $table = 'libros';
   $data = ['isbn'=>$isbnUpdate, 'titulo'=>$tituloUpdate, 'link'=>$linkUpdate, 'npaginas'=>$numpagUpdate, 'descripcion'=>$descriptionUpdate, 'autor'=>$autorUpdate, 'valoracion'=>$valoracionUpdate];
    $resultatUpdate = $this->qb->update($table,$data,$idUpdate,'idlibro');

    $this->redirect('/admincatalog');
  }

  public function delete(){
    $idUpdate = $this->request->post("idlibroname");
    $this->qb->remove('libros',$idUpdate,'idlibro');
    $this->redirect('/admincatalog');
  }

  
}