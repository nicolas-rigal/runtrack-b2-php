<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants avec noms de promotion</title>
</head>
<body>
    <h1>Liste des étudiants avec noms de promotion</h1>
    
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

function find_all_students_grades($bdd)
{
    $query = "SELECT student.email, student.fullname, grade.name AS grade_name FROM student
              JOIN grade ON student.grade_id = grade.id";
    $students = $bdd->query($query);
    return $students;
}

$bdd = connectDB();
$students_grades = find_all_students_grades($bdd);

if ($students_grades->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>Email</th><th>Nom Complet</th><th>Nom de Promotion</th></tr>";
    while ($row = $students_grades->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['grade_name'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun étudiant trouvé avec nom de promotion.";
}
?>
</body>
</html>
