<?php

$router->setNamespace('\App\Controllers');

// Home route
$router->get('/', 'HomeController@index');

// Book routes
$router->get('/books', 'BookController@list'); // List all books
$router->get('/books/(\d+)', 'BookController@detail'); // Show detail of a book
$router->get('/books/add', 'BookController@add'); // Show add book form
$router->post('/books/add', 'BookController@save'); // Show add book form
$router->get('/books/delete/(\d+)', 'BookController@delete'); // Delete an author by ID
$router->get('/books/edit/(\d+)', 'BookController@edit'); // Show edit form
$router->post('/books/edit/(\d+)', 'BookController@saveEdit'); // Handle edit form submission
// Author routes
$router->get('/authors', 'AuthorController@list'); // List all authors
$router->get('/authors/(\d+)', 'AuthorController@detail'); // Show detail of a book
$router->get('/authors/add', 'AuthorController@add'); // Show add book form
$router->post('/authors/add', 'AuthorController@save');
$router->get('/authors/delete/(\d+)', 'AuthorController@delete'); // Delete an author by ID
$router->post('/authors/edit/(\d+)', 'AuthorController@saveEdit'); // Handle edit form submission

$router->post('/genres/add', 'GenreController@save'); // Handle genre creation
