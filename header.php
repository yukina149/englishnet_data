<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>英文學習網站</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2eac5448b1.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-1 fw-bold">
    &nbsp&nbsp&nbsp
    <b><a class="navbar-brand" href="index.php">英文學習網站</a></b>
    <div class="container-fluid text-nowrap">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0"> 
                <li class="nav-item"><a class="nav-link" href="index.php">首頁</a></li>
                <li class="nav-item"><a class="nav-link" href="video.php">教學影片</a></li>
                <li class="nav-item"><a class="nav-link" href="article.php">文章閱讀</a></li>
                <li class="nav-item"><a class="nav-link" href="test_start.php">單字測驗</a></li>
                <li class="nav-item"><a class="nav-link" href="#study">學習進度表</a></li>
            </ul>
        </div>
        <form class="d-flex">
        <!--如果有userid的存在 就顯示登出跟用戶中心的按鈕-->
            <?php if (isset($_SESSION['user_id'])): ?>
                <button class="btn btn-danger"><a href="logout.php" style="color: white; text-align:center;">登出</a></button>
                &nbsp
                <button class="btn btn-primary"><a href="user_center.php" style="color: white; text-align:center;">用戶中心</a></button>
            <!--否則就顯示登出跟用戶中心的按鈕-->
            <?php else: ?>
                <button class="btn btn-success"><a href="register.php" style="color: white; text-align:center;">註冊</a></button>
                &nbsp
                <button class="btn btn-primary"><a href="login.php" style="color: white; text-align:center;">登入</a></button>
            <?php endif; ?>
        </form>
    </nav>
</body>
</html>
