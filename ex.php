<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    </link>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="script.js"></script>

</head>

<body style="margin: 0!important ;">



    <div class="grid-container">
        <div class="header">
            <div class="menu-icon">
                <span class="material-symbols-outlined">
                    menu</span>
            </div>
            <div class="header-left">
                <span class="material-symbols-outlined">
                    search</span>
                <input type="text" name="search">
            </div>
            <div class="header-right">
                <span style="cursor: pointer;" class="material-symbols-outlined hov">
                    notifications</span>

                <span style="cursor: pointer;" class="material-symbols-outlined hov">
                    email</span>
                <span style="cursor: pointer;" class="material-symbols-outlined hov">
                    account_circle</span>
                <a href="out.php" style="color: green; text-decoration: none;" onmouseover="this.style.color='red'" onmouseout="this.style.color='green'"><span class="material-symbols-outlined">
                        logout
                    </span>se déconnecter</a>

                    <style>
                        .hov:active{
                            scale: 0.9;
                        }
                    </style>
            </div>
        </div>
        <div id="sidebar">

            <div class="sidebar-title">
                <img src="téléchargement.jpg" alt="pole de competitivite de bizerte" style="background-color: white; width:100%; border-radius:5px;">

            </div>
       <?php 
       
       echo (isset($_SESSION['role']) && $_SESSION['role'] === 'administrateur') ? '<div><h2 style=" color:white;">Bonjour admin</h2></div>' : '';?>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <button id="emprunter" style="background-color: transparent; border:none;">
                        
                    <span class="material-symbols-outlined">
                            <span class="material-symbols-outlined">
                                trending_flat
                            </span>
                        </span>
                    <a style="text-decoration: none; color:black;" >
                        <span style="text-decoration: none; color:black;"  class="label-item" >  emprunter un magasine
                        </a>
                    </span>
                </button>
            </li>
            <li class="sidebar-list-item">
                    <button id="retour" style="background-color: transparent; border:none;">
                        <span style="text-decoration: none; color:black;"  class="material-symbols-outlined">
                            undo
                        </span>
                        <span style="text-decoration: none; color:black;"  class="label-item">retour un magasine</span>
                    </button>
                </li>
                <li class="sidebar-list-item">
                    <button id="avis" style="background-color: transparent; border:none;">
                        <span style="text-decoration: none; color:black;"  class="material-symbols-outlined">
                            reminder
                        </span>
                        <span style="text-decoration: none; color:black;"  class="label-item"> avis</span>
                    </button>
                    </li>
                    <hr>
                <?php

                // Répétez la logique pour masquer/afficher l'élément avec echo
                echo (isset($_SESSION['role']) && $_SESSION['role'] === 'administrateur') ? '
    <ul>
        

        <li class="sidebar-list-item">
            <span class="material-symbols-outlined">
               list
            </span>
            <span class="label-item">liste de l emprunte</span>
        </li>

        <li class="sidebar-list-item" >
        <span class="material-symbols-outlined">
        list
        </span>
        <span class="label-item">liste des avis</span>
    </li>

    </ul>
' : '';

                ?>

        </div>
        <div class="main-container" style="padding:80px;height:100%;">
            <div>
            <iframe id="scale_rou" style="height: 100vh; width:100%;" src="listehtml.php" frameborder="0"></iframe>   
            <!-- Rawaa hawka id mte3ou beech ta3ref win tlawej fi script -->
            
               
            </div>
            <script>
            document.getElementById("emprunter").addEventListener('click',()=>{
               document.getElementById('scale_rou').outerHTML = ' <iframe id="scale_rou" style="height: 100vh; width:100%;" src="emprunteermagasin.php" frameborder="0"></iframe>   '
            })
            document.getElementById("retour").addEventListener('click',()=>{
               document.getElementById('scale_rou').outerHTML = ' <iframe id="scale_rou" style="height: 100vh; width:100%;" src="listehtml.php" frameborder="0"></iframe> '
            })
            document.getElementById("avis").addEventListener('click',()=>{
               document.getElementById('scale_rou').outerHTML = ' <iframe id="scale_rou" style="height: 100vh; width:100%;" src="avis.php" frameborder="0"></iframe> '
            })
            </script>
        </div>
    </div>


    </div>





</body>

</html>