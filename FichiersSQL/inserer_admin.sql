/*

Il est important de noter que pour des raisons de sécurité, le mot de passe doit être hashé avant d'être inséré dans la base de données. Pour cela, vous pouvez utiliser le fichier "scripthashage_mp.php" qui se trouve à la racine du projet afin de créer un mot de passe crypté. Vous devrez ensuite copier cette valeur et la coller à la place de "monmotdepasse" dans le script PHP fourni. N'oubliez pas de supprimer la valeur de votre mot de passe une fois que la requête a été correctement exécutée. Ensuite, vous pourrez exécuter la requête "INSERT INTO administrateurs (id, password) VALUES ('monid', 'monmotdepasse');" pour insérer les données dans la table des administrateurs.
*/

INSERT INTO administrateurs (id, password) VALUES ('monid', 'motdepassehashé');
