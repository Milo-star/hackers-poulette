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
        <?php
            if (isset($_POST['firstname'])) {
                if (empty($_POST['firstname'])) {
                    echo '<p>First name is required</p>';
                } else {
                    $firstname = $_POST['firstname'];
                    $firstname = filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS);
                    if (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ]+$/', $firstname)) {
                        echo '<p>' . $errorMsg['errorFirstname'] . '</p>';
                    }
                    if (strlen($firstname) < 2 || strlen($firstname) > 250) {
                        echo '<p>' . $errorMsg['errorFirstname2'] . '</p>';
                    } else {
                        $arraySave['firstname'] = $firstname;
                    }
                }
            }
            ?>


        <label for="lastname">Lastname:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
        <?php
            if (isset($_POST['name'])) {
                if (empty($_POST['name'])) {
                    echo '<p>Name is required</p>';
                } else {
                    $name = $_POST['name'];
                    $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
                    if (!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ]+$/', $name)) {
                        echo '<p>' . $errorMsg['errorName'] . '</p>';
                    }
                    if (strlen($name) < 2 || strlen($name) > 250) {
                        echo '<p>' . $errorMsg['errorName2'] . '</p>';
                    } else {
                        $arraySave['name'] = $name;
                    }
                }
            }
            ?>

        <label for="email">Email adress:</label>
        <input type="text" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">        
        <?php
            if (isset($_POST['email'])) {
                if (empty($_POST['email'])) {
                    echo '<p>Email adress is required </p>';
                } else {
                    $email = $_POST['email'];
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<p>' . $errorMsg['errorEmail'] . '</p>';
                    } else {
                        $arraySave['email'] = $email;
                    }
                }
            }
            ?>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment"><?php echo isset($_POST["comment"]) ? $_POST["comment"] : ''; ?></textarea>        
        <?php
            if (isset($_POST['comment'])) {
                if (empty($_POST['comment'])) {
                    echo '<p>Message is required </p>';
                } else {
                    $comment = $_POST['comment'];
                    $comment = filter_var($comment, FILTER_SANITIZE_SPECIAL_CHARS);
                    if (strlen($comment) < 250 || strlen($comment) > 1000) {
                        echo '<p>' . $errorMsg['errorComment'] . '</p>';
                    } else {
                        $arraySave['comment'] = $comment;
                    }
                }
            }
            ?>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>