<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?> 


<!-- DataTales Example -->
<?php 
$id = sanitizeinput($_GET['id']);
$row = getproductbyid($conn,$id);
?>
    <div class="container ">
        <div class="row d-flex justify-content-center">
        <div class="col-md-6">
              <div class="card">
                    <img class="card-img-top" src="uploaded/<?= $row['image'] ?>" />
                <div class="card-body">
                  <h6 class="card-title"><?= $row['name'] ?></h6>
                  <h4 class="card-text"><?= $row['description'] ?></h4>
                  <div class="d-flex justify-content-between">
                      <p class="text-danger"><span class="text-dark">PRICE : </span> <?= $row['price'] ?></p>
                      <p class="text-danger"><span class="text-warning">STOCK LEFT : <?= $row['count'] ?></p>
                  </div>
                  <a href="" class='btn btn-secondary '>add to cart</a>
                </div>
              </div>
            </div>
        </div>
    </div>

<?php include_once "inc/footer.php" ?> 