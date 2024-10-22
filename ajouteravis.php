<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>avis</title>
</head>

<body>
    <fieldset>
        <legend>votre avis</legend>
        <form style="height: 300px;" action="" method="post">
            <br>
            <i>veuillez remplire les champs suivant:</i>
            <br>
            <div style="height: 170px;">
                <div style="margin-top:4px;">

                    <label for="num">votre nom </label>
                    <input type="text" name="nomuser" id="num" class="form-control" required>

                </div>
                <div style="margin-top:4px;">

                    <label for="prenom">votre prenom </label>
                    <input type="text" name="prenomuser" id="prenom" required>

                </div>
                <div style="margin-top:4px;">
                    <label for="num">numero de magasine </label>
                    <input type="text" name="num" id="num" required min="1">
                </div>
                <div style="margin-top:4px;">
                    <label for="nj">nombre de page </label>
                    <input type="number" name="nombredepage" id="nj" required min="1">
                </div>
                <div style="margin-top:4px;">
                    <label for="avis">Votre avis :</label>
                    <textarea id="avis" name="avis" rows="4" required></textarea>
                </div>
            </div>
            <input style="font-size:25px ; background-color:green; color:aliceblue; border-radius:25px;" type='reset' value='Annuler'>
            <input style="font-size:25px ; background-color:green; color:aliceblue; border-radius:25px;" class="but_sh_" type='submit' value='Ajouter'>

        </form>
    </fieldset>
</body>

</html>
<?php
if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["num"]) && !empty($_POST["nombredejour"]) && !empty($_POST["dateemprunter"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $num = $_POST["num"];
    $nombredejour = $_POST["nombredejour"];
    $dateemprunter = $_POST["dateemprunter"];

    include_once("emprunter.php");
    $emp = new emprunter($nom, $prenom, $num, $nombredejour, $dateemprunter);
    if ($emp->emprunter()) {
        echo '<script>alert("Le magasine numéro ' . $num . ' est emprunté ");</script>';
    } else {
        echo '<script>alert("cette magasine est deja emprunter");</script>';
    }
}
?>