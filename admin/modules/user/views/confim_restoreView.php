<?php global $list_user_handle;
$action = get_action();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/reset.css">
    <script src="public/js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="<?php get_css($action); ?>">
    <script src="<?php get_js($action); ?>"></script>
    <title>Xác nhận khôi phục dữ liệu</title>
</head>

<body>
    <div id="confim_restore" class="rounded bg-primary">
        <?php if (!empty($list_user_handle)) { ?>
        <h4 class="text-warning">Bạn có chắc là muốn khôi phục những user dưới đây ?</h4>
         <ul class="list_user">
            <?php foreach ($list_user_handle as $user_handle) { ?>
            <li><?php echo $user_handle['fullname'] . "--" . key_to_privilege($user_handle['privilege']); ?></li>
            <?php } ?>
         </ul>
        <form action="" method="POST">
            <button name="btn_confim_restore" value="delete" class="btn-danger rounded">Khôi phục</button>
            <button name="btn_cancel" value="cancel" class="btn-secondary rounded">Huỷ</button>
        </form>
        <?php } ?>
    </div>
</body>

</html>