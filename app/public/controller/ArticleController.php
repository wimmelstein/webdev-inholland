<?php
namespace Controller;

use Service\ArticleService;

class ArticleController
{

    private ArticleService $service;

    public function __construct()
    {
        $this->service = new ArticleService();
    }

    public function index()
    {
        $articles = $this->service->getAllArticles();
        echo json_encode($articles);
    }

    public function createArticle($vars)
    {
        $name = $vars["name"];
        $price = $vars["price"];
        return $this->service->createArticle($name, $price);
    }

    public function deleteArticle($id)
    {
        return $this->service->deleteArticle($id);
    }

    public function getOneArticle($path)
    {
        $article = $this->service->getOneArticle($path);
        echo json_encode($article);

    }
}