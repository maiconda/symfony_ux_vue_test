<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\BookRepository;

class BookController extends AbstractController
{
    #[Route('/api/books', name: 'books_list', methods: ['GET'])]
    public function books(BookRepository $bookRepository): Response
    {
        return $this->json([
            'data' => $bookRepository->findAll()]);
    }

    #[Route('/api/book/{book}', name: 'book', methods: ['GET'])]
    public function book(int $book, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($book);
        if (!$book) {
            return $this->json(['message' => 'Book not found'], 404);
        }

        return $this->json([
            'data' => $bookRepository->find($book)]);
    }

    #[Route('/api/create', name: 'books_create', methods: ['POST'])]
    public function create(Request $request, BookRepository $bookRepository): JsonResponse
    {
        $data = $request->request->all();
        $book = new Book();
        $book->setTitle($data['title']);
        $book->setPublisher($data['publisher']);
        $book->setDescription($data['description']);
        $book->setAuthor($data['author']);
        try {
            $book->setPublicationDate(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        } catch (\Exception $e) {
        }
        try {
            $book->setCreatedAt(new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo')));
        } catch (\Exception $e) {
        }
        try {
            $book->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo')));
        } catch (\Exception $e) {
        }

        $bookRepository->add($book, true);

        return $this->json([
            'message' => 'book created successfully',
        ], 201);
    }

    #[Route('/api/update/{book}', name: 'books_update', methods: ['PUT', 'PATCH'])]
    public function update(int $book, Request $request, BookRepository $bookRepository): JsonResponse
    {
        $book = $bookRepository->find($book);
        if (!$book) {
            return $this->json(['message' => 'Book not found'], 404);
        }

        $data = $request->request->all();
        $book->setTitle($data['title']);
        $book->setPublisher($data['publisher']);
        $book->setDescription($data['description']);
        $book->setAuthor($data['author']);
        try {
            $book->setPublicationDate(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        } catch (\Exception $e) {
        }
        try {
            $book->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo')));
        } catch (\Exception $e) {
        }

        $bookRepository->update(true);

        return $this->json([
            'message' => 'Book updated successfully',
        ]);
    }

    #[Route('/api/delete/{book}', name: 'books_remove', methods: ['DELETE'])]
    public function delete(int $book, Request $request, BookRepository $bookRepository): JsonResponse
    {
        $book = $bookRepository->find($book);
        if (!$book) {
            return $this->json(['message' => 'Book not found'], 404);
        }
        $bookRepository->delete($book, true);

        return $this->json([
            'message' => 'Book deleted successfully',
        ]);
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }
}