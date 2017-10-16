<?php

class DB
{

    private $db;

    public function __construct()
    {
        try{
            $this->db = new PDO('sqlite:blog.db');
        }
        catch(PDOException $e){
            echo "connection fault:".$e->getMessage();
        }
    }

    public function pdoQuery($sql)
    {
        return $this->db->query($sql);
    }

    public function safeVar($var)
    {
        return $this->db->quote($var);
    }

}