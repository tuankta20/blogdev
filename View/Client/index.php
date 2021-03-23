<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog Dev</title>
    <meta name="description" content="Blog dev, website dạy lập trình miễn phí!!!!!!!!!!!" />
    <meta name="robots" content=”noodp,index,follow” />
    <meta name="revisit-after" content="1 days" />
    <meta http-equiv="content-language”" content=”vi” />
    <link rel="icon" href="Lib/img/icon.jpg" type="image" sizes="16x16">

    <meta itemprop="name" content="Blog Dev">
    <meta itemprop="description" content="Blog dev, website dạy lập trình miễn phí!!!!!!!!!!!">
    <meta itemprop="image" content="Lib/img/icon.jpg">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://blogdev.gq">
    <meta property="og:type" content="website">
    <meta property="og:title"  content="Blog Dev"">
    <meta  property="og:description"  content="Blog dev, website dạy lập trình miễn phí!!!!!!!!!!!">
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
                    <input type="text" class="inputsearch" id="inputsearch"
                           placeholder="Tìm kiếm nội dung..............">
                </div>
            </div>
        </div>
    </div>

</div>
<div id='blog'>
    <div class="container" style="margin-top: 115px">
        <div class="content-admin" style="width: 100%!important;margin-left: 0!important;">
            <?php foreach ($stmt as $row) { ?>
                <a href="http://localhost/Blog/index.php?page=getcategorypost&id=<?php echo $row->id ?>">


                    <div class="row cards-programadmin" style="">
                        <div class="w2 row">
                            <img src="Lib/img/<?php echo $row->img ?>"
                                 alt="Denim Jeans" style="max-width:99%;">
                            <div style="height: 100%;width:1%;background-color: #2196F3"></div>
                        </div>

                        <div class="w7">
                            <div style="margin: 10px;max-width: 100%;word-wrap: break-word">
                                <h2 style="color: #2196F3"><?php echo $row->name ?></h2>
                                <p class="p-font hiddentextclient"><?php echo $row->des ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<div class="search-view  w10 container " id="search" style="margin-top: 115px">

</div>

</body>
</html>