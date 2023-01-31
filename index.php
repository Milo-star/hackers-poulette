<?php
include "db.php";

    $errorMsg = array(
    'errorName' => 'Name incorrect',
    'errorName2' => 'Votre nom doit contenir entre 2 et 250 caractères',
    'errorFirstname' => 'Votre prénom ne peut contenir que des lettres',
    'errorFisrtname2' => 'Votre prénom doit contenir entre 2 et 250 caractères',
    'errorEmail' => "Le format de l'adresse e-mail est incorrect.",
    'errorComment' => 'Votre nom doit contenir entre 2 et 250 caractères'
);
    $arraySave = array();

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
        <input type="text" id="firstname" name="firstname" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>">
        
        <label for="lastname">Lastname:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">

        <label for="email">Email adress:</label>
        <input type="text" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">        
        
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment"><?php echo isset($_POST["comment"]) ? $_POST["comment"] : ''; ?></textarea>        
        
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>