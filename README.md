

# Application de Location de Véhicules

## Description
Application web de gestion de location de véhicules développée en **PHP Orienté Objet (POO)**.  
Elle permet à un administrateur de gérer :

- Les véhicules (voitures, motos, camions)
- Les clients
- Les locations
- L’historique des locations

L’application dispose d’un **tableau de bord administrateur** 

---

##  Fonctionnalités
- Ajouter / modifier / supprimer un véhicule
- Gestion des clients
- Gestion des locations
- Statut des locations (en cours / terminée)
- Historique des locations
- Recherche (clients, véhicules, locations)
- Upload d’images de véhicules
- Authentification administrateur (identifiants fixes)

---

##  Structure du projet


*Structure du projet

/config
    -Database.php # Connexion à la base de données

/models
    Interface/
        -Louable #inteface a implemente par la classe abstraite vehicule
    -Vehicule.php # Classe mère
    -Voiture.php #classe fille
    -Motos.php #classe fille
    -Camion.php #classe fille
    -Client.php #classe fille 
    -Location.php #classe fille

/Crud
    -Vehicule_crud.php // les controllers
    -Client_crud.php
    -Location_crud.php

/vehicules
    -ajout_vehicule.php
    -modification_vehicule.php
    -supprimer_vehicule.php
/CLient
    -ajout_client.php
    -modification_client.php
    -supprimer_client.php
/Location
    -ajout_location.php
    -modification_location.php
    -supprimer_location.php

dasbordlocation.php
dasbordloc.php
dasbordclient.php
dasbordhistorique.php
dasbordlocation.php
Connexion.php



---

## Maquette Figma
Lien vers la maquette du projet :  
https://www.figma.com/design/alipxx7ZTgi9R9ymDq540T/projet-voiture?node-id=97-25&t=n7fW0gV3aqohVqgc-1

---

## Accès Administrateur
- Identifiants fixes définis dans le code
- Aucun système d’inscription utilisateur

---

## Technologies utilisées
- PHP (POO)
- MySQL
- HTML / CSS
- phpMyAdmin
- Figma
