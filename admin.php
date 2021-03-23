<?php
session_start();
use Controller\CategoryLearnController;
use Controller\CategoryPostController;
use Controller\PostController;
require_once 'autoload.php';
$page = isset($_GET['page']) ? $_GET['page'] : '';
$Categorylearn = new CategoryLearnController();
$CategoryPost = new CategoryPostController();
$Posts = new PostController();
?>

<?php
if ($_SESSION['user']==='tuanadmin16012001') {


    switch ($page) {
        case 'list':
            $Categorylearn->getlist();
            break;
        case 'add':
            $Categorylearn->add();
            break;
        case 'edit':
            $Categorylearn->update($_GET['id']);
            break;
        case 'delete':
            $Categorylearn->del($_GET['id']);
            break;

        case 'listcategorypost':
            $CategoryPost->getlist();
            break;

        case 'getcategorypost':
            $Categorylearn->getcategorypost($_GET['id']);
            break;
        case 'formaddcategorypost':
            $CategoryPost->formadd();
            break;
        case 'addcategorypost':
            $CategoryPost->add();
            break;
        case 'deletecategorypost':
            $CategoryPost->delete($_GET['id']);
            break;

        case 'listposts':
            $CategoryPost->getposts($_GET['id']);
            break;
        case 'formaddpost':
            $Posts->formadd($_GET['id']);
            break;
        case 'formeditpost':
            $Posts->formedit($_GET['id']);
            break;
        case 'addpost':
            $Posts->add();
            break;
        case 'editpost':
            $Posts->edit($_GET['id']);
            break;
        case 'getpost':
            $Posts->getpost($_GET['id']);
            break;
        case 'deletepost':
            $Posts->delete($_GET['id']);
            break;
        case 'logout':
            session_destroy();
            header('location: http://localhost/Blog/View/Admin/login.php');
            break;
        default:
            $Categorylearn->getlist();
            break;

    }
}else{
      header('location: http://localhost/Blog/View/Admin/login.php');
}
?>

