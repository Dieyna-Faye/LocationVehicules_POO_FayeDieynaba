<?php
require_once __DIR__ . '/../Crud/Client_crud.php';

$clientCrud = new Client_crud();
$clientCrud->store(); 
?>