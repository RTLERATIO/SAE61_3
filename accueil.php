<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$usernamesave = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (empty($usernamesave)) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil SAE61</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }


        .pagecontent {
            padding: 20px;
        }

        .longtext {
            color: #003B5E;
        }
    </style>
</head>
<body>
    <table class="header">
        <tr><td></td><td class="headerright"></td></tr>
    </table>
    <table class="headerbottom"><tr><td></td></table>
    <table class="pagecontent">
        <tr><td><span class="longtext">
            <h2>Accueil SAE61</h2>
            <br>
            <?php echo "Bonjour $usernamesave"; ?>
            <br><br>
            Voici un cookie :
            <br><br>
            <img class="cookie-img" src="https://img.freepik.com/photos-gratuite/biscuits-aux-pepites-chocolat-isoles-fond-blanc-ai-generatif_123827-24066.jpg">

            <?php
            $conn = new mysqli("db", "user", "user", "test");

            if ($conn->connect_error) {
                die("Erreur de connexion à la base de données : " . $conn->connect_error);
            }

            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<br>Voici la liste des utilisateurs : <br><br>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["username"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "Aucun utilisateur trouvé.";
            }
            $conn->close();
            ?>
        </span></td></tr>
    </table>
</body>
</html>
