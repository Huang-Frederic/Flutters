<?php include '../../connect_db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
 
  <title>Dashboard | Movies</title>

  <!-- Icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link href="../dashboard.css" rel="stylesheet">
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../../../../"><img src="../img/header-logo.svg" alt="" width="120" height="35"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <button id="trigger-search-movies" class="btn btn-dark" onclick="searchMovies()"><i class="uil uil-search"></i></button>
    <input id="search-movie-input" class="form-control form-control-dark w-100" type="text" placeholder="Recherche" aria-label="Chercher" >
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Déconnexion</a>
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      
    <?php include '../sidebar.php' ?>
    <?php 
    $q = "SELECT COUNT(id_session) FROM SESSION";
    $req = $bdd->query($q);
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h2>Séances (<?php echo $result['COUNT(id_session)'] ?>)</h2>
        <div class="table-responsive">
        <?php if(!isset($_GET['type']) || $_GET['type'] == 'delete') : ?> 
          <table class="table table-sm">
            <thead>
                <tr>
                  <?php echo (!isset($_GET['type']) || $_GET['type'] == 'delete')? '<th scope="col">#</th>' :'';?>
                  <th scope="col" width="10%">Date</th>
                  <th scope="col" width="10%">Heure</th>
                  <th scope="col" width="18%">Film</th>
                  <th scope="col" width="8%">Durée</th>
                  <th scope="col" width="10%">Langage</th>
                  <th scope="col">Salle</th>
                  

                    <th scope="col">
                      <div class=" hover-effect d-flex align-items-center">
                        <i class="add-icon uil uil-plus-circle"></i> 
                        <a class="add-cta" href="movies?type=create">Ajouter une séance</a>     
                      </div>
                    </th>

          <?php endif; ?>    
                
                </tr>
            </thead>
            <tbody id="display-session">
            <?php include 'session-delete.php';
            include 'table-creation.php'; ?>

            </tbody>
          </table> 
        </div>
      </main>
    </div>
  </div>


<script src="main.js"></script>
</body>

</html>