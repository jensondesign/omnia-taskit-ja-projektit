<?php

// Aloita istunto 
session_start();

// Poista kaikki sessioparametrit
session_unset();

// Tuhoa istunto
session_destroy();

// Uudelleenohjaa käyttäjä takaisin kirjaudu-sivulle
header('Location: kirjautuminen.php');
exit();
