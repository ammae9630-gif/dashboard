

<?php
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Validation simple
    if (empty($email) || empty($mot_de_passe)) {
        die("Tous les champs sont obligatoires");
    }

    // Hash du mot de passe
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Connexion MongoDB
    $client = new MongoDB\Client("mongodb://localhost:27017");

    $collection = $client->ecole->login;

    // Insertion
    $result = $collection->insertOne([
        'email' => $email,
        'mot_de_passe' => $mot_de_passe
    ]);

    if ($result->getInsertedId()) {
        echo "Utilisateur enregistré avec succès ";
    } else {
        echo "Erreur lors de l'enregistrement ";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boostrap</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Business</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button> 

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Page 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page 2</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Page 3</a>
                </li>   
            </ul>

            <form class="text-center mt-3 mt-lg-0">
                <button class="btn btn-outline-danger mr-3"  type="button">Inscription</button>
                <button class="btn btn-outline-success mr-4" data-bs-toggle="modal" data-bs-target="#connexionModal" type="button">Connexion</button>
            </form>

            <!-- Modal connexion -->
            <div class="modal fade" id="connexionMondal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <h5 class="modal-title">Connexion utilisateur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" >
                                

                                <div class="mb-3">
                                    <label class="form-label">Adresse email</label>
                                    <input type="email" name ="email" class="form-control" placeholder="exep@gmail.com">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mot de passe</label>
                                    <input type="text" name ="mot_de_passe"class="form-control" placeholder="********">
                                </div>

                                <button class="btn btn-outline-success">S'inscrire</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </nav>

    <header class="container-fluid text-xhite text-center p-5 mb-2">
        <h1 class="mt-5 pb-5">Nous accompagnons votre transformation digitale</h1>
    </header>

    <div class="container-fluid">
        <div class="row ">

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img src="head.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img src="head.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img src="head.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card" style="width: 18rem;">
                    <img src="head.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="container-fluid p-5 bg-info text-white mt-3">
        <div class="row justify-content-around" >
            <div class="col-lg-9 text-center text-lg-left">
                <h1 class="mb-lg-5">Souhaitez-vous savoir en plus ?</h1>
            </div>

            <div class="ml-lg-3 mt-4 mt-lg-0 text-center">
                <button class="btn btn-lg btn-outline-light">Contactez-nous</button>
            </div>
        </div>
    </div>

    <script src="bootstrap.min.js"></script>
</body>
</html>