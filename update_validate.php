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

        function prompt($prompt_msg){
            echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

            $answer = "<script type='text/javascript'> document.write(answer); </script>";
            return($answer);
        }

        if(isset($_GET['update'])){
            $id = $_GET['update'];
        }

        $title = $_POST['title'];
        $content = $_POST['content'];
        $picture = $_POST['picture'];


        $title_filter = filter_var($title, FILTER_SANITIZE_STRING);
        $content_filter = filter_var($content, FILTER_SANITIZE_STRING);
        $picture_filter = filter_var($picture, FILTER_SANITIZE_STRING);


        require_once 'connect.php';

        $querry = "UPDATE news
        SET title = '$title_filter', content = '$content_filter', picture = '$picture_filter'
        WHERE id = $id";

        $query = "SELECT password FROM news WHERE id = $id";
        $password_result = mysqli_query($connect, $query);
        $password_array = mysqli_fetch_array($password_result);
        $password = $password_array['password'];
        $success = "";

        $input_password = prompt("Nhập mật khẩu: ");

        if(strcasecmp($input_password,$password)){
            mysqli_query($connect, $querry);
            $success = "Thành công!";
        }else{
            $success = "Sai mật khẩu, F5 để nhập lại";
        }

        $error = mysqli_error($connect);

        mysqli_close($connect);
    ?>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form>
        <h2>
            <?php 
                echo $success;
            ?>
        </h2>
        
        <a class="address_button" href="homepage.php">Tro ve</a>
    
    </form>
</body>
</html>
