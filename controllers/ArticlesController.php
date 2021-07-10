<?php
require_once "Controller.php";

class ArticlesController extends Controller
{
    private $articleModel;

    public function __construct()
    {
        $this->articleModel = $this->model('Article');
    }

    public function create()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => trim($_POST['title']),
                'author' => trim($_POST['author']),
                'body' => trim($_POST['body']),
                'title_err' => '',
                'body_err' => '',
                'author_arr' => '',
            ];


            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter article title';
            }
            if (empty($data['author'])) {
                $data['author_err'] = 'Please enter author name';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter the article content';
            }

            //validate error free
            if (empty($data['title_err']) && empty($data['author_arr']) && empty($data['body_err'])) {
                if ($this->articleModel->addArticle($data)) {
                    redirect('');
                } else {
                    die('something went wrong');
                }

                //laod view with error
            } else {
                $this->view('articlesTable', $data);
            }
        } else {
            /*  $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body'])
            ];

            $this->view('posts/add', $data);*/
        }
    }

    public function readArticle()
    {
        $article = $this->articleModel->getArticle();
        $data = [
            'article' => $article
        ];

    }

    public function readAll()
    {
        $articles = $this->articleModel->getArticles();
        $data = [
            'articles' => $articles
        ];
        $this->view('articlesTable', $data);
    }


    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => trim($_POST['update']),
                'title' => trim($_POST['title']),
                'author' => trim($_POST['author']),
                'body' => trim($_POST['body']),
                'title_err' => '',
                'body_err' => '',
            ];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter article title';
            }
            if (empty($data['author'])) {
                $data['author_err'] = 'Please enter author name';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter the article content';
            }

            //validate error free
                if ($this->articleModel->updateArticle($data)) {
                } else {
                    die('something went wrong');
                }

                $this->readAll();

        }
    }
    public function delete(){
        $data = [
            'id' => $_POST['delete']
        ];
        $this->articleModel->delete($data);
        $this->readAll();
    }
}
