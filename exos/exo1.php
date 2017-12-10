<?php
require_once '../inc/functions.php';
require '../vendor/autoload.php';

/*
 * Exo 1 : En voiture.
 *
 * Il est temps de prendre la route pour ne pas être en retard
 * au rendez-vous des joyeux Zikos.
 *
 * Un controller `ConcertController` possède une méthode `enVoiture`,
 * il faut définir une route pour appeller cette méthode
 * lorsque la racine de l'application `/` est appellée.
 *
 * Un outil est déjà prêt à recevoir les instructions : AltoRouter qui est instancié dans $router
 *
 * En route
 *
 * Par exemple :
 *      $router-> ...
 *      en passant "controller#methode"
 */

$router = new AltoRouter();

// OK ici pas besoin de définir le base path pour obtenir le 'Yeaaah!' tant convoité
// Je définis ma route via la méthode map
$router->map('GET', '/', 'ConcertController#enVoiture', 'home');

/*
 * Tests
 * Pas touche !
 */
displayExo(1, (
    checkRoute($router)
));
