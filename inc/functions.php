<?php

require_once 'datas.php';

function checkRoute($router) {
    if (is_object ( $router )) {
        $routes = $router->getRoutes();
        if ( $routes[0][1] === '/' && $routes[0][2] === 'ConcertController#enVoiture') {
            return true;
        }
    }
    return false;
}
function checkSign($router) {
    if (is_object ( $router )) {
        $routes = $router->getRoutes();
        if ( $routes[0][1] === '/groupies/signer/[a:name]' && $routes[0][2] === 'ConcertController#autographe') {
            return true;
        }
    }
    return false;
}
function checkShifumi($results)
{
  $winCase = [
    'rock' => [
      'scissors' => true,
    ],
    'paper' => [
      'rock' => true,
    ],
    'scissors' => [
      'rock' => false,
    ]
  ];
  $choices = ['rock', 'paper', 'scissors'];
  if (!in_array($results['user'], $choices)) {
    return false;
  }
  if ($results['user'] === $results['ia']) {
    return false;
  }
  $resultGame = isset($winCase[$results['user']][$results['ia']]) ? $winCase[$results['user']][$results['ia']] : false;
  return $results['win'] === $resultGame;
}
function checkInstruments($marc, $joe) {
  if (!method_exists($marc, 'accordeInstrument')
    || !method_exists($joe, 'accordeInstrument')) return false;
  return ($marc->accordeInstrument() === "Marc le Guitariste prend sa guitare"
    && $joe->accordeInstrument() === "Joe accorde son instrument batterie");
}
function displayResult($bool) {
    if ($bool) {
        echo '<div id="result" class="success">Yeaaah!</div>';
    }
    else {
        echo '<div id="result" class="error">Nope!</div>';
    }
}

function displayHtml($data, $result) {
    global $datas;
    $id = $data['id'];
    ?><!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <title>Test <?= $id ?> - <?= $data['title'] ?></title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Overpass:300,900">
            <link rel="stylesheet" href="../css/app.css">
        </head>
        <body>
            <header id="header">
                <nav id="nav">
                <?php
                    foreach ($datas as $key => $value) {
                        $active = $key === $id ? ' class="active"' : '';
                        $query = isset($value['query']) ? $value['query'] : '';
                        $bonus = isset($value['bonus']) && $value['bonus'] ? ' - Bonus' : '';
                        echo '<a'.$active.' href="exo'.$key.'.php'.$query.'">Test '.$key.$bonus.'</a>';
                    }
                ?>
                </nav>
            </header>
            <section id="main">
                <div class="contenu">
                    <div id="intro">
                        <h1><?= $data['title'] ?></h1>
                        <h2><?= $data['subtitle'] ?></h2>
                    </div>
                    <?php displayResult($result) ?>
                </div>
            </section>
            <footer id="footer">
                <div class="contenu">
                    <div class="fright">On lâche rien jusqu'à ce qu'il y ait du vert !</div>
                </div>
            </footer>
        </body>
    </html>
    <?php
}

function displayExo($exo, $result) {
    global $datas;
    displayHtml($datas[$exo], $result);
}
