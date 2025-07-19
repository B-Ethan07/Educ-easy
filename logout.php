<?php

session_start();

// Détruire toutes les données de session
session_unset();
session_destroy();

header('Location: login.php');
exit;
