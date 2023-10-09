<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un nouvel étudiant</title>
</head>
<body>
    <h1>Ajouter un nouvel étudiant</h1>

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

    function insert_student($bdd, $email, $fullname, $gender, $birthdate, $grade_id)
    {
        $query = "INSERT INTO student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :grade_id)";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':grade_id', $grade_id);
        
        return $stmt->execute();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['input-email'];
        $fullname = $_POST['input-fullname'];
        $gender = $_POST['input-gender'];
        $birthdate = $_POST['input-birthdate'];
        $grade_id = $_POST['input-grade_id'];

        $bdd = connectDB();
        if (insert_student($bdd, $email, $fullname, $gender, $birthdate, $grade_id)) {
            echo "<p>Étudiant ajouté avec succès!</p>";
        } else {
            echo "<p>Erreur lors de l'ajout de l'étudiant.</p>";
        }
    }
    ?>

    <form method="post" action="index.php">
        <label for="input-email">Email :</label>
        <input type="email" id="input-email" name="input-email" required><br>

        <label for="input-fullname">Nom complet :</label>
        <input type="text" id="input-fullname" name="input-fullname" required><br>

        <label for="input-gender">Genre :</label>
        <select id="input-gender" name="input-gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>

        <label for="input-birthdate">Date de naissance :</label>
        <input type="date" id="input-birthdate" name="input-birthdate" required><br>

        <label for="input-grade_id">ID du grade :</label>
        <input type="number" id="input-grade_id" name="input-grade_id" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
