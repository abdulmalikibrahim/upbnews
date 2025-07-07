<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->group('article', function($routes) {
    $routes->get('create/(:any)', 'Article::create/$1');
    $routes->get('getLinkArticle/(:num)', 'Article::getLink/$1');
    $routes->get('view/(:any)', 'Article::view/$1');

    $routes->post('save/(:any)', 'Article::save/$1');
    $routes->post('share', 'Article::share');
    $routes->get('category/(:num)', 'Article::category/$1');
    $routes->post('like', 'Article::like');
});
$routes->post('comment/submit', 'Comment::submit');

$routes->get('contact', 'Contact::index');