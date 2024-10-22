<?php


class signclass
{


    private $nom;
    private $prenom;

    private $email;
    private $motdepasse;




    public  function __construct($nom = "", $prenom = "", $email = "", $motdepasse = "")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
    }
    function getnom()
    {
        return $this->nom;
    }
    function getprenom()
    {
        return $this->prenom;
    }
    function getemail()
    {
        return $this->email;
    }
    function getmotdepasse()
    {
        return $this->motdepasse;
    }



    function ajouterpersoone()
    {

        require("connexion.php");
        $req = $con->query("INSERT INTO users(nom,prenom,email,motdepasse) values('" . $this->nom . "','" . $this->prenom . "','" . $this->email . "','" . $this->motdepasse . "')");
        if ($req)
            return true;
        else return false;
    }
}
?>