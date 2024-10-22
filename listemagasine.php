<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liste de magasine</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Utilisez le bon nom pour le fichier jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        margin: 20px;
        /* Ajout d'une marge pour une meilleure apparence */
    }

    table {
        border: 4px solid #008000;
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 5px 50px rgba(0, 0, 0, 0.15);
    }

    th {
        background-color: #008000;
        color: #ffffff;
        padding: 10px;
        /* Ajustement de la taille du rembourrage */
    }

    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    td {
        padding: 10px;
        /* Ajustement de la taille du rembourrage */
    }
</style>


<body>
    <!-- Button trigger modal -->
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'administrateur') : ?>
        <div style=" display: flex ; width: 100%; justify-content: center; margin: 30px 0 20px 0; "> <button type="button" data-bs-toggle="modal" data-bs-target="#ajouteModal" style="font-size:25px ; background-color:green; color:aliceblue; border-radius:5px;">
            <span class="material-symbols-outlined" style="display:flex;align-items: center; justify-content: center; flex-direction:row;padding:10px;">
                add_circle <span style = "text-decoration:none; text-transform:capitalize; font-family: 'Courier New', Courier, monospace; margin-left:10px;">Ajoute</span>
            </span>
        </button>
        </div>
        <div class="modal fade" id="ajouteModal" tabindex="-1" aria-labelledby="ajouteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ajouteModalLabel">Veuillez remplir les champs suivants:</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form style="height: 300px;" action="" method="post" id="formorder">
                            <div class="form-group mb-3">
                                <label for="num">Numéro de magasine :</label>
                                <input type="text" name="num" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="type">type de magasine:</label>
                                <select id="type" name="type" style="margin-top:4px;">
                                    <option value="Process Alimentaire">Process Alimentaire </option>
                                    <option value="Produit de la Mer">Produit de la Mer</option>
                                    <option value="le Revue de l'industrie Agroalimentaire">le Revue de l'industrie Agroalimentaire</option>
                                    <option value="Usine Nouvelle">Usine Nouvelle</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="datem">Date : </label>
                                <input type="text" name="datem" class="form-control" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input style="font-size:15px ; background-color:green; color:aliceblue; border-radius:25px;" type='reset' value='Annuler'>
                        <input style="font-size:15px ; background-color:green; color:aliceblue; border-radius:25px;" class="but_sh_" type='submit' value='Ajouter'>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php
    if (!empty($_POST["num"]) && !empty($_POST["type"]) && !empty($_POST["datem"])) {
        $num = $_POST["num"];
        $type = $_POST["type"];
        $datem = $_POST["datem"];
        include_once("classemagasine.php");
        $b = new classemagasine($num, $type, $datem);
        if ($b->ajouterMagasine()) {
            echo '<script>alert("Le magasine a été ajouté avec succès");</script>';
        } else {
            echo '<script>alert("Problème d\'ajout du magasine");</script>';
        }
    }
    ?>



    <section class="det">

        <?php
        include_once("classemagasine.php");
        include_once("connexion.php");

        // Utilisation d'une seule connexion, pas besoin de créer une nouvelle instance
        $con = new mysqli("localhost", "root", "", "pole");


        if ($con->connect_error == null) {
            // echo "connexion établie";
        } else {
            echo "connexion échouée";
        }

        echo "<table align='center' border='2' cellpadding='5' id='company_users'>
                <thead>
                    <tr>
                        <th>Num de Magasine</th>
                        <th>type de magasine</th>
                        <th>date</th>
                    </tr>
                </thead>
                <tbody>";

        $sql = "SELECT * FROM ajoutermagasine";
        $res = $con->query($sql);

        foreach ($res as $row) {
            $p = new classemagasine($row["num"], $row["type"], $row["datem"]);
            echo "<tr><td>" . $p->getnum() . "</td><td>" . $p->gettype() . "</td><td>" . $p->getdatem() . "</td></tr>";
        }

        echo "</tbody></table>";

        $con->close();
        ?>

    </section>

    <script>
        $(document).ready(function() {
            $("#company_users").DataTable();
        });
    </script>
</body>

</html>