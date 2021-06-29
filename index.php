<?php

$serveur="localhost";
$login="root";
$pass="";

try{
    $connexion= new PDO ("mysql:host=$serveur;dbname=webdevelopment",$login,$pass);//j'utilise les bloc try and catch pour la gestion des erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //exercice 1 j'utilise la requette INSERT TO pour inserer des données dans la table
   /* $insertion="INSERT INTO languages( language,version )
             Values ('PHP','5'),
                    ('PHP','6'),
                    ('PHP','7'),
                    ('PHP','7.4'),
                    ('PHP','8')";
     $connexion->exec($insertion);*/

     //exercice 2 
     /*$insertion="INSERT INTO framworks( framwork,version )
             Values ('REACT','16.1'),
                    ('REACT','16.3'),
                    ('REACT','16.4'),
                    ('REACT','16.5'),";
    $connexion->exec($insertion);*/

     //exercice 3
     echo "<h3 style='color:red;'>exercice 3</h3><br>";
    
     $requette=$connexion->prepare("SELECT * FROM languages");//selection toute la table languages
     $requette->execute();
     $resultat=$requette->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat);
     echo "</pre>";

     //exercice 4
     echo "<h3 style='color:red;'>exercice 4</h3><br>";
     $requette1=$connexion->prepare("SELECT version FROM languages");//selection toute la table languages
     $requette1->execute();
     $resultat1=$requette1->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat1);
     echo "</pre>";

     //exercice 5
     echo "<h3 style='color:red;'>exercice 5</h3><br>";

     $requette2=$connexion->prepare("SELECT * FROM languages WHERE id=1 OR id=3 OR id=4");//selection toute la table languages
     $requette2->execute();
     $resultat2=$requette2->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat2);
     echo "</pre>";

     //exercice 6
     echo "<h3 style='color:red;'>exercice 6</h3><br>";
     $requette3=$connexion->prepare("SELECT * FROM framworks WHERE id=1 OR id=2");//selection toute la table languages
     $requette3->execute();
     $resultat3=$requette3->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement,on utilise la méthode fetchAll pour l'affichage
     echo "<pre>";
     print_r($resultat3);
     echo "</pre>";


    echo "connexion à la base de donnée webdevelopment est reussi <br>";
    echo "insertion des données dans la table languages est reussi<br>";
    echo "insertion des données dans la table framwork est reussi<br>";
    echo "affichage des données de la table languages est reussi<br>";
    echo "affichage des version de la table languages est reussi<br>";
    echo "affichage des données de la table languages ou les lignes ayant Les id 1,3,4<br>";
    echo "affichage des données de la table framworks ou les deux première entrées<br>";
}catch(PDOException $e){
    echo'echec : ' . $e->getMessage();

}

?>