<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa bài viết</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php

    function prompt($prompt_msg){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }

    require_once 'connect.php';

    $id = 0;

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
    }
    
    $query = "SELECT password FROM news WHERE id = $id";
    $delete_query = "DELETE FROM news WHERE id = $id";
    $result = mysqli_query($connect, $query);
    $result_array = mysqli_fetch_array($result);
    $password = $result_array['password'];
    $success = "";

    $input_password = prompt("Nhập mật khẩu: ");

    if(strcasecmp($input_password,$password)){
        mysqli_query($connect, $delete_query);
        $success = "Thành công!";
    }else{
        $success = "Sai mật khẩu, F5 để nhập lại";
    }
    mysqli_close($connect);
?>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <h2>
            <?php echo $success ?>
        </h2>

        <a class="address_button" href="homepage.php">Trở về</a>
    </div>
</body>
</html>