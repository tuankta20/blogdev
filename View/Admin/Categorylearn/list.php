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
    <div style="width: 70%">

        <div class="content-admin">
            <?php foreach ($stmt as $row) : ?>
                <div class="row cards-programadmin" style="">
                    <div class="w2 row">
                        <img src="Lib/img/<?php echo $row->img ?>"
                             alt="<?php echo $row->id ?>" style="width:99%;">

                        <div style="height: 100%;width:1%;background-color: #2196F3"></div>
                    </div>

                    <div class="w7">
                        <div style="margin: 10px;width: 100%;word-wrap: break-word">
                            <a href="http://localhost/Blog/admin.php?page=getcategorypost&id=<?php echo $row->id ?>">
                                <h2 style=" color: #2196F3;"><?php echo $row->name ?></h2>
                            </a>
                            <p class="p-font hiddentext"><?php echo $row->des ?></p>
                            <a href="http://localhost/Blog/admin.php?page=edit&id=<?php echo $row->id ?>"
                               style="padding: 10px 20px;background-color: #2196F3;color: white">edit</a>

                            <a href="http://localhost/Blog/admin.php?page=delete&id=<?php echo $row->id ?>"
                               onclick=" return confirm('Bạn có chắc muốn xóa???')"
                               style="padding: 10px 20px;background-color: rgba(255,40,33,0.85);color: white">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
    <a href="http://localhost/Blog/admin.php?page=add">
        <div style=''>
            <img src="Lib/img/add.png"
                 class="icon-add"
                 alt="">

        </div>
    </a>

</body>
</html>