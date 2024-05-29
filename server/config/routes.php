<?php
// Formulaire/server/config/routes.php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        // Route pour afficher la page d'accueil
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        // Routes pour les pages statiques
        $builder->connect('/pages/*', 'Pages::display');

        // Route pour soumettre le formulaire de contact
        $builder->connect('/contact/submit-message', ['controller' => 'Contact', 'action' => 'submitMessage']);
    });

    // Route de secours pour les autres requêtes
    $routes->options('/*', ["controller"=>'Pages', 'action' => 'page']);
    $routes->fallbacks(DashedRoute::class);
};