<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des salles et leur occupation</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .pleine {
            background-color: #ffcccc;
        }

        .non-pleine {
            background-color: #ccffcc;
        }
    </style>
</head>
<body>
    <h1>Liste des salles et leur occupation</h1>
    
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

function find_full_rooms($bdd)
{
    $query = "SELECT room.name AS room_name, room.capacity AS room_capacity, 
              COUNT(student.id) AS students_count,
              CASE WHEN COUNT(student.id) >= room.capacity THEN 'Pleine' ELSE 'Non pleine' END AS room_status
              FROM room
              LEFT JOIN student ON room.id = student.grade_id
              GROUP BY room.name, room.capacity";
    
    $rooms = $bdd->query($query);
    return $rooms;
}

$bdd = connectDB();
$full_rooms = find_full_rooms($bdd);

if ($full_rooms->rowCount() > 0) {
    echo '<table>';
    echo "<tr><th>Nom de la salle</th><th>Capacité</th><th>Étudiants Présents</th><th>Statut</th></tr>";
    while ($row = $full_rooms->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr class="' . strtolower($row['room_status']) . '">';
        echo "<td>" . $row['room_name'] . "</td>";
        echo "<td>" . $row['room_capacity'] . "</td>";
        echo "<td>" . $row['students_count'] . "</td>";
        echo "<td>" . $row['room_status'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucune salle trouvée.";
}
?>
</body>
</html>
