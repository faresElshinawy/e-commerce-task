<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?> 
<?php include_once "database/conn.php" ?> 
<?php include_once "core/functions.php" ?> 
<?php include_once "core/validations.php" ?> 

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-3 text-center text-gray-800">Products</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center"> products</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>name</td>
                        <td>description</td>
                        <td>image</td>
                        <td>price</td>
                        <td>count</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>name</td>
                        <td>description</td>
                        <td>image</td>
                        <td>price</td>
                        <td>count</td>
                    </tr>
                </tfoot>
                <tbody>
                        <?php 
                            $result = getproductsinfo($conn);
                            while($row = mysqli_fetch_assoc($result)):
                                ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><textarea cols="30" rows="2" disabled class='bg-white border-0 text-muted'><?= $row['description'] ?></textarea></td>
                                <td>
                                    <img src="uploaded/<?= $row['image'] ?>" alt="" width='120' height='120'>
                                </td>
                                <td><?= $row['price'] ?></td>
                                <td><?= $row['count'] ?></td>
                                </tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php include_once "inc/footer.php" ?> 