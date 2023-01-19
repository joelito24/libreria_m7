<?php 

namespace App\Models;
use App\Database\QueryBuilder;
use App\Container;

abstract class Model{
  protected QueryBuilder $qb;
  protected string $table;
  protected array $data;
  protected array $condition;
  protected int $id;

  public function __construct(array $data=null){
    $reflect = new \ReflectionClass($this);
    $this->table=strolower($reflect->getShortName()).'s';
    $this->qb=Container::get('query');
    $this->qb->setTable($this->table);
    if($data){
      $this->data=$data;
      }
    }

  public function get():array{
    return $this->data;
  }

  function save(){
    $this->qb->update($this->table, $data);  
  }

  //guardar en la base de datos
  function persist(){
    if($this->data){
      try{
        $this->qb->insert($this->data)->exec()->fetch();
      }
    }
  }

  function getAll(){
    $items=
  }

  // function find($condition){
    
  // }

  // function belongsTo(){
    
  // }

  // function hasMany(){
    
  // }
  
}

interface iModel{
  public function select();
  public function insert();
}