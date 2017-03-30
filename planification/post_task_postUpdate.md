#Route : POST / task / postUpdate

##Objectifs de la requête
Modifier une tâche dans la table

###Méthode HTTP
`POST`

###Données de la requête

* L’`id` de la tâche à modifier ;
* la `description` de la tâche à modifier (facultatif car on peut seulement changer le statut, `is_done`) ;
* le statut (`is_done`) de la tâche à modifier (facultatif car on peut seulement changer la description)

###Données persistantes
Utilisateur dans la session

###Dépendances ?
Modèle `Task`

###Commentaire sur la route


###Requête SQL ?
```sql
UPDATE tasks
SET description, is_done
WHERE id = :id
```
-> doit être stockée dans le modèle générique et permettre d’ajouter dans n’importe quelle table.

#Réponse
##Type
Redirection vers `GET / task / index`
