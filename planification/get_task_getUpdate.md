#Route : GET / task / getUpdate

##Objectifs de la requête
Afficher le formulaire de modification de la description d’une tâche.

###Méthode HTTP
`GET`

###Données de la requête
L’`id` de la tâche
 
###Données persistantes
Utilisateur dans la session

###Dépendances ?
Modèle `Task`

###Commentaire sur la route
Ici la première étape consiste à récupérer les tâches de l’utilisateur, puis de les parcourir pour leur ajouter dynamiquement une propriété nommée `editable`. Pour la tâche dont l’`id` est fourni, on mettra la valeur de celle-ci à 1, pour les autres, à 0. Cette propriété permettra de décider où afficher le formulaire dans la vue.

###Requête SQL ?
Celle qui permet de récupérer les tâches.

#Réponse
##Type
Vue

###Layout ?
`layout.php`

###Vue principale
`taskindex.php`

###Données pour la vue principale
`tasks` (la liste des tâches de l’utilisateur connecté)

###Vues liées ?
Formulaire d’ajout de tâche

###Données pour la vue liée
Aucune

##Cookie associé ?
Aucun

##En-têtes ?
Session