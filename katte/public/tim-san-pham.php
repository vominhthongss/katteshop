<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<head>
    <title>
        Katte Shop
    </title>
    <link rel="icon" href="images/logoshop.png">
</head>

<body>

    <?php include "body-header.php" ?>
    <?php include "body-search.php" ?>
    <?php include "body-navigation.php" ?>
    <?php
    include "dbConfig.php";
    echo "<div>";
    $tukhoatimkiem='.';
    if($_GET["tukhoatimkiem"]){
        echo "<h3 style='color:brown;'>Từ khóa tìm kiếm: '".$_GET['tukhoatimkiem']."'</h3>";
        $tukhoatimkiem=$_GET['tukhoatimkiem'];

    }
    echo "</div>";
    ?>
    <?php 
        include "dbConfig.php"; 
        $sql = "SELECT * FROM hanghoa WHERE TenHH LIKE '%".$tukhoatimkiem."%' ORDER BY TenHH ASC";
    ?>
    <?php 
        include "productcss.php";
    ?>

    <?php include "body-footer.php" ?>
    <link rel="stylesheet" href="css/katte.css">
    <script src="javascript/katte.js"></script>
</body>

</html>