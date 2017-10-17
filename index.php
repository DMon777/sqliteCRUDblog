<?php

require_once "Model.php";


$model = new Model();
//$model->createTable();
//$model->insertArticle(
//    'title','small article text','full article text'
//);
$articles = $model->getAllArticles();

echo "<a href = 'http://sqlitecrudblog.local/create_article.php'> редактировать статьи </a>";

foreach ($articles as $key => $val){
    echo "<h1>".$val['title']."</h1>";
    echo "<p>".$val['introText']."</p>";
    echo "<p><a href='full_article.php/?id={$val['id']}'>full</a></p> ";
}
