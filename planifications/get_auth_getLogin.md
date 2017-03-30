#Route : GET / auth / getLogin

##Objectifs de la requête
Permettre à un utilisateur déjà enregistré de se connecter en lui fournissant un formulaire de connexion.

###Méthode HTTP
`GET`

###Données de la requête
Aucune
 
###Données persistantes
Aucune

###Dépendances ?
Aucune

###Commentaire sur la route
Cette vue ne sert qu’à afficher un formulaire. Elle ne produit pas de données.

###Requête SQL ?
Aucune

#Réponse
##Type
Vue

###Layout ?
`layout.php`

###Vue principale
`userlogin.php`

###Données pour la vue principale
Aucune

###Vues liées ?
Aucune

##Cookie associé ?
Aucun

##En-têtes ?
Session