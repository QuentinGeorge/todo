#Route : GET / task / index

##Objectifs de la requête
Lister les tâches de l’utilisateur connecté.

###Méthode HTTP
`GET`

###Données de la requête
Aucune
 
###Données persistantes
Utilisateur dans la session

###Dépendances ?
Modèle `Task`

###Commentaire sur la route
Aucun

###Requête SQL ?
```sql
SELECT tasks.id AS taskId, tasks.description AS taskDescription, tasks.is_done AS taskIsDone 
FROM tasks
LEFT JOIN task_user ON tasks.id = task_user.task_id
LEFT JOIN users ON task_user.user_id = users.id
WHERE users.id = :userId
ORDER BY description ASC
```

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