#Route : POST / auth / postLogin

##Objectifs de la requête
Connecter un utilisateur après avoir vérifié qu’il existe.

###Méthode HTTP
`POST`

###Données de la requête
`email` et `password`

###Données persistantes
L’utilisateur sera créé dans la session au terme de cette route

###Dépendances ?
Modèle `User`

###Commentaire sur la route
Cette procédure est la même que celle vue en classe

###Requête SQL ?
```sql
SELECT * FROM users WHERE email = :email AND password = :password
```

#Réponse
##Type
Redirection vers `GET / task / index`