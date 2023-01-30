<?php
    if(isset($_POST["submit"])) {
        $inputs = array(
            "firstname" => FILTER_SANITIZE_STRING,
            "lastname" => FILTER_SANITIZE_STRING,
            "email" => FILTER_VALIDATE_EMAIL,
            "comment" => FILTER_SANITIZE_STRING,
);
// Appliquer les fonctions de sanitisation aux entrées
    foreach($inputs as $input => $sanitize) {
        if(isset($_POST[$input])) {
        $_POST[$input] = filter_var(trim($_POST[$input]), $sanitize);
        }
    }
 }?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/sass/main.css">
    <title>Formulaire</title>
</head>
<body>
    <form action="verif-form.php" class="form">
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname">

        <label for="lastname">Lastname:</label>
        <input type="text" id="lastname" name="lastname">
        
        <label for="email">Email adress:</label>
        <input type="email" id="email" name="email">
        
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment"></textarea>
        
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>