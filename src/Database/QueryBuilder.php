<?php

  namespace App\Database;


  class QueryBuilder{
    private $query = [];
    private $fields = [];
    private $conditions = [];
    private $from = [];
    // private $stmt;
    
    protected \PDO $pdo;

    function __construct($pdo){
      $this->pdo=$pdo;
    }

    function query($sql){
      return $statement = $this->pdo->prepare($sql);
    }

    function select($fields):self{
      
      $sql = "SELECT ";
      $list=implode(',',$fields);
      $this->query[]=$sql.$list;
      return $this;
      
    }

    function table($table):self{

      $this->query[]=" FROM {$table}";
      return $this;
    }

    function where(array $conditions):self{
      $k = array_keys($conditions);
      $v = array_values($conditions);
      $this->query[]=" WHERE {$k[0]} = '{$v[0]}'";
      return $this;
    }

    function limit(int $n):self{
      $this->query[]=" LIMIT {$n}";
      return $this;
    }

    function __toString(){
      return join($this->query);
    }
    
    function exec(){
      $sql=join($this->query);
      $this->stmt=$this->pdo->query($sql);
      $this->stmt->execute();
      return $this;
    }

    function fetch(){
      $rows=$this->stmt->fetchAll(\PDO::FETCH_OBJ);
      if($rows){
        return $rows;
      }
      return null;
    }

    function selectAll(string $table, array $fields=null):array{
      if(is_array($field)){
        $columns=implode(',',$fields);
      }
    }

    // function selectAll
    // function selectAll(string $table, array $fields=null):array{
      
    // }

    // function and

    // function or

    function insert($table,$data):bool {
      if (is_array($data)){
        $columns='';$bindv='';$values=null;
          foreach ($data as $column => $value) {
              $columns.='`'.$column.'`,';
              $bindv.='?,';
              $values[]=$value;
          }
          $columns=substr($columns,0,-1);
          $bindv=substr($bindv,0,-1);

          $sql="INSERT INTO {$table}({$columns}) VALUES ({$bindv})";
          
              try{
                  $stmt=$this->query($sql);
                  $stmt->execute($values);
                  return $this->pdo->lastInsertId();
              }catch(\PDOException $e){
                  echo $e->getMessage();
                  return false;
              }
          
          return true;
          }
          return false;
      }

    function update(string $table, array $data,$id, string $idtabla)
            {
                if ($data){
                    $keys=array_keys($data);
                    $values=array_values($data);
                    $changes="";
                    for($i=0;$i<count($keys);$i++){
                        $changes.=$keys[$i]."='".$values[$i]."',";
                    }
                    $changes=substr($changes,0,-1);
                    $cond="{$idtabla} ='{$id}'";
                    $sql="UPDATE {$table} SET {$changes} WHERE {$cond}";
                    
                    $stmt=$this->query($sql);
                    $res=$stmt->execute();
                    if($res){
                        return true;
                    }    
                }else{
                    return false;
                }
                
    
            }

    function selectWhereWithJoin($table1,$table2,array $fields=null,string $join1,string $join2,array $conditions):array
            {
                if (is_array($fields)){
                    $columns=implode(',',$fields);
                    
                }else{
                    $columns="*";
                }
               
                $inners="{$table1}.{$join1} = {$table2}.{$join2}";
                $cond="{$conditions[0]}='{$conditions[1]}'";
                
            $sql="SELECT {$columns} FROM {$table1} INNER JOIN {$table2} ON {$inners} WHERE {$cond} ";
            
               
                $stmt=$this->query($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
                return $rows;   
            }

    function selectWithJoin($table1,$table2,array $fields=null,string $join1,string $join2):array
            {
                if (is_array($fields)){
                    $columns=implode(',',$fields);
                    
                }else{
                    $columns="*";
                }
               
                $inners="{$table1}.{$join1} = {$table2}.{$join2}";
                
                $sql="SELECT {$columns} FROM {$table1} INNER JOIN {$table2} ON {$inners}";            
               
                $stmt=$this->query($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
                return $rows;   
            }

    function selectWhereWithLeftJoin($table1,$table2,array $fields=null,string $join1,string $join2):array
    {
      if (is_array($fields)){
                    $columns=implode(',',$fields);
                    
                }else{
                    $columns="*";
                }
               
                $inners="{$table1}.{$join1} = {$table2}.{$join2}";
                $cond="{$table2}.{$join2} IS NULL";
                
            $sql="SELECT {$columns} FROM {$table1} LEFT JOIN {$table2} ON {$inners} WHERE {$cond} ";
                $stmt=$this->query($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
                return $rows;  
    }

    function selectWhereWithLeftJoinNotNull($table1,$table2,array $fields=null,string $join1,string $join2):array
    {
      if (is_array($fields)){
                    $columns=implode(',',$fields);
                    
                }else{
                    $columns="*";
                }
               
                $inners="{$table1}.{$join1} = {$table2}.{$join2}";
                $cond="{$table2}.{$join2} IS NOT NULL";
                
            $sql="SELECT {$columns} FROM {$table1} LEFT JOIN {$table2} ON {$inners} WHERE {$cond} ";
                $stmt=$this->query($sql);
                $stmt->execute();
                $rows=$stmt->fetchAll(\PDO::FETCH_OBJ);
                return $rows;  
    }

    function remove($tbl,$id,$idtabla){
        $sql="DELETE FROM {$tbl} WHERE {$idtabla}='{$id}'";
        
        $stmt=$this->query($sql);
        $res=$stmt->execute();
        if($res){
            return true;
        }
        else{
            return false;
        }    
    }

    
  }





