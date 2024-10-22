<?php


class classemagasine
{


    private $num;
    private $type;
  
    private $datem;




    public  function __construct($num = "", $type = "", $datem = "")
    {
        $this->num = $num;
        $this->type = $type;
        
        $this->datem = $datem;
    }
    function getnum()
    {
        return $this->num;
    }
    function gettype()
    {
        return $this->type;
    }
   
    function getdatem()
    {
        return $this->datem;
    }


    function ajoutermagasine()
    {
        require("connexion.php");
        $formattedDate = date('Y-m-d', strtotime($this->datem));

        $req = $con->query("INSERT INTO ajoutermagasine(num , type  , datem) values('" . $this->num . "','" . $this->type . "','" .   $formattedDate . "')");
        if ($req)
            return true;
        else return false;
    }



     function recherchemagasine($champ, $valeur)
     {
         require("connexion.php");
        $requete = "SELECT * FROM ajoutermagasine
                WHERE $champ = '$valeur'";

       $resultat = $con->query($requete);

      if ($resultat && $resultat->num_rows > 0) {
           return true;
       } else {
           return false;
      }
    }
}
?>
