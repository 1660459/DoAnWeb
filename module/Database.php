<?php

class Database {
    public $link;

    public function __construct()
    {
        $this->link = mysqli_connect("localhost","root","","db");
        mysqli_set_charset($this->link,"utf8");
    }
    public function insertAll($table, array $data) // them tat ca vao database
    {        
        $sql = "INSERT INTO {$table} ";
        $columns = implode(',', array_keys($data)); 
        $values  = "";
        $sql .= '(' . $columns . ')';
        foreach($data as $field => $value) {
            if(is_string($value)) {
                $values .= "'". mysqli_real_escape_string($this->link,$value) ."',";
            } else {
                $values .= mysqli_real_escape_string($this->link,$value) . ',';
            }
        }
        $values = substr($values, 0, -1);
        $sql .= " VALUES (" . $values . ')';// insert 1 luc nhieu du~ lieu
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die("Lỗi  query  insert ----" .mysqli_error($this->link));
        return mysqli_insert_id($this->link);
    }
    function fetchOne($table,$query) //FETCH LOGIN. 1 USER
    {
        $sql = "SELECT * FROM {$table} WHERE ";
        $sql .= $query ;
        $sql .= "LIMIT 1";

        $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn fetchOne " .mysqli_error($this->link));
        return mysqli_fetch_assoc($result);

    }
    function GetID($table , $id )
    {
        $sql = "SELECT * FROM {$table} WHERE id = '$id' ";
        $result = mysqli_query($this->link,$sql) or die("Lỗi  truy vấn fetchID " .mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function updateAll($table, array $data, array $conditions)
    {
        $sql = "UPDATE {$table}";

        $set = " SET ";

        $where = " WHERE ";

        foreach($data as $field => $value) {
            if(is_string($value)) {
                $set .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\',';
            } else {
                $set .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ',';
            }
        }

        $set = substr($set, 0, -1);


        foreach($conditions as $field => $value) {
            if(is_string($value)) {
                $where .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\' AND ';
            } else {
                $where .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) . ' AND ';
            }
        }

        $where = substr($where, 0, -5);

        $sql .= $set . $where;
        // _debug($sql);die;

        mysqli_query($this->link, $sql) or die( "Lỗi truy vấn Update -- " .mysqli_error());

        return mysqli_affected_rows($this->link);
    }


}

?>