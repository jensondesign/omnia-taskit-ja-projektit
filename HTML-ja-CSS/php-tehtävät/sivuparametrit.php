<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nettiteknologia</title>
</head>

<body>
    <?php
    if (!isset($_GET['tekno'])) {
        echo '<a href="nettiteknologia.php?tekno=html">HTML</a><br>';
        echo '<a href="nettiteknologia.php?tekno=css">CSS</a><br>';
        echo '<a href="nettiteknologia.php?tekno=javascript">Javascript</a><br>';
        echo '<a href="nettiteknologia.php?tekno=php">PHP</a><br>';
    } elseif ($_GET['tekno'] == 'html') {
        echo 'HTML kuvaa dokumentin rakenteen.';
    } elseif ($_GET['tekno'] == 'css') {
        echo 'CSS määrittää dokumentin ulkoasun.';
    } elseif ($_GET['tekno'] == 'javascript') {
        echo 'Javascript on selainpuolen kieli.';
    } elseif ($_GET['tekno'] == 'php') {
        echo 'PHP on palvelinpuolen kieli.';
    } else {
        echo 'Haluamaasi teknologiaa ei löydy.';
    }
    ?>
</body>

</html>