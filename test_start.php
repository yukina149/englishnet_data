<?php include('header.php'); ?>
<link rel="stylesheet" href="style.css">
<!--using Bootstrap 5 css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Using Bootstrap 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2eac5448b1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> <!-- 載入 JQuery --></head>
<main>
    <section id="game">
        <h2>測驗</h2>
        <p>準備好測試自己對上方的文章了解度了嗎？點擊下方按鈕開始測驗！</p>
        <form action="english_net.php" method="post">
            <button type="submit" class="btn btn-primary">開始測驗</button>
        </form>
    </section>
</main>


    <footer>
		<?php include("footer.html"); ?>
    </footer>
</body>
</html>