<?php

require_once "Model.php";
$model = new Model();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $model->addArticle($_POST['title'],
        $_POST['small_article'],
        $_POST['full_article']);
}

if($_GET['delid']){
    $model->deleteArticle($_GET['delid']);
}

$articles = $model->getAllArticles();
?>

<h2>Добавить статью</h2>
<form action="" method="post" >
    <label for="title">title</label>
    <input type="text" name="title" id="title"><br>
    <label for="small_article">Вступительная статья</label>
    <textarea name="small_article" id="small_article"></textarea><br>
    <label for="full_article">Cтатья</label>
    <textarea name="full_article" id="full_article"></textarea><br>
    <input type="submit" name="add" value="Добавить">
</form>

<?foreach ($articles as $key => $val):?>

    <h3><?=$val['title'];?></h3>
    <p><a href = "create_article.php/?delid=<?=$val['id']?>">delete</a></p>
<?endforeach;?>