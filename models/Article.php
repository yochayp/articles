<?php

include_once "db/DbAccess.php";

class Article
{

    private $db;

    public function __construct()
    {
        $this->db = new DbAccess;
    }

    public function getArticles()
    {
        $this->db->query(
            'SELECT *
            FROM articles'
        );
        $result = $this->db->resultSet();
        return $result;
    }

    public function getArticle($data){
        $this->db->query(
            'SELECT *
            FROM articles
            WHERE id = :id'
        );
        $result = $this->db->resultSet();
        return $result;
    }


    public function addArticle($data)
    {
        $this->db->query('INSERT INTO articles(title,body,author) VALUES (:title,:body,:author)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':author', $data['author']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateArticle($data)
    {
        echo $data['id'];
        $this->db->query('UPDATE articles SET title = :title, body = :body, author=:author WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':author', $data['author']);

        //execute 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data){
        $this->db->query('DELETE FROM articles WHERE id = :id');
        $this->db->bind(':id',$data['id']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
