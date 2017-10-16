<?php

require_once "Model.php";

echo "try sqlite";

$model = new Model();
//$model->createTable();
//$model->insertArticle(
//    'title','small article text','full article text'
//);
$articles = $model->getAllArticles();

foreach ($articles as $key => $val){
    echo "<h1>".$val['title']."</h1>";
    echo "<p>".$val['introText']."</p>";
    echo "<p><a href='full_article.php/?id={$val['id']}'>full</a></p> ";
}
