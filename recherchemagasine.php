<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche magasine </title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="flex-direction:column;">
    <section class="det">
        <fieldset>
            <legend>Rechercher un Etudiant</legend>
            <form action="" method="post">
                <i>veuillez selectionner un critrere de rechreche :</i>
                <br>

                <div class="recherche_para">
                    <div><label for="Valeur">Critere </label>
                        <select name="champ">
                            <option value="num">num de magasine</option>
                            <option value="type">nom de magasine</option>
                            <option value="datem">date</option>
                        </select>
                    </div>
                    <div style="margin-top:4px;"><label for="Valeur">Valeur :</label>
                        <input type="text" name="valeur" required>
                    </div>
                </div>
                <div>
                    <input style="font-size:25px ; background-color:blue; color:aliceblue; border-radius:25px;" type='reset' value='anuuler'>
                    <input style="font-size:25px ; background-color:blue; color:aliceblue; border-radius:25px;" class="but_sh_" type='submit' value='recherche'>l
                </div>
            </form>
        </fieldset>
    </section>
</body>
<style>
    fieldset {
        height: 200px;
        width: 500px;
    }
</style>

</html>
<?php
session_start();
include_once("connexion.php");
include_once("classemagasine.php");

if (!empty($_POST['champ']) && !empty($_POST['valeur'])) {
    $champ = $_POST['champ'];
    $valeur = $_POST['valeur'];

    $p = new classemagasine();
    if ($p->recherchemagasine($champ, $valeur)) {
        echo '<script>alert("La magasine existe.");</script>';
    } else {
        echo '<script>alert("La magasine n\'existe pas.");</script>';
    }
}
?>