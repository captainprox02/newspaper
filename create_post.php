<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tạo bài viết</title>
    <meta charset="UTF-8">
    <!--Stylesheet-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form name="formvalidate" action="post_validate.php"  method="post" onSubmit="return check(formvalidate)">
        <h2>Tạo bài đăng mới</h3>

        <label for="title">Tiêu đề</label>
        <textarea name="title" id="title" cols="30" rows="10"></textarea>

        <label for="content">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>

        <label for="picture">Link hình ảnh</label>
        <input name="picture" type="text" placeholder="Hình ảnh gì đó" id="picture">

        <label for="author">Tác giả</label>
        <input name="author" id="author" placeholder="Tác giả" type="text">
        
        <input name="password" id="password" placeholder="Mật khẩu" type="password">
        
        <input type="submit" value="Tạo bài đăng">
    
    </form>
</body>
<script src="validate.js"></script>
</html>
