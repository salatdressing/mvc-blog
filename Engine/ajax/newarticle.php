<?php

require_once '../../View/sql.php';
$pdo = new PDO("mysql:dbname=$dbname;dbhost=$dbhost;charset=utf8", $dbuser, $dbpass);

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['article_title'] !== "" && $_POST['article_content'] !== "") {
  $stmt = $pdo->prepare("INSERT INTO articles (articleTitle, articleContent) VALUES (:articleTitle, :articleContent)");
  $result = $stmt->execute(array('articleTitle' => $_POST['article_title'], 'articleContent' => $_POST['article_content']));
  echo "Artikel erfolgreich veröffentlicht";
} else {
  echo "Hoppla! Es ist leider etwas schiefgelaufen! :(";
}

 ?>
