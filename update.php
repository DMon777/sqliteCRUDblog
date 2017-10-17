<?php

require_once "Model.php";

$model = new Model();
$article_id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $model->updateArticle($article_id,$_POST['title'],
        $_POST['small_article'],$_POST['full_article']);
}

$article = $model->getArticle($article_id);
extract($article);
?>

<h2>Update urticle</h2>
<form action="" method="post" >
    <label for="title">title</label>
    <input type="text" value="<?=$title?>" name="title" id="title"><br>
    <label for="small_article">Вступительная статья</label>
    <textarea cols="40" rows="3"  name="small_article" id="small_article">
        <?=$introText;?>
    </textarea><br>
    <label for="full_article">Cтатья</label>
    <textarea cols = '40' rows="10" name="full_article" id="full_article">
        <?=$fullText;?>
    </textarea><br>
    <input type="submit" name="save" value="Сохранить">
</form>
<hr>
<a href="http://sqlitecrudblog.local">На главную</a>
