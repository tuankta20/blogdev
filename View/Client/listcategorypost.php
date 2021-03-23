<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $categorylearn->name?></title>
    <meta name="description" content="<?php echo $categorylearn->des ?>" />
    <meta name="robots" content=”noodp,index,follow” />
    <meta name="revisit-after" content="1 days" />
    <meta http-equiv="content-language”" content=”vi” />
    <link rel="icon" href="Lib/img/icon.jpg" type="image" sizes="16x16">

    <meta itemprop="name" content="<?php echo $post->title?>">
    <meta itemprop="description" content="<?php echo $categorylearn->des?>">
    <meta itemprop="image" content="Lib/img/icon.jpg">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://blogdev.gq">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $categorylearn->name?>">
    <meta property="og:description" content="<?php echo $categorylearn->des?>">
    <meta property="og:image" content="Lib/img/icon.jpg">


    <link rel="stylesheet" href="Lib/css/mains.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

                $(".inputsearch").keyup(function () {
                    let inputsearch = document.getElementById('inputsearch');
                    let blog = document.getElementById('blog');
                    if (inputsearch.value === '') {
                        document.getElementById('search').style.display = 'none';
                        blog.style.display = '';

                    } else {
                        document.getElementById('search').style.display = '';
                        blog.style.display = 'none';
                    }
                    var data = {
                        search: $("#inputsearch").val()
                    };
                    $.ajax({
                        type: 'get',
                        datatype:"text",
                        data: data,
                        url: "http://localhost/Blog/index.php?page=search",
                        success: function (data) {
                            $("#search").html(data)
                        }
                    });
                });
            }
        );


    </script>

</head>
<body>
<div class="head">
    <div class="container">
        <div class="row">
            <div class=" w3-768">
                <a href="http://localhost/Blog/index.php?">
                    <img src="Lib/img/icon.jpg" style="width:400px;height: 100px; display: block;" alt="">
                </a>
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
<div style="margin-top: 115px">
    <div class="container " id="blog">
        <div class=" div" style="  margin-top: 30px;display: flex;
    padding: 10px;
    max-width: 100%;
    overflow-x: auto;
    height: 100%;">
            <?php foreach ($categorylearns as $row) { ?>
                <a href="http://localhost/Blog/index.php?page=getcategorypost&id=<?php echo $row->id ?>">
                    <div class="card">
                        <img src="Lib/img/<?php echo $row->img ?>"
                             alt="Denim Jeans" style="max-width:100%;">
                    </div>
                </a>
            <?php } ?>
        </div>


        <div class="">
            <div class="content-client" style="max-width: 100%">
                <div class="xinchaoclient" style="">
                    <h1><?php echo $categorylearn->name ?></h1>
                </div>
                <div style="background-color: white;padding: 15px 30px;box-shadow:  0 4px 8px 0 rgba(0,0,0,0.2);margin-bottom: 20px">
                    <p class="p-fontclient"><?php  echo $categorylearn->des ?></p>

                </div>
                <div class="xinchaoclient" style="">
                    <h1><?php echo 'Danh Mục Học '.$categorylearn->name ?></h1>
                </div>
                <?php foreach ($data as $item) {

                ?>
                <a href="http://localhost/Blog/index.php?page=getposts&id=<?php echo $item->id ?>">
                    <div class=" cards-program" style="">
                        <div class="" style="max-width: 100%">
                            <div style="margin: 10px;max-width: 100%;word-wrap: break-word">
                                <p class="p-fontclient" style=""><?php echo $item->name ?></p>
                            </div>
                        </div>
                    </div>
                </a>
                <?php  } ?>

            </div>

        </div>

    </div>
    <div class="search-view  w10 container " id="search" style="margin-top: 115px">

    </div>
</div>

</body>
</html>