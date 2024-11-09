<?php

$router->setNamespace('\App\Controllers');

$router->get('/', 'HomeController@index');

$router->get('/books', 'BookController@list');
$router->get('/books/(\d+)', 'BookController@detail');
$router->get('/books/add', 'BookController@add');
$router->post('/books/add', 'BookController@save');
$router->get('/books/delete/(\d+)', 'BookController@delete');
$router->get('/books/edit/(\d+)', 'BookController@edit');
$router->post('/books/edit/(\d+)', 'BookController@saveEdit');

$router->get('/authors', 'AuthorController@list');
$router->get('/authors/(\d+)', 'AuthorController@detail');
$router->get('/authors/add', 'AuthorController@add');
$router->post('/authors/add', 'AuthorController@save');
$router->get('/authors/delete/(\d+)', 'AuthorController@delete');
$router->get('/authors/edit/(\d+)', 'AuthorController@edit');
$router->post('/authors/edit/(\d+)', 'AuthorController@saveEdit');

$router->post('/genres/add', 'GenreController@save');

$router->get('/users', 'UserController@list');
$router->get('/users/(\d+)', 'UserController@detail');
$router->get('/users/add', 'UserController@add');
$router->post('/users/add', 'UserController@save');
$router->get('/users/delete/(\d+)', 'UserController@delete');
$router->get('/users/edit/(\d+)', 'UserController@edit');
$router->post('/users/edit/(\d+)', 'UserController@saveEdit');

$router->get('/statistic', 'BookController@stats');
