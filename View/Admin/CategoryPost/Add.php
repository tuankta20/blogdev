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
    <form method="post" action="http://localhost/Blog/admin.php?page=addcategorypost" enctype="multipart/form-data">
        <br>
        <h4>Tên:</h4>
        <input type="text"
               style="width: 100%;border: 0.1px solid lightgray ;outline: none;height: 50px;padding:0px 15px "
               name="name">
        <br>
        <h4>Danh muc hoc:</h4>
        <select name="categorylearn"
                style="width: 100%;border: 0.1px solid lightgray ;outline: none;height: 50px;padding:0px 15px ">
            <?php foreach ($data as $row) { ?>
                <option  value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
            <?php }; ?>
        </select>
        <br>

        <input type="submit" style="padding: 15px 30px;margin-top:20px;background-color: #2196F3;outline: none;
    border: none;color: white " value="Add" name="submit">
    </form>

</div>

</body>
</html>
