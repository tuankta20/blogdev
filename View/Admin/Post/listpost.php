<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Lib/css/mains.css">


</head>
<body style="background-color: rgb(248, 249, 250)!important;">
<div class="head">
    <div class="container">
        <div class="row">
            <div class=" w3-768">
                <img src="Lib/img/icon.jpg" style="width:400px;height: 100px; display: block;" alt="">
            </div>
            <div class="w7">
                <div class="div-search" style="">
                    <input type="text" class="inputsearch" id="inputsearch" onkeyup="onkeyupss()"
                           placeholder="Tìm kiếm nội dung..............">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="" style="color: gray; margin-top: 115px;width: 20%;word-wrap: break-word;">
        <div>
            <a style="" href="http://localhost/Blog/admin.php">
                <div class="admin-title">Category Learn</div>
            </a>
            <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.08);margin-bottom: 8px;margin-top: 8px; ">
            </div>

        </div>

        <div>
            <a style="" href="http://localhost/Blog/admin.php?page=listcategorypost">
                <div class="admin-title">Category Post</div>
            </a>
            <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.08);margin-bottom: 8px;margin-top: 8px; ">
            </div>

        </div>

        <div>
            <a style="" href="http://localhost/Blog/admin.php?page=logout">
                <div class="admin-title">Log Out!</div>
            </a>
            <div style="border-bottom: 1px solid rgba(0, 0, 0, 0.08);margin-bottom: 8px;margin-top: 8px; ">
            </div>

        </div>

    </div>
    <div style="width: 70%; margin-top: 115px">
        <div style="width: 100%;padding: 15px">
            <div style="max-width: 100%">
                <div class="posts" style="background-color: #2196F3;!important;"><h2
                            style="color: white"><?php echo $title->name ?></h2></div>
                <?php foreach ($data

                               as $row) { ?>
                    <a href="http://localhost/Blog/admin.php?page=getpost&id=<?php echo $row->id ?>">
                        <div class="posts">
                            <h2 style="color: #2196F3"><?php echo 'Bài' . ' ' . $row->stt . ':' ?><?php echo $row->title ?></h2>
                        </div>
                    </a>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
<a href="http://localhost/Blog/admin.php?page=formaddpost&id=<?php echo $id ?>">
    <div style=''>
        <img src="Lib/img/add.png"
             class="icon-add"
             alt="">

    </div>
</a>
</body>
</html>