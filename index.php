
<?php

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
switch ($page) {
    case 'list':
        $Categorylearn->getlistclient();
        break;
    case 'getcategorypost':
        $Categorylearn->getcategoryposts($_GET['id']);
        break;

    case 'getposts':
        $Categorylearn->getposts($_GET['id']);
        break;
    case 'getpostclient':
        $Categorylearn->getpostclient($_GET['id']);
        break;

    case 'search':
        $Categorylearn->searchclient();
        break;
    default:
        $Categorylearn->getlistclient();
        break;

}?>

