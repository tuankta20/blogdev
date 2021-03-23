
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Lib/css/mains.css">


</head>
<body style="background-color: rgb(248, 249, 250)!important;">
<div class="w9" style="padding: 15px">
    <form method="post" action="" enctype="multipart/form-data">
        <br>
        <h4>Tên:</h4>
        <input type="text"
               style="width: 100%;border: 0.1px solid lightgray ;outline: none;height: 50px;padding:0px 15px "
               name="name" value="<?php echo $row->name?>">
        <br>
        <h4>Mô tả:</h4>
        <textarea type="text"
                  style="width: 100%;border: 0.1px solid lightgray ;outline: none;padding:10px 15px;height: 200px "
                  name="des" value=""><?php echo $row->des?></textarea>
        <br>
        <h4>Ảnh: <?php echo $row->img?></h4>
        <input type="file"
               style="width: 100%; " name="file">
        <br>
        <input type="submit" style="padding: 15px 30px;margin-top:20px;background-color: #2196F3;outline: none;
    border: none;color: white " value="Edit" name="edit">
    </form>

</div>

</body>
</html>