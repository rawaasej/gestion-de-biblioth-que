<?php


class emprunter
{


    private $nom;
    private $prenom;
    private $num;
    private $nombredejour;
    private $dateemprunter;




    public  function __construct($nom = "", $prenom = "", $num = "", $nombredejour = "", $dateemprunter = "")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->num = $num;
        $this->nombredejour = $nombredejour;
        $this->dateemprunter = $dateemprunter;
    }

    function getnom()
    {
        return $this->nom;
    }
    function getprenom()
    {
        return $this->prenom;
    }
    function getnum()
    {
        return $this->num;
    }
    function getnombredejour()
    {
        return $this->nombredejour;
    }
    function getdateemprunt()
    {
        return $this->dateemprunter;
    }

    function emprunter()
    {
        require("connexion.php");
        $forma = date('Y-m-d', strtotime($this->dateemprunter));
        $req = $con->query("INSERT INTO emprunter(nom,prenom,num,nombredejour,dateemprunter) values('" . $this->nom . "','" . $this->prenom . "','" . $this->num . "','" . $this->nombredejour . "','" . $forma . "')");
        if ($req)
            return true;
        else
            return false;
    }




    function rechercheemp($nom, $prenom)
    {
        require("connexion.php");
        $requete = "SELECT num FROM emprunter WHERE nom = '$nom' AND prenom = '$prenom' ";

        $resultat = $con->query($requete);

        if ($resultat && $resultat->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
