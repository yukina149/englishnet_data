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
    //設定分數跟題數
        $score=0;
        $correct_sum=0;
        session_start();
        
        
            //資料庫的連接
            $servername = "my-db1.c4li6gbfgebb.us-east-1.rds.amazonaws.com";
            $username = "admin";
            $password = "12345678";
            $dbname = "mydata";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
        
        // Initialize session variables
        if (!isset($_SESSION['current_question_index'])) {
            $_SESSION['current_question_index'] = 0;
        }

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

        $user_answer = $_POST['answer'] ?? null;
        $feedback = "";
        $show_next_button = false;
        $show_submit_button = true;


        if ($user_answer) {
            $correct_answer = $question['correct_answer'];
            if ($user_answer === $correct_answer) {
                $score+=10;
                $correct_sum+=1;
                $feedback = "<p>恭喜答對！</p>";
            } else {
                $feedback = "<p>不正確，這題答案是: $correct_answer</p>";
            }
            //顯示下一題的按鈕
            $show_next_button = true;
            $show_submit_button = false;
        }
        if (isset($_POST['next'])) {
            $_SESSION['current_question_index']++;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
        // 原本是要寫按下按鈕從頭開始就會清空session但是按鈕的位置就不能下移，尚未解決 哭
        /*if (isset($_POST['restart'])) {
        session_destroy();
        //導回網頁
        header("Location: test_start.php");
        exit;
        }   */



        // Debugging log for current state
        error_log("Current Question Index: $current_index");
        error_log("User Answer: $user_answer");
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
 

                        <?php if ($show_submit_button) { ?>
                            <form method="post" style="display: inline;">
                                <button type="submit" class="btn btn-light">提交答案</button>
                            </form>
                        <?php } ?>
                        <?php if ($show_next_button) { ?>
                            <form method="post" style="display: inline;">
                                <button type="submit" name="next" class="btn btn-dark">下一題</button>
                            </form>
                        <?php } ?>



            </form>
            <br>
            <?php if ($feedback) echo $feedback; ?> 
            <div class="button-group">
                <div class="row">
                    <form method="post" action="test_start.php" style="display: inline;">
                        <button type="submit" class="btn btn-secondary" name="restart">從頭開始</button>
                    </form>
                </div>
            </div>
           
        </div>
    </section>
</main>
    <?php
    $conn->close();
    ?>
    <footer>
		<?php include("footer.php"); ?>
    </footer>
</body>
</html>


