<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title><?php echo $post->title ?></title>
    <meta name="description" content="<?php echo $post->title;
    echo $categorylearn->name ?>"/>
    <meta name="robots" content=”noodp,index,follow”/>
    <meta name="revisit-after" content="1 days"/>
    <meta http-equiv="content-language”" content=”vi”/>
    <link rel="icon" href="Lib/img/icon.jpg" type="image" sizes="16x16">

    <meta itemprop="name" content="<?php echo $post->title ?>">
    <meta itemprop="description" content="<?php echo $post->title ?>">
    <meta itemprop="image" content="Lib/img/icon.jpg">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://blogdev.gq">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $post->title ?>">
    <meta property="og:image" content="Lib/img/icon.jpg">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0"
            nonce="PAQxb0Vy"></script>
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
                        datatype: "text",
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
    <style>
        .syntaxhighlighter{
            width: 700px !important;
        }
        pre{
            overflow: auto;
        }
    </style>
</head>
<body>
<div class="head" style="position: absolute!important;">
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
    height: 100%;

   ">

            <?php foreach ($categorylearns as $row) { ?>
                <a href="http://localhost/Blog/index.php?page=getcategorypost&id=<?php echo $row->id ?>">
                    <div class="card">
                        <img src="Lib/img/<?php echo $row->img ?>"
                             alt="Denim Jeans" style="max-width:100%;">
                    </div>
                </a>
            <?php } ?>

        </div>


        <div class="row">
            <div class="w8-768 ">
                <div class="div " style="padding: 10px;color: #222;padding-bottom: 30px;">
                    <h1 style=""><?php echo 'Bài' . ' ' . $post->stt . ' : ' ?><?php echo $post->title ?><br></h1>
                    <div style="margin-bottom: 15px">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://youtube.com"
                                                                         >
                            <button class="links-fb"> Facebook Share </button></a>


                    </div>
                    <div class="hr"></div>
                    <div style="max-width:100%;word-wrap: break-word!important;">
                        <?php echo $post->content ?>
                    </div>
                    <div class="w10">
                        <div class="hr"></div>

                    </div>
                </div>
            </div>
            <div class="w2-768 ">
                <div class="div">
                    <div>
                        <div class="w10 title"><?php echo 'Tự Học ' . $categorylearn->name ?></div>
                        <?php foreach ($data as $item) { ?>
                            <div class="w10 content ">
                                <a href="http://localhost/Blog/index.php?page=getpostclient&id=<?php echo $item->id ?>">
                                    <div class="content-title <?php if ($item->id == $post->id) {
                                        echo 'link';
                                    } ?>"><?php echo 'Bài' . ' ' . $item->stt . ' : ' ?><?php echo $item->title ?></div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="search-view  w10 container " id="search" style="margin-top: 115px">

    </div>
</div>

</body>
</html>