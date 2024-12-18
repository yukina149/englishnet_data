<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>英文學習網站</title>
    <link rel="stylesheet" href="style.css">
	<!--using Bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Using Bootstrap 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2eac5448b1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <!-- 載入 JQuery -->
</head>
<body>
    <header>
        <h1>英文學習網站</h1>
        <div class="button-container">
            <button class="register-button">Register</button>
            <button class="login-button">Login</button>
        </div>
	</header>
	<hr class="divider">
	
	<nav>
        <input type="checkbox" id="hamburger-input" class="burger-shower" />
        <label for="hamburger-input" class="hamburger-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </label>
        <ul class="navbar-menu">
            <li><a href="index/php">首頁</a></li>
            <li><a href="#movie">教學影片</a></li>
			<li><a href="#read">文章閱讀</a></li>
            <li><a href="test_start.php">單字測驗</a></li>
            <li><a href="#study">學習進度表</a></li>
        </ul>
    </nav>