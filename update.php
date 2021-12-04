<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sửa bài viết</title>
    <meta charset="UTF-8">
    <!--Stylesheet-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(isset($_GET['update'])){
            $id = $_GET['update'];
        }
    ?>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form name="formvalidate" action="update_validate.php?update=<?php echo $id; ?>"  method="post" onSubmit="return check(formvalidate)">
        <h2>Sửa bài viết</h3>

        <label for="title">Tiêu đề</label>
        <textarea name="title" id="title" cols="30" rows="10"></textarea>

        <label for="content">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>

        <label for="picture">Link hình ảnh</label>
        <input name="picture" type="text" placeholder="Hình ảnh gì đó" id="picture">
        <input type="submit" value="Sửa bài đăng">
    
    </form>
</body>
<script src="validate.js"></script>
</html>
