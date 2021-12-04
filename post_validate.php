<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tạo bài viết</title>
    <meta charset="UTF-8">
    <!--Stylesheet-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $title = $_POST['title'];
        $content = $_POST['content'];
        $picture = $_POST['picture'];
        $author = $_POST['author'];
        $password = $_POST['password'];

        $title_filter = filter_var($title, FILTER_SANITIZE_STRING);
        $content_filter = filter_var($content, FILTER_SANITIZE_STRING);
        $picture_filter = filter_var($picture, FILTER_SANITIZE_STRING);
        $author_filter = filter_var($author, FILTER_SANITIZE_STRING);
        $password_filter = filter_var($password, FILTER_SANITIZE_STRING);

        require_once 'connect.php';

        $querry = "INSERT INTO news(author,password,title, content, picture) 
        VALUES ('$author_filter', '$password_filter', '$title_filter', '$content_filter', '$picture_filter')";

        mysqli_query($connect, $querry);

        $error = mysqli_error($connect);

        $result = $title_filter . $content_filter . $picture_filter . $author_filter . $password_filter;

        mysqli_close($connect);
    ?>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form>
        <h2>
            <?php 
                if(!$connect){
                    echo "Connect fail: " . $error;
                }else{
                    echo "Thành công";
                }
            ?>
        </h2>
        
        <a class="address_button" href="homepage.php">Trở về</a>
    
    </form>
</body>
</html>

//aaBB45@@zz
