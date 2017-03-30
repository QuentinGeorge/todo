#Route : POST / task / postDelete

##Objectifs de la requête
Supprimer une tâche de la table

###Méthode HTTP
`POST`

###Données de la requête
l’`id` de la tâche à supprimer
 
###Données persistantes
Utilisateur dans la session

###Dépendances ?
Modèle `Task`

###Commentaire sur la route
La tâche vous est facilitée par un trigger dans la base de données. Lorsque vous supprimez une tâche, la suppression cascade vers la table qui lie cette tâche à son propriétaire. Vous n’avez donc qu’à supprimer la tâche pour que les deux suppressions se réalisent. 

###Requête SQL ?
```sql
DELETE FROM tasks WHERE id = :id
```
-> doit être stockée dans le modèle générique et permettre de supprimer dans n’importe quelle table

#Réponse
##Type
Redirection vers `GET / task / index`
