<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Vérifiez si le nom d'utilisateur est défini dans la session
$usernamesave = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Redirigez vers la page de connexion si le nom d'utilisateur n'est pas défini
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
        /* Ajoutez vos styles CSS ici */
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

        .headerbottom {
            /* Ajoutez les styles de l'en-tête inférieur ici */
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
            // Connexion à la base de données
            $conn = new mysqli("db", "user", "user", "test");

            // Vérifiez si la connexion a échoué
            if ($conn->connect_error) {
                die("Erreur de connexion à la base de données : " . $conn->connect_error);
            }

            // Requête SQL pour récupérer tous les utilisateurs
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);

            // Vérifiez s'il y a des résultats
            if ($result->num_rows > 0) {
                echo "<br>Voici la liste des utilisateurs : <br><br>";
                echo "<ul>";
                // Parcourez les résultats et affichez chaque utilisateur
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["username"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "Aucun utilisateur trouvé.";
            }

            // Fermez la connexion à la base de données
            $conn->close();
            ?>
        </span></td></tr>
    </table>
</body>
</html>
