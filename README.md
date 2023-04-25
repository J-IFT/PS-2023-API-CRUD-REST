# PS-2023-API-CRUD-REST

*PS = Projet Scolaire*

## 📚 Projet Scolaire | TP API CRUD REST

Avril 2023

Groupe : Juliette, Jeremy, Flavien, Loris & Brice

### 📌 Consignes du projet :

Sur la base musique (script MySQL dans le zip du sujet), créer en Symfony, avec API Platform, une API REST et son application web de tests devant, comme vu en cours :

Permellre un CRUD sur 3 ou 4 tables de la base (avec au moins une lable d'association)

Supporter les formats d'échanges JSON et XML

Sérialiser les objets liés (exemple: un GET sur les albums doit sérialiser aussi les morceaux qu'ils contiennent)

Comporter des filtres, subresources, tris et validations

### 📌 Fonctionnement du projet :

Commandes ->

Pour le créer : composer create-project symfony/website-skeleton TPApiCrudRest

Pour ajouter quelques dépendances : composer install ET composer require api

Pour le lancer : symfony server:start

Pour générer les classes de mes entités : php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity

Pour le crud : php bin/console make:crud


Choix du CRUD ->

Table "ALBUM": Cette table contient des informations sur les albums, y compris les noms d'artistes, les noms de groupe, le titre de l'album, le genre musical, la date de sortie et le prix.

Table "MORCEAU": Cette table contient des informations sur les chansons, y compris les titres, les durées et les liens vers les albums auxquels elles appartiennent.

Table "CONTENU": Cette table est une table d'association qui relie les morceaux aux albums auxquels ils appartiennent.


### 💻 Applications et langages utilisés :

+ PHP Symfony
+ PhpStorm



## 🌸 Merci !
© J-IFT
