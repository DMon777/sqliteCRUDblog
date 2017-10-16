<?php

require_once "DB.php";

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    private function redirect($path = false)
    {
     if(!$path){
         header('Location :'.$_SERVER['HTTP_REFERER']);
     } else{
         header('Location: http://sqlitecrudblog.local/'.$path);
     }
    }

    public function createTable()
    {
        $sql = "CREATE TABLE articles (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT,
        introText TEXT,
        fullText TEXT )";
        return $this->db->pdoQuery($sql);
    }

    public function insertArticle($title,$intro_text,$full_text)
    {
        $sql = "INSERT INTO articles (title,introText,fullText)
        VALUES ('$title','$intro_text','$full_text')";
        return $this->db->pdoQuery($sql);
    }

    public function getAllArticles()
    {
        $sql = "SELECT * FROM articles ORDER BY id DESC";
        $pdoStatement = $this->db->pdoQuery($sql);
        $articles = [];
        while ($row = $pdoStatement->fetch(PDO::FETCH_ASSOC)){
            $articles[] = $row;
        }
        return $articles;
    }

    public function addArticle($title,$intro_text,$full_text)
    {
        $title = $this->db->safeVar($title);
        $intro_text = $this->db->safeVar($intro_text);
        $full_text = $this->db->safeVar($full_text);
        $sql = "INSERT INTO articles (title,introText,fullText)
        VALUES ($title,$intro_text,$full_text)";
        $this->db->pdoQuery($sql);
        $this->redirect();
    }

    /**
     * @param $id integer
     * @return array
     */
    public function getArticle($id){
       $id = (int)$id;
       $sql = "SELECT title,fullText FROM articles WHERE id=".$id;
       $result = $this->db->pdoQuery($sql);
       $article = $result->fetch(PDO::FETCH_ASSOC);
       return $article;
    }

    public function deleteArticle($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM articles WHERE id =".$id;
        $this->db->pdoQuery($sql);
        $this->redirect('create_article.php');
    }

}