<?php
include('header.php');
?>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/2eac5448b1.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<main>
    <section id="login">
        <h2>登入</h2>
        <?php
        // 資料庫連接
        $servername = "my-db1.c4li6gbfgebb.us-east-1.rds.amazonaws.com";
        $username = "admin";
        $password = "12345678";
        $dbname = "mydata";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 處理登入請求
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
            // 獲取登入表單資料
            $username = $_POST['username'];
            $password = $_POST['password'];

            // 資料驗證
            if (empty($username) || empty($password)) {
                echo "<script>alert(\"請填寫完整資訊\"); location.href=\"login.php\";</script>";
                die;
            }

            // 查詢使用者是否存在
            $sql = "SELECT password FROM mydata.user WHERE account = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                echo "$row\n";
                // 驗證密碼
                if (password_verify($password, $row['password'])) {
                    // 登入成功，可以設置 session 或 cookie
                    session_start();
                    $_SESSION['user_id'] = $username; // 假設有一個 id 欄位
                    echo "<script>alert(\"登入成功！\"); location.href=\"index.php\";</script>"; // 重定向到首頁
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $rowpassword = $row['password'];
                    echo "$hash\n";
                    echo "$rowpassword";
                    //echo "<script>alert(\"密碼錯誤\"); location.href=\"login.php\";</script>";
                }
            } else {
                echo "<script>alert(\"使用者不存在\"); location.href=\"login.php\";</script>";
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
                    &nbsp
                </div>
                <button type="submit" name="action" value="login" class="btn btn-primary">登入</button>
            </form>
        </div>
    </section>
    <footer>
        <?php include("footer.html"); ?>
    </footer>
</body>
