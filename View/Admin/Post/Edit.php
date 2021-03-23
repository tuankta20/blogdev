<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                dialogsInBody: true,
                placeholder: ' Content....',
                tabsize: 2,
                height: 200,
                minHeight: 500,
                maxHeight: 1000,
                focus: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video', '']],
                    ['view', ['fullscreen', 'codeview', 'help', 'undo', 'redo']],
                    ['mybutton', ['hello']]
                ],
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ],
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        ['mybutton', ['hello']]
                    ]
                },
                codeviewFilterRegex: 'custom-regex',
                codeviewIframeWhitelistSrc: ['my-own-domainname'],
                codemirror: { // codemirror options
                    theme: 'monokai',
                },
            });

        });

    </script>
</head>
<body>


<form method="post" action="http://localhost/Blog/admin.php?page=editpost&id=<?php echo $data->id ?>" style="padding: 15px">
    <br>
    <h4>Title:</h4>
    <input type="text" style="width: 100%;border: 0.1px solid lightgray ;outline: none;height: 50px;padding:0px 15px "
           name="title" value="<?php echo $data->title ?>">
    <br>
    <br>
    <h4>STT:</h4>
    <input type="text" style="width: 100%;border: 0.1px solid lightgray ;outline: none;height: 50px;padding:0px 15px "
           name="stt" value="<?php echo $data->stt ?>" >

    <br>
    <br>
    <h4>Content:</h4>
    <br>
    <textarea id="summernote" name="content"><?php echo $data->content ?></textarea>
    <input type="submit" style="padding: 15px 30px;margin-top:20px;background-color: #2196F3;outline: none;
    border: none;color: white " value="Edit Post" name="submit">

</form>
</body>
</html>
