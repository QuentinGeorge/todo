#Route : POST / task / create

##Objectifs de la requête
Ajouter une tâche dans la table

###Méthode HTTP
`POST`

###Données de la requête
la description de la tâche à créer
 
###Données persistantes
Utilisateur dans la session

###Dépendances ?
Modèle `Task`
Modèle `Task_User`

###Commentaire sur la route
Lorsqu’une tâche est créée, elle produit un `id` dans la table. Vous devez bien sûr établir la liaison entre cet `id` et l’`id` de l’utilisateur connecté. `PDO` vous offre une méthode, `lastInsertId`. Mais il vous est interdit d’utiliser `PDO` directement dans les contrôleurs. Pensez donc à ajouter à votre modèle générique une méthode qui donne accès à cette fonction de votre objet `PDO`.


###Requête SQL ?
```sql
INSERT INTO tasks('description') VALUES(:description)
```
-> doit être stockée dans le modèle générique et permettre d’ajouter dans n’importe quelle table, comme fait au cours.
La colonne `is_done` a une valeur par défaut de 0, pas besoin de l’ajouter.

#Réponse
##Type
Redirection vers `GET / task / index`
