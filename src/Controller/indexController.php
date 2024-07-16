<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class indexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $posts = $this->getPosts();
        $onClick = function (){
            echo 'teste';
        };
        return $this->render('index/index.html.twig', [
            'posts' => $posts,
            'onClick' => $onClick
        ]);
    }

    #[Route('/post/{slug?}', name: 'app_show')]
    public function show(string $slug = null): Response
    {
        return $this->render('index/single.html.twig', compact('slug'));
    }

    private function getPosts(): array
    {
        return [
            ['id' => 1, 'title' => 'Introduction to Vue.js', 'content' => 'Vue.js is a progressive JavaScript framework for building user interfaces.'],
            ['id' => 2, 'title' => 'Getting Started with Symfony', 'content' => 'Symfony is a PHP web application framework and a set of reusable PHP components/libraries.'],
            ['id' => 3, 'title' => 'Using Bootstrap with Vue.js', 'content' => 'Bootstrap is a popular CSS framework that can be integrated with Vue.js for building responsive and attractive web applications.'],
            ['id' => 4, 'title' => 'Building RESTful APIs with Symfony', 'content' => 'Symfony provides robust support for creating RESTful APIs using bundles like FOSRestBundle.'],
            ['id' => 5, 'title' => 'Deploying Symfony Applications', 'content' => 'Deploying Symfony applications can be done using various hosting platforms and deployment strategies.'],
        ];

    }
}