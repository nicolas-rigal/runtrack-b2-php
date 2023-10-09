<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'un étudiant par email</title>
</head>
<body>
    <h1>Recherche d'un étudiant via son email</h1>
    
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

    function find_one_student($bdd, $email)
    {
        $query = "SELECT fullname,birthdate,gender,grade_id,email FROM student WHERE email = :email";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_GET['input-email-student'])) {
        $email = $_GET['input-email-student'];
        $bdd = connectDB();
        $student = find_one_student($bdd, $email);

        if ($student) {
            echo "<h2>Informations de l'étudiant :</h2>";
            echo "<ul>";
            foreach ($student as $key => $value) {
                echo "<li><strong>$key:</strong> $value</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucun étudiant trouvé avec l'email : $email</p>";
        }
    }
    ?>

    <form method="get" action="index.php">
        <label for="input-email-student">Email de l'étudiant :</label>
        <input type="text" id="input-email-student" name="input-email-student">
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>
