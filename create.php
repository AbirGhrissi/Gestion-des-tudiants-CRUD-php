<?php

$servername = "localhost";
$username = "root";
$password = "";
$database ="etudiant";

//Create connection
$connection = new mysqli($servername, $username, $password,$database);

$cin="";
$Nom="";
$Prenom="";
$Email="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $cin=$_POST["cin"];
    $Prenom=$_POST["Prenom"];
    $Nom=$_POST["Nom"];
    $Email=$_POST["Email"];

    do {
        if (empty($cin) || empty($Prenom) || empty($Nom) || empty($Email) ){
            $errorMessage="Tous les champs sont obligatoires";
            break;
        }

        //add new student to database
        $sql="INSERT INTO etudiant (cin,Prenom,Nom,Email)VALUES ('$cin','$Prenom','$Nom','$Email')";
        $result = $connection->query($sql);
        
        if (!$result) {
            $errorMessage="requete invalide:" . $connection->error;
            break;
        }
        $cin="";
        $Nom="";
        $Prenom="";
        $Email="";

        $successMessage="Etudiant ajouté correctement";

        header("location: /Mypage/index.php");
        exit;

          
    } while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Ajouter un étudiant</h2>

        <?php
        if( !empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
               <strong>$errorMessage</strong>
               <button type='button' class='btn-close' data-bs-dismiss ='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">CIN</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cin" value="<?php echo $cin ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prenom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Prenom" value="<?php echo $Prenom ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Nom" value="<?php echo $Nom ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Email" value="<?php echo $Email ?>">
                </div>
            </div>

            <?php
        if( !empty($successMessage)){
            echo"
            <div class='row mb-3'>
               <div class='offset-sm-3 col-sm-6'>
                   <div class='alert alert-success alert-dismissible fade show' role='alert'>
                       <strong>$successMessage</strong>
                       <button type='button' class='btn-close' data-bs-dismiss ='alert' aria-label='Close'></button>
                    </div>  
                </div>    
            </div>
            ";
        }
        ?>

            <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" >Envoyer</button>
            </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/Mypage/index.php" role="button">Annuler</a>
                </div>
            </div>

        </form>

    </div>
</body>
</html>