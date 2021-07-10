<?php

require_once "Controller.php";
  class PagesController extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      
      

      $articles =[];// $this->articleModel->getArticles();
      $data = [
          'articles' => $articles
      ];
      $this->view('articlesTable',$data);
    }

  }