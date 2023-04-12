<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?>  

<!-- Page Heading -->
<?php
    $count = getproductcount($conn);
?>

<div class="card shadow mb-4">
            <h1 class="h3 mb-5 mt-5 text-center text-gray-800">Products  (<?= $count ?>)</h1>
            <div class="card-body">

<div class="container-fluid">

    <div class="d-flex justify-content-center flex-wrap ">
                        <?php 
                            $result = getproductsinfo($conn);
                            while($row = mysqli_fetch_assoc($result)):
                                ?>
                                <div class="card m-3  " style="width: 18rem;">
                                <div class='overflow-y-hidden'>
                                    <img src="uploaded/<?= $row['image'] ?>" class="img-fluid" alt="..." >
                                </div>
                                <div class="card-body" height='20rem'>
                                        <h5 class="card-title"><?= $row['name'] ?></h5>
                                        <p class="card-text"><?= $row['description'] ?></p>
                                        <p class="text-danger"><span class="text-dark">PRICE : </span> <?= $row['price'] ?></p>
                                        <a href="show_shop_product.php?id=<?= $row['pro_id'] ?>" class="btn btn-success">show</a>
                                    </div>
                            </div>
                            <?php endwhile; ?>
    </div>
</div>
</div>
    </div>
</div>

<?php include_once "inc/footer.php" ?> 