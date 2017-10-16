<?php

require_once "Model.php";

$id = $_GET['id'];

$model = new Model();
$article = $model->getArticle($id);

?>

<h1><?=$article['title']?></h1>
<p><?=$article['fullText']?></p>
<p><a href="<?=$_SERVER['HTTP_REFERER']?>">back</a> </p>