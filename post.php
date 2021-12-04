<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài đăng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once 'connect.php';

        $id = $_GET['id'];

        $querry = "SELECT * FROM news WHERE id = $id";

        $result = mysqli_query($connect, $querry);

        $post = mysqli_fetch_array($result);

        mysqli_close($connect);
    ?>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <h1 class="post_title"><?php echo $post['title'] ?></h1>
        <h3 class="post_content"><?php echo nl2br($post['content']) ?></h3>
        <img class="post_picture" src="<?php echo $post['picture'] ?>" alt="">
        <p class="post_author"><?php echo "Tác giả: " . $post['author'] ?></p>
    </div>
    
</body>
</html>