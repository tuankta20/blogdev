<?php

namespace Controller;

use Model\CategoryPost;
use Model\DBConnect;


class CategoryPostController
{

    public $connect;

    public function __construct()
    {
        $data = new DBConnect("mysql:host=localhost;dbname=blogdev", "root", "");
        $this->connect = new CategoryPost($data->connect());
    }

    public function getlist()
    {
        $data = $this->connect->get();
        include 'View/Admin/CategoryPost/list-title.php';

    }

    public function formadd()
    {
        $data = $this->connect->getcategorylearn();
        include 'View/Admin/CategoryPost/Add.php';

    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $data = array($_POST['name'], $_POST['categorylearn']);
            $this->connect->add($data);
            header("location:http://localhost/Blog/admin.php?page=getcategorypost&id=".$_POST['categorylearn']);
        }

    }


    public function delete($id)
    {
        $this->connect->delete($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function getposts($id)
    {
        $title = $this->connect->find($id)->fetch();
       $data =  $this->connect->getposts($id);
        include 'View/Admin/Post/listpost.php';
    }

    public function getcategory(){}

}