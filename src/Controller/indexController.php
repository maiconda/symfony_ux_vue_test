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
        return $this->render('index/index.html.twig', compact('posts'));
    }

    #[Route('/post/{slug?}', name: 'app_show')]
    public function show(string $slug = null): Response
    {
        return $this->render('index/single.html.twig', compact('slug'));
    }

    private function getPosts(): array
    {
        return [
            ['id' => 1, 'title' => 'Title 1', 'content' => 'Content 1', 'slug' => 'postegem teste 1'],
            ['id' => 2, 'title' => 'Title 2', 'content' => 'Content 2', 'slug' => 'postegem teste 2'],
            ['id' => 3, 'title' => 'Title 3', 'content' => 'Content 3', 'slug' => 'postegem teste 3'],
            ['id' => 4, 'title' => 'Title 4', 'content' => 'Content 4', 'slug' => 'postegem teste 4'],
            ['id' => 5, 'title' => 'Title 5', 'content' => 'Content 5', 'slug' => 'postegem teste 5'],
        ];
    }
}