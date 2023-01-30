<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/sass/main.css">
    <title>Formulaire</title>
</head>
<body>
    <form action="">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom">

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom">
        
        <label for="email">Adresse-email:</label>
        <input type="email" id="email" name="email">
        
        <label for="commentaire">Commentaire:</label>
        <textarea id="commentaire" name="commentaire"></textarea>
        
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>