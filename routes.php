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

// Author routes
$router->get('/authors', 'AuthorController@list'); // List all authors
$router->get('/authors/(\d+)', 'AuthorController@detail'); // Show detail of a book
$router->get('/authors/add', 'AuthorController@add'); // Show add book form
$router->post('/authors/add', 'AuthorController@save');
// Author delete route
$router->get('/authors/delete/(\d+)', 'AuthorController@delete'); // Delete an author by ID
