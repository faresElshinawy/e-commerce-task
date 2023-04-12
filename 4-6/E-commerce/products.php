<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?> 

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-3 text-center text-gray-800">Products</h1>

<!-- PRODUCTS TEST ADD -->

    <?php 
        // productstest($conn);
    ?> 

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> products tables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>image</th>
                        <th>category</th>
                        <th>price</th>
                        <th>count</th>
                        <th>date</th>
                        <th colspan='2'>controls</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>id</td>
                        <td>name</td>
                        <td>description</td>
                        <td>image</td>
                        <td>category</td>
                        <td>price</td>
                        <td>count</td>
                        <td>date</td>
                        <td colspan='2'>controls</td>
                    </tr>
                </tfoot>
                <tbody>
                        <?php 
                            $result = getproductsinfo($conn);
                            while($row = mysqli_fetch_assoc($result)):
                                ?>
                            <tr>
                                <td><?= $row['pro_id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><textarea cols="30" rows="2" disabled class='bg-white border-0 text-muted'><?= $row['description'] ?></textarea></td>
                                <td>
                                    <img src="uploaded/<?= $row['image'] ?>" alt="" width='70' height='70'>
                                </td>
                                <td>
                            <?php
                            // firs solution
                            //         $category = getcategoriesinfo($conn);
                            // while($row2 = mysqli_fetch_assoc($category)):
                            //     if($row['category_id'] == $row2['cate_id']):
                            //         echo $row2['name'];
                            //     endif;
                            // endwhile;
                            ?>
                            <!-- scond solution is inner join -->
                            <?= $row['cate_name'] ?>
                                </td>
                                <td><?= $row['price'] ?></td>
                                <td><?= $row['count'] ?></td>
                                <td><?= $row['date'] ?></td>
                                <td><a href="edit_products.php?id=<?= $row['pro_id']?>"class='btn btn-primary'>edit</a></td>
                                <td><a href="handlers/delete_products.php?id=<?= $row['pro_id']?>"class='btn btn-danger'>delete</a></td>
                                </tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php include_once "inc/footer.php" ?> 