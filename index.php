<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Liste des étudiants</h2>
        <a class="btn btn-primary" href="/Mypage/create.php" role="button">+</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>CIN</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database ="etudiant";

                //Create connection
                $connection = new mysqli($servername, $username, $password,$database);
                
                //check connection
                if ($connection->connect_error){
                    die("erreur" . $connection->connect_error);
                
                }
                //read all row from database table
                $sql = "SELECT * FROM etudiant";
                $result = $connection->query($sql);

                if (!$result) {
                    die ("requete invalide" . $connection->error);
                }
                
                //read data of each row
                while($row=$result->fetch_assoc()) {
                    echo"
                    <tr>
                    <td>$row[cin]</td>
                    <td>$row[Nom]</td>
                    <td>$row[Prenom]</td>
                    <td>$row[Email]</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/Mypage/edit.php?cin=$row[cin]' >Modifier</a>
                    <a class='btn btn-primary btn-sm' href='/Mypage/delete.php?cin=$row[cin]' >Supprimer</a>
                    </td> 
                  </tr> 
                    ";
                }
                
                ?>

                
            </tbody>
        </table>
    </div>
</body>
</html>