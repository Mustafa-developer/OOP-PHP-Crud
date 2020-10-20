<?php 


class crud_database{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $DB_name = "test";
    
    private $result = array();
    private $conn = false;
    private $mysqli = "";
    
    
    public function __construct(){
        if(!$this->conn){
            $this->mysqli = new mysqli($this->server,$this->username,$this->password,$this->DB_name);
            $this->conn = true;
//            echo "yes";
            
            if($this->mysqli->connect_error){
                echo $this->mysqli->connect_error;
                return false;
            }
        }else{
            echo "conn value error";
            return false;
        }
    }
    
    
    public function insert($table , $params = array()){
       if($this->checktable($table)){
           $column = implode(' , ' , array_keys($params));
           $values = implode("' ,'" , $params);
           
           echo $sql = "insert into $table ($column) values ('$values') ";
           
           if($this->mysqli->query($sql)){
            
               return true;
           }else{
               return false;
           }
       } 
    }
    
    
    
    public function update($table,$params = array() , $where){
        
        if($this->checktable($table)){
           
            $arg = array();
            
            foreach($params as $key => $val){
                $arg[] = "$key = '$val' ";
              
            }
            
            $where_condition = "";
            foreach($where as $keys => $values){
                $where_condition = "$keys = $values";
            }
            
             $column = implode(' , ' , $arg);
            $sql = "update $table set " . $column;
            
            if($where != null){
                $sql .= " where $where_condition";
            }
            
                       
            
            if($this->mysqli->query($sql)){
                 $this->result = $this->mysqli->affected_rows;
                return true;
            }else{
                return false;
            }
            
        }
        
        
    }
    
    
    public function delete($table , $where){
        
        if($this->checktable($table)){
            
            $where_condition = "";
            
            foreach($where as $key => $val){
                $where_condition = "$key = $val";
            }
            
            $sql = "delete from $table ";
            
            if($where != null){
                $sql .= " where $where_condition";
            }
            
            if($this->mysqli->query($sql)){
                $this->result = $this->mysqli->affected_rows;
                return true;
            }else{
                return false;
            }
            
            
        }
        
        
    }
    
    
    public function select($table, $rows = "*" , $join = null , $where = null , $order = null , $limit = null){
        $sql = "select $rows from $table";
        
        $where_condition = "";
        
        foreach($where as $key => $val){
            $where_condition = "$key = $val AND";
        }
        
        $where_condition = substr($where_condition , 0 , -4);
        
        if($join != null){
            $sql .= " join $join";
        }
        
         if($where != null){
            $sql .= " where $where_condition";
        }
        
        
          if($order != null){
            $sql .= " order by $order";
        }
        
          if($limit != null){
            $sql .= " limit 0 , $limit";
        }
        
        $query = $this->mysqli->query($sql);
        
        if($query){
              $this->result = $query->fetch_all(MYSQLI_ASSOC);
          return true;
        }else{
            return false;
        }
           
    }
    
    function getdata(){
       $val = $this->result;
        $this->result = array();
        return $val;
        
        
    }
    
    
    public function checktable($table){
        $sql = "show tables from $this->DB_name like '$table'";
        $tableinDB = $this->mysqli->query($sql);
        
        if($tableinDB){
            if($tableinDB->num_rows == 1){
                return true;
            }else{
                return false;
            }
        }
    }
    
    
    
    
    function __destrcut(){
        if($this->conn){
           if( $this->mysqli->close()){
               $this->conn = false;
               return true;
           }
        }else{
            return false;
        }
    }
    
}


?>