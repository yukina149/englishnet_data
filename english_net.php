<?php include('header.html'); ?>
<link rel="stylesheet" href="style.css">
<!--using Bootstrap 5 css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Using Bootstrap 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2eac5448b1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <!-- 載入 JQuery --></head>
<main>
    <section id="test">
        <h2>測驗</h2>
   <?php

session_start();
//設定session題數
if (!isset($_SESSION['correct_sum'])) {
    $_SESSION['correct_sum'] = 0;
}
//把session題數賦予給變數correct_sum，然後下面直接用Session計算
$correct_sum = $_SESSION['correct_sum'];
$score = $correct_sum * 10;

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

// Initialize session variables
if (!isset($_SESSION['current_question_index'])) {
    $_SESSION['current_question_index'] = 0;
}

//設定題號
$current_index = $_SESSION['current_question_index'];

// Fetch questions
$sql = "SELECT * FROM quiz_questions LIMIT $current_index, 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $question = $result->fetch_assoc();
} else {
    echo "<p>測驗結束！</p>";
    echo "分數是 $score <br>";
    echo "答對了： $correct_sum 題<br>";
    echo '<button onclick="location.href=\'index.php\'" class="btn btn-dark">回到首頁</button>';
    session_unset();
    session_destroy();
    exit;
}
//把用戶回答的值賦予給user_answer
$user_answer = $_POST['answer'] ?? null;
// 用來區分按鈕操作，將按鈕同名為action的值賦予給action變數
$action = $_POST['action'] ?? null; 
$feedback = "";

//===在php是比較值與類型 所以如果value是繳交 且用戶回
if ($action === 'submit') {
    // 處理答案提交
    $correct_answer = $question['correct_answer'];
    if ($user_answer === $correct_answer) {
        $_SESSION['correct_sum']++;
        $feedback = "<p>恭喜答對！</p>";
    } else {
        $feedback = "<p>不正確，這題答案是: $correct_answer</p>";
    }
} elseif ($action === 'next') {
    // 處理下一題
    $_SESSION['current_question_index']++;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
} elseif ($action === 'restart') {
    // 處理重新開始
    session_unset();
    session_destroy();
    header("Location: test_start.php");
    exit;
}
?>

<div id="quiz">
    <p><strong>題號: <?php echo $question['id']; ?></strong></p>
    <p><?php echo $question['question']; ?></p>
    <form method="post">
        <label>
            <input type="radio" name="answer" value="A" required <?php if ($user_answer === 'A') echo 'checked'; ?>>
            <?php echo $question['option_a']; ?>
        </label><br>
        <label>
            <input type="radio" name="answer" value="B" <?php if ($user_answer === 'B') echo 'checked'; ?>>
            <?php echo $question['option_b']; ?>
        </label><br>
        <label>
            <input type="radio" name="answer" value="C" <?php if ($user_answer === 'C') echo 'checked'; ?>>
            <?php echo $question['option_c']; ?>
        </label><br>
        <label>
            <input type="radio" name="answer" value="D" <?php if ($user_answer === 'D') echo 'checked'; ?>>
            <?php echo $question['option_d']; ?>
        </label><br><br>

        <?php if (!$user_answer || $action === 'next') { ?>
            <button type="submit" name="action" value="submit" class="btn btn-primary">提交答案</button>
        <?php } else { ?>
            <button type="submit" name="action" value="next" class="btn btn-dark">下一題</button>
        <?php } ?>
    </form>
    <br>
    <?php if ($feedback) echo $feedback; ?>
    <form method="post">
        <!--另一種寫法 <input type="submit" class="btn btn-secondary" value="從頭開始"> -->
        <button type="submit" name="action" value="restart" class="btn btn-secondary">從頭開始</button>
    </form>
</div>
<br>
<p>此測驗共有10題，目前已完成 <?php echo $_SESSION['current_question_index']; ?> 題，答對 <?php echo $_SESSION['correct_sum']; ?> 題。</p>
<?php
$conn->close();
?>
    <footer>
		<?php include("footer.html"); ?>
    </footer>
</body>
</html>


