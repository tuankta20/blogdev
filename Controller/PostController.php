<?php

namespace Controller;

use Model\DBconnect;
use Model\Post;

class PostController
{
    public $conn;

    public function __construct()
    {
        $conn = new DBconnect("mysql:host=localhost;dbname=blogdev", "root", "");
        $this->conn = new Post($conn->connect());
    }

    public function getlist()
    {
        $data = $this->conn->get();
        include 'View/Admin/Post/listpost.php';

    }

    public function formadd($id)
    {
        $data = $this->conn->getcategorypost($id)->fetch();

        include 'View/Admin/Post/Add.php';
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $data = array($_POST['title'], $_POST['content'], $_POST['stt'], $_POST['id_category']);
            $this->conn->add($data);
            header("location:http://localhost/Blog/admin.php?page=listposts&id=".$_POST['id_category'] );
        }

    }

    public function formedit($id)
    {
        $data = $this->conn->find($id)->fetch();
        include 'View/Admin/Post/Edit.php';
    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            $data = array($_POST['title'], $_POST['content'], $_POST['stt']);
            $this->conn->edit($id, $data);
            header("location: http://localhost/Blog/admin.php?page=getpost&id=".$id);
        }

    }

    public function getpost($id)
    {

      $data =   $this->conn->find($id)->fetch();
      $idcategory = $this->conn->getcategorypost($data->id_category)->fetch();
        include "View/Admin/Post/detail.php";

    }


    public
    function delete($id)
    {
       $result =  $this->conn->find($id)->fetch()->id_category;
        $this->conn->delete($id);
        header("location: http://localhost/Blog/admin.php?page=listposts&id=$result");
    }
}