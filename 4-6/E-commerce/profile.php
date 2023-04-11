<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?> 
<?php include_once "core/functions.php" ?> 
<?php include_once "core/validations.php" ?> 
<?php include_once "database/conn.php" ?> 

<!-- DataTales Example -->
    <div class="container ">
        <div class="row d-flex justify-content-center">
        <div class="col-md-6">
              <div class="card">
                    <img class="card-img-top" src="uploaded/<?= $_SESSION['auth']['image'] ?>" />
                <div class="card-body">
                  <h6 class="card-title"><?= $_SESSION['auth']['name'] ?></h6>
                  <h4 class="card-text"><?= $_SESSION['auth']['email'] ?></h4>
                </div>
              </div>
            </div>
        </div>
    </div>

<?php include_once "inc/footer.php" ?> 