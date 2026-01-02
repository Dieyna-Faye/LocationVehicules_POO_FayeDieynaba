<?php
require_once __DIR__ . '/../Crud/Client_crud.php';

if(!isset($_GET['id'])) die("ID manquant !");
$clientCrud = new Client_crud();
$clientCrud->delete($_GET['id']);

header('Location: ../dasbordclient.php');
exit;
