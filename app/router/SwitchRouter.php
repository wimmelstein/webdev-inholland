<?php
namespace Router;

use Controller\HomeController;
use Controller\ArticleController;

class SwitchRouter
{
    public function route($uri, $method, $body, $path)
    {
        switch ($uri) {
            case '':
                $controller = new HomeController();
                $controller->index();
                break;
            case 'about':
                $controller = new HomeController();
                $controller->about();
                break;
            case 'articles':
                $controller = new ArticleController();
                if ($method === 'POST') {
                    $controller->createArticle(json_decode($body, true));
                }
                if ($method === 'DELETE') {
                    $controller->deleteArticle($path);
                }
                if ($method === 'GET') {
                    if ($path == null) {
                        $controller->index();
                    } else {
                       $controller->getOneArticle($path);
                    }
                }
                break;
            default:
                echo '404 not found';
                http_response_code(404);
        }
    }
}

