<?php
if (isset($_POST['btn_add'])) {
    echo $_POST['post_content'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- <script src="ckfinder/ckfinder.js" type=""></script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tích hợp trình soạn thảo văn bản vào Website</title>
</head>

<body>
    <style>
        #content {
            width: 960px;
            margin: 0px auto;

        }
    </style>
    <div id="content">
        <h1>Tích hợp CKeditor vào Website</h1>
        <form action="" method="POST">
            <textarea class="ckeditor" name="post_content" id="post_content" cols="30" rows="30"></textarea><br>
            <script>
                CKEDITOR.replace('post_content', {
                    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                });
            </script>
            <button name="btn_add" value="Thêm dữ liệu">Thêm dữ liệu</button>
        </form>
    </div>
</body>

</html>