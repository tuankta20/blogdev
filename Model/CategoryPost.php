<?php

namespace Model;

use Model\DBConnect;
use http\Header;

class CategoryPost
{
    public $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function get()
    {
        $sql = $this->connect->prepare('SELECT * FROM categorypost');
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        return $sql;
    }

    public function find($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM categorypost where id=$id");
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        return $sql;
    }

    public function edit($id, $data = [])
    {
        $sql = $this->connect->prepare("UPDATE categorypost SET name=?,id_categorylearn=? WHERE id=$id");
        $sql->execute($data);
    }

    public function add($data = array())
    {
        $sql = $this->connect->prepare('INSERT INTO categorypost (name, id_categorylearn) values (?, ?)');
        $sql->execute($data);
    }

    public function delete($id)
    {
        $sql = $this->connect->prepare("DELETE FROM categorypost WHERE id=$id");
        $sql->execute();
    }

    public function getcategorylearn()
    {
        $sql = $this->connect->prepare('SELECT * FROM categorylearn order by id asc');
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        return $sql;
    }

    public function getposts($id){
        $sql = $this->connect->prepare("SELECT id,title,stt,id_category FROM posts where id_category=$id ORDER BY stt ASC;" );
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        return $sql;
    }


}
