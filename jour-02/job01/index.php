<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
</head>
<body>
    <h1>Liste des étudiants</h1>
    
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

function find_all_students($bdd)
{
    $query = "SELECT * FROM student"; // Correction du nom de la table ici
    $students = $bdd->query($query);
    return $students;
}

// Connectez-vous à la base de données
$bdd = connectDB();

// Récupérez tous les étudiants
$students = find_all_students($bdd);

// Vérifiez s'il y a des étudiants
if ($students->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Grade ID</th><th>Email</th><th>Fullname</th><th>Birthdate</th><th>Gender</th></tr>";
    while ($row = $students->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['grade_id'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['birthdate'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun étudiant trouvé.";
}
?>

</body>
</html>
