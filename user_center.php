<?php include('header.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<section>
    <div class="container">
        <h1>歡迎來到用戶中心</h1>
        <div class="user-info">
            <?php echo  $_SESSION['user_id']  ?> 
            您好
            <p>這裡是您的用戶中心頁面。</p>
        </div>
        <input type="button" onclick="location.href='logout.php';" class="btn btn-danger" value="登出" />
    </div>
</section>
        <?php include("footer.html"); ?>

