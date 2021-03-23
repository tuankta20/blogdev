<?php

namespace Controller;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class CategoryLearnController
{
    public function __construct()
    {

    }

    public function connect()
    {

        $conn = null;
        try {
            $conn = new \PDO('mysql:host=localhost;dbname=blogdev', 'root', '');
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
        return $conn;
    }

    public function getlist()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM categorylearn order by id asc ');
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $stmt->execute();
        include 'View/Admin/Categorylearn/list.php';
    }

    public function add()
    {
        include_once 'View/Admin/Categorylearn/Add.php';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $des = $_POST['des'];
            $file = $_FILES['file']['name'];
            $date = date('d/m/Y - H:i:s');
            $sql = $this->connect()->prepare('INSERT INTO categorylearn (name, des, img,createdtime) values (?, ?, ?,?)');
            $data = array($name, $des, $file, $date);
            $sql->execute($data);
            move_uploaded_file($_FILES['file']['tmp_name'], './Lib/img/' . $_FILES['file']['name']);
            header('Location:admin.php');
        }
    }

    public function getid($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM categorylearn where id= $id ");
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    public function update($id)
    {
        $row = $this->getid($id);
        include_once 'View/Admin/Categorylearn/Edit.php';
        if (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $des = $_POST['des'];
            if (isset($_FILES['file']) && $_FILES['file']['name'] === '') {
                $file = $row->img;
            } else {
                $file = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], './Lib/img/' . $_FILES['file']['name']);
            }
            $sql = $this->connect()->prepare("UPDATE categorylearn SET name=?,des=?,img=? WHERE id=$id");
            $data = array($name, $des, $file);
            $sql->execute($data);
            header('Location:admin.php');
        }
    }

    public function del($id)
    {
        $sql = $this->connect()->prepare("DELETE FROM categorylearn WHERE id=$id");
        $sql->execute();
        header('Location:admin.php');

    }

    public function getcategorypost($id)
    {
        $data = $this->connect()->prepare("SELECT * FROM categorypost where id_categorylearn=$id order by id asc");
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $data->execute();
        include 'View/Admin/CategoryPost/list-title.php';
    }

    public function getlistclient()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM categorylearn order by id asc ');
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $stmt->execute();
        include 'View/Client/index.php';
    }

    public function getcategoryposts($id)
    {
        $data = $this->connect()->prepare("SELECT * FROM categorypost where id_categorylearn=$id order by id asc");
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $data->execute();

        $stmt = $this->connect()->prepare("SELECT id,name,des FROM categorylearn where id=$id");
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $stmt->execute();
        $categorylearn = $stmt->fetch();

        $categorylearns = $this->connect()->prepare('SELECT * FROM categorylearn order by id asc');
        $categorylearns->setFetchMode(\PDO::FETCH_OBJ);
        $categorylearns->execute();

        include 'View/Client/listcategorypost.php';
    }

    public function getposts($id)
    {
        $data = $this->connect()->prepare("SELECT id,title,stt,id_category FROM posts where id_category=$id ORDER BY stt ASC;");
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $data->execute();

        $stmt = $this->connect()->prepare("SELECT * FROM categorypost where id=$id");
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $stmt->execute();
        $categorylearn = $stmt->fetch();
        $idcategorylearn = $categorylearn->id_categorylearn;

        $categorypost = $this->connect()->prepare("SELECT id, name FROM categorypost where id_categorylearn=$idcategorylearn order by id asc");
        $categorypost->setFetchMode(\PDO::FETCH_OBJ);
        $categorypost->execute();

        $categorylearns = $this->connect()->prepare('SELECT * FROM categorylearn order by id asc');
        $categorylearns->setFetchMode(\PDO::FETCH_OBJ);
        $categorylearns->execute();

        include 'View/Client/listpost.php';
    }

    public function getpostclient($id)
    {
        $sql = $this->connect()->prepare("SELECT * FROM posts where id=$id ");
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        $post = $sql->fetch();
        $sqls = $this->connect()->prepare("SELECT MAX(stt) as sttmax FROM posts");
        $sqls->setFetchMode(\PDO::FETCH_OBJ);
        $sqls->execute();
        $posts = $sqls->fetch();

        $stmt = $this->connect()->prepare("SELECT id,name FROM categorypost where id= $post->id_category");
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $stmt->execute();
        $categorylearn = $stmt->fetch();
        $idcategory = $categorylearn->id;
        $data = $this->connect()->prepare("SELECT id,title,stt,id_category FROM posts where id_category=$idcategory ORDER BY stt ASC;");
        $data->setFetchMode(\PDO::FETCH_OBJ);
        $data->execute();

        $categorylearns = $this->connect()->prepare('SELECT * FROM categorylearn order by id asc');
        $categorylearns->setFetchMode(\PDO::FETCH_OBJ);
        $categorylearns->execute();


        include 'View/Client/details.php';
    }


    public function searchclient()
    {

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
//            $searchs = explode(" ", $search);
//            foreach ($searchs as $searc) {
                $sql = $this->connect()->prepare("SELECT id,title,stt FROM posts where title like '%$search%'");
                $sql->setFetchMode(\PDO::FETCH_OBJ);
                $sql->execute();
//            }
            $str = "<div>";

            while ($row = $sql->fetch()) {
                $str .= "<a href ='http://localhost/Blog/index.php?page=getpostclient&id=$row->id'><div class='cardsearch'> $row->title</div></a>";

            }
            $str .= "</div>";

            echo $str;
        }
    }

    public function next($stt)
    {
        $sql = $this->connect()->prepare("SELECT id FROM posts where stt=$stt ");
        $sql->setFetchMode(\PDO::FETCH_OBJ);
        $sql->execute();
        $post = $sql->fetch();
    }

}






