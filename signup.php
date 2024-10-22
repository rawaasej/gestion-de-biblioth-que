<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] , input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            
        }

        form{
            padding:20px;
        }
        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 10px auto 0 auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }
        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }


        .clearfix{
         display: flex;
         align-items: center;
         justify-content: center;
         flex-direction: row;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>

<body>
    


        <div class="modal">
            <form class="modal-content animate" action="signup.php" method="post" onsubmit="return validatePassword()"  style=" display:flex;align-items:center;justify-content: center; flex-direction:column; border-radius:5px;">
            <h1 style="margin:auto;">Inscription à la Bibliothèque du Pôle de compétitivité de Bizerte</h1>
           <div class="container" style="width: 100%;" >
           <label for="nom">Nom:</label> <input type="text" name="nom" id="nom" required placeholder="saisir votre nom" required><br><br>
            <label for="prenom">prenom:</label> <input type="text" name="prenom" id="prenom" required placeholder="saisir votre prenom" required><br><br>
            <label for="email">Email:</label> <input type="email" name="email" id="email" required placeholder="saisir votre Email" required><br><br>
            <label for="mdp">Mot de passe:</label> <input type="password" name="motdepasse" id="mdp" required autocomplete="off" required placeholder="saisir votre mot de passe"><br><br>
            <label for="co">Confirmer :</label><input type="password" name="confirmerMotDePasse" required placeholder="Confirmer votre mot de passe" id="co" required required oninput="checkPasswordMatch()">

            </div>


            <div class="clearfix" style="width: 100%;" >
                <button style="background-color:#f44336;text-decoration: none; color:#fff ;" onclick="fun()" >Cancel</button>
                <script>
                   function fun(){
                    window.location = 'signin.php' ;
                   }
                </script>
                <button type="submit" class="signupbtn" >Sign Up</button>
            </div>
            <script>
                function validatePassword() {
                    var password = document.getElementById("mdp").value;
                    if (password.length < 8 || !/[a-z]/.test(password) || !/[0-9]/.test(password)) {
                        alert("Le mot de passe doit avoir au moins 8 caractères ,Le mot de passe doit contenir au moins une lettre minuscule,Le mot de passe doit contenir au moins un numero");
                        return false;
                    }
                    return true;
                }

                document.querySelector('form').addEventListener('submit', function(event) {
                    var password1 = document.getElementsByName('motdepasse')[0].value;
                    var password2 = document.getElementsByName('confirmerMotDePasse')[0].value;

                    if (validatePassword() && password1 !== password2) {
                        alert("Les deux mots de passe ne correspondent pas.");
                        event.preventDefault();
                    }
                });
            </script>

        </form>
    <?php
    if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["motdepasse"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $motdepasse = $_POST["motdepasse"];
        include_once("connexion.php");
        include_once("signclass.php");

        $p = new signclass($nom, $prenom, $email, $motdepasse);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($result);

        if ($rowcount > 0) {
            echo '<script>alert("L\'adresse e-mail existe déjà.");</script>';
        } else {
            if ($p->ajouterpersoone()) {
                echo '<meta http-equiv="refresh" content="0;url=signin.php">';
            } else {
                echo '<script>alert("Problème d\'ajout de l\'étudiant");</script>';
            }
        }
    }
    ?>

</body>

</html>