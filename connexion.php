<?php

$con = new mysqli("localhost", "root", "", "pole");

if ($con->connect_error == null) {
    // echo "conexion etablie";
} else {
    echo "connexion echouee";
}
