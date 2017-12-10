<?php
require_once '../inc/functions.php';

/*
 * Exo 3 : Loges
 *
 * On se prépare pour le concert, un dernier tour des partoches,
 * quelques médiators dans la poche,
 * les baguettes porte-bonheur,
 * Sans oublier le petit rituel de la bande avant d'y aller ...
 *
 * Un petit Pierre Papier Ciseaux pour connaître l'ordre d'entrée en scène
 *
 * Les valeurs acceptées sont
 * - rock
 * - paper
 * - scissors
 *
 * Le choix du joueur est placé en paramètre GET 'choice'
 *
 * Par exemple :
 *   rockPaperScissors() doit renvoyer un tableau associatif sous la forme
 *  [
 *    'user' => 'paper',
 *    'ia' => 'rock',
 *    'win' => true
 *  ]
 *
 */

$userChoice = $_GET['choice'];
// $winCase = [
//   'rock' => [
//     'scissors' => true,
//   ],
//   'paper' => [
//     'rock' => true,
//   ],
//   'scissors' => [
//     'rock' => false,
//   ]
// ];
$winCase = [
  'rock' => [
    'scissors' => true,
  ],
  'paper' => [
    'rock' => true,
  ],
  'scissors' => [
    'paper' => true,
  ]
];

function rockPaperScissors($user) {

    global $winCase;

    $choices = ['rock', 'paper', 'scissors'];

    // Choix aléatoire pour l'IA
    $iaChoice = $choices[array_rand($choices)];

    // On test si le choix de l'IA correspond à la condition de victoire
    // contenue dans le tableau $winCase
    if(array_key_exists($iaChoice, $winCase[$user])) {
      $userWon = $winCase[$user][$iaChoice];
    }
    else {
      $userWon = false;
    }

    return [
      'user' => $user, // Choix de l'utilisateur
      'ia' => $iaChoice, // Choix aléatoire
      'win' => $userWon, // L'utilisateur gagne ?
    ];
}

$result = rockPaperScissors($userChoice);

echo '<pre>';
var_dump($result);
echo '</pre>';


/*
 * Tests
 * Pas touche !
 */
displayExo(3, checkShifumi(rockPaperScissors($userChoice)));
