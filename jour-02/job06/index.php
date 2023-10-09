<?php 

    function connectDB()
    {
        $dsn = 'mysql:host=localhost;dbname=lp_official;charset=utf8';
        $username = 'root';
        $password = 'Nicolas';

        try {
            $bdd = new PDO($dsn, $username, $password);
            return $bdd;
        } catch (PDOException $e) {
            die("Connexion échouée: " . $e->getMessage());
        }
    }

    find_ordered_students(){
        
    }

?>