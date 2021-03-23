<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="Lib/css/mains.css">
    <script>
        function backlai() {
        window.history.back();
        }
    </script>
    <style>
        .language-php{
            max-width: 100%;
            word-wrap: break-word;
            overflow: auto;
            background: #1d1f21;
        }
        pre{

            overflow: auto;
        }
    </style>
</head>
<body>

<div style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <div class="w10 ">

                <div class="div " style="padding: 10px;color: #222;padding-bottom: 30px;">
                    <div>

                        <a href="http://localhost/Blog/admin.php?page=listposts&id=<?php echo $idcategory->id ?> " class="links-fb">Quay lại</a>

                        <a href="http://localhost/Blog/admin.php?page=formeditpost&id=<?php echo $data->id ?>">
                            <button class="links-fb">Edit</button>
                        </a>

                        <a href="http://localhost/Blog/admin.php?page=deletepost&id=<?php echo $data->id ?>"
                           onclick="return confirm('Bạn có chắc muốn xóa?????')">
                            <button class="links-you">Delete</button>
                        </a>
                        <div class="hr"></div>
                    </div>
                    <h1 style=""><?php echo 'Bài' . ' ' . $data->stt . ':' ?><?php echo $data->title ?> </h1>
                    <div class="hr"></div>
                    <div >
                        <?php echo $data->content ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="search-view  w10 container " id="search" style="">
    </div>
</div>

</body>
</html>