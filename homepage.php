<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chính</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $page = 1;
        $search = "";

        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }

        require_once 'connect.php';
       
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        
        $number_of_post_query = "SELECT count(*) FROM news WHERE title like '%$search%'";
        $post_array = mysqli_query($connect, $number_of_post_query);
        $result_array = mysqli_fetch_array($post_array);
        $number_of_post = $result_array['count(*)'];
        $number_post_per_page = 1;
        $number_of_page = ceil($number_of_post/$number_post_per_page);
        $number_of_skip_page = $number_post_per_page * ($page - 1);

        $querry = "SELECT * FROM news WHERE title like '%$search%' LIMIT $number_post_per_page OFFSET $number_of_skip_page ";
        $news_array = mysqli_query($connect, $querry);

    ?>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form>
        <h1>homepage</h1>
        <input type="search" name="search" value="<?php echo $search ?>">
        <a class="address_button" href="create_post.php">Tạo bài viết</a>
    </form>




    <div class="container">
         <ul>
            <?php foreach($news_array as $value):?>
            <li>
                <img class="thumb_img" src="<?php echo $value['picture']?>" alt="">
                <h3> <a href="post.php?id=<?php echo $value['id']?>"> <?php echo $value['title']?></a></h3>
                <p>Tác giả:<?php echo $value['author']?></p>
                <a class="edit" href="delete.php?delete=<?php echo $value['id'] ?>">Xóa</a>
                <a class="edit" href="update.php?update=<?php echo $value['id'] ?>">Sửa</a>
            </li>
             <?php endforeach ?>
        </ul>

        <?php for($i = 1 ; $i<= $number_of_page ; $i++){?>
            <a class="page_number" href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>">
                <?php echo $i; ?>
            </a>
        <?php } ?>
    </div>
    
    
</body>
</html>
