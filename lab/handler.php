<?php

$a = $_POST['name'];
$b = $_POST['email'];
$c = $_POST['age'];
$d = $_POST['date'];
$e = $_POST['password'];

$file_path = "data_files/user_" . $a . "_data.txt";
$handler = fopen($file_path, "w+");

fwrite($handler, $a);
fwrite($handler, "\n");
fwrite($handler, $b);
fwrite($handler, "\n");
fwrite($handler, $c);
fwrite($handler, "\n");
fwrite($handler, $d);
fwrite($handler, "\n");
fwrite($handler, $e);
fwrite($handler, "\n");

if (isset($_POST['banana'])) {
    $f = $_POST['banana'];
    fwrite($handler, "banana ");
    fwrite($handler, $f);
    fwrite($handler, "\n");
}
if (isset($_POST['apple'])) {
    $g = $_POST['apple'];
    fwrite($handler, "apple ");
    fwrite($handler, $g);
    fwrite($handler, "\n");
}
if (isset($_POST['pear'])) {
    $h = $_POST['pear'];
    fwrite($handler, "pear ");
    fwrite($handler, $h);
    fwrite($handler, "\n");
}
if (isset($_POST['gender'])) {
    $i = $_POST['gender'];
    fwrite($handler, $i);
    fwrite($handler, "\n");
}
if (isset($_POST['favoriteArtist'])) {
    $j = $_POST['favoriteArtist'];
    fwrite($handler, $j);
    fwrite($handler, "\n");
}
if (isset($_POST['bio'])) {
    $k = $_POST['bio'];
    fwrite($handler, $k);
    fwrite($handler, "\n");
}
if (isset($_FILES['file'])) {
    $l = $_FILES['file']['tmp_name'];
    $photo_path = "data_files/user_" . $a . ".jpg";
    move_uploaded_file($_FILES['file']['tmp_name'], $photo_path);
}

fflush($handler);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
            integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
            crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
    <title>Практическая работа №2</title>
</head>

<body>

<nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.html">Статья</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="table_and_graf.html">График</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notes.html" aria-disabled="true">Заметки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.html" aria-disabled="true">Анкета</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div>
    Ссылка на файл:
    <span>
        <?php
            echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/data_files/'.$file_path.'>';
        ?>
    </span>
</div>

<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="index.html" class="nav-link px-2 text-muted">Статья</a></li>
            <li class="nav-item"><a href="table_and_graf.html" class="nav-link px-2 text-muted">График</a></li>
            <li class="nav-item"><a href="notes.html" class="nav-link px-2 text-muted">Заметки</a></li>
            <li class="nav-item"><a href="form.html" class="nav-link px-2 text-muted">Анкета</a></li>
        </ul>
        <p class="text-center text-muted"><a id="footer"></a>© 2021 Company, Inc</p>
    </footer>
</div>

</body>

</html>
