<?php
namespace Model;

class Post
{
    public $connect;

    public function __construct($conn)
    {
        $this->connect = $conn;
    }

    public function get()
    {
        $sql = $this->connect->prepare('SELECT * FROM posts ORDER BY stt ASC;');
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        return $sql;
    }

    public function find($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM posts WHERE id=$id");
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();

        return $sql;
    }

    public function edit($id, $data = [])
    {
        $sql = $this->connect->prepare("UPDATE posts SET title=?,content=?,stt=? WHERE id=$id");
        $sql->execute($data);
    }

    public function add($data = array())
    {
        $sql = $this->connect->prepare('INSERT INTO posts (title,content,stt, id_category) values (?, ?,?,?);');
        $sql->execute($data);
    }

    public function delete($id)
    {
        $sql = $this->connect->prepare("DELETE FROM posts WHERE id=$id");
        $sql->execute();
    }

    public function getcategoryposts()
    {
        $sql = $this->connect->prepare('SELECT * FROM categorypost');
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        return $sql;
    }
    public function getcategorypost($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM categorypost WHERE id=$id");
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        return $sql;
    }
}