<?php include('header.html'); ?>
<link rel="stylesheet" href="style.css">
<!--using Bootstrap 5 css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Using Bootstrap 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2eac5448b1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <!-- 載入 JQuery --></head>
<main>
    <section id="register">
        <h2>註冊</h2>
   <?php

// 資料庫的連接
$servername = "my-db1.c4li6gbfgebb.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "12345678";
$dbname = "mydata";
/*$servername = '127.0.0.1:3307';
$username= 'root';
$password = 'K8z3$N&w264qu';
$dbname = 'mydb_01';*/

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 處理註冊請求
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'register') {
    // 獲取註冊表單資料
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 資料驗證 (您可以加入更嚴格的驗證)
    if (empty($username) || empty($password) || empty($confirm_password)) {
        echo "<script>alert(\"請填寫完整資訊\"); location.href=\"register.php\";</script>";
        die;
    }

    if ($password != $confirm_password) {
        echo "<script>alert(\"密碼不匹配\"); location.href=\"register.php\";</script>";
        die;
    }

    // 檢查使用者名稱是否已存在
    $sql = "SELECT * FROM mydata.user WHERE account = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>alert(\"使用者名稱已存在\"); location.href=\"register.php\";</script>";
        die;
    }

    // 插入資料庫
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO mydata.user (account, password) VALUES ('$username', '$hashed_password')";
    $result = $conn->query($sql);
    if ($result === True) {
        echo "<script>alert(\"註冊成功！\"); location.href=\"login.php\";</script>";
        die;
    } else {
        $result->error;
        echo "<script>alert(\"註冊失敗：$error\"); location.href=\"register.php\";</script>";
    }
    $result->close();
}
?>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="username">使用者名稱：</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">密碼：</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">確認密碼：</label>
                <input type="password" id="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" name="action" value="register" class="btn btn-primary">註冊</button>
        </form>
    </div>

<?php
$conn->close();
?>
    <footer>
		<?php include("footer.html"); ?>
    </footer>
</body>
</html>


