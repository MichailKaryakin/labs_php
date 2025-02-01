<?php

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$date = $_POST['date'];
$password = $_POST['password'];

$photo_path = "data_files/user_" . $name . ".jpeg";
$file_path = "data_files/user_" . $name . "_data.txt";
$handler = fopen($file_path, "w+");
fprintf($handler, chr(0xEF) . chr(0xBB) . chr(0xBF));

fwrite($handler, $name);
fwrite($handler, "\n");
fwrite($handler, $email);
fwrite($handler, "\n");
fwrite($handler, $age);
fwrite($handler, "\n");
fwrite($handler, $date);
fwrite($handler, "\n");
fwrite($handler, $password);
fwrite($handler, "\n");

if (isset($_POST['character'])) {
    $character = $_POST['character'];
    fwrite($handler, $character);
    fwrite($handler, "\n");
}
if (isset($_POST['banana'])) {
    $banana = $_POST['banana'];
    fwrite($handler, "banana ");
    fwrite($handler, $banana);
    fwrite($handler, "\n");
}
if (isset($_POST['apple'])) {
    $apple = $_POST['apple'];
    fwrite($handler, "apple ");
    fwrite($handler, $apple);
    fwrite($handler, "\n");
}
if (isset($_POST['pear'])) {
    $pear = $_POST['pear'];
    fwrite($handler, "pear ");
    fwrite($handler, $pear);
    fwrite($handler, "\n");
}
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    fwrite($handler, $gender);
    fwrite($handler, "\n");
}
if (isset($_POST['favoriteArtist'])) {
    $favoriteArtist = $_POST['favoriteArtist'];
    fwrite($handler, $favoriteArtist);
    fwrite($handler, "\n");
}
if (isset($_POST['bio'])) {
    $bio = $_POST['bio'];
    fwrite($handler, $bio);
    fwrite($handler, "\n");
}
if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
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
    <link href="../css/style.css" rel="stylesheet">
    <title>Практическая работа №3</title>
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
                    <a class="nav-link" aria-current="page" href="../index.html">Статья</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../table_and_graph.html">График</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../notes.html" aria-disabled="true">Заметки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../form.html" aria-disabled="true">Анкета</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../api.html" aria-disabled="true">Внешнее API</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="finalBox">
    <span>
        <?php
        if (move_uploaded_file($_FILES['file']['tmp_name'], $photo_path)) {
            echo "<img class='thumb' src='$photo_path', alt='$photo_path'/><br>";
        } else {
            echo "File not selected\n";
        }
        echo "<a href=\"$file_path\">Файл</a>";
        ?>
    </span>
</div>

<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="../index.html" class="nav-link px-2 text-muted">Статья</a></li>
            <li class="nav-item"><a href="../table_and_graph.html" class="nav-link px-2 text-muted">График</a></li>
            <li class="nav-item"><a href="../notes.html" class="nav-link px-2 text-muted">Заметки</a></li>
            <li class="nav-item"><a href="../form.html" class="nav-link px-2 text-muted">Анкета</a></li>
            <li class="nav-item"><a href="../api.html" class="nav-link px-2 text-muted">Внешнее API</a></li>
        </ul>
        <p class="text-center text-muted"><a id="footer"></a>© 2021 Company, Inc</p>
    </footer>
</div>

</body>

</html>
