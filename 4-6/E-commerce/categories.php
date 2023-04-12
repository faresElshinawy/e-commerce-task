<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?> 

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-3 text-center text-gray-800">category</h1>

    <!-- categories test function -->

    <?php 
    // categoriestest($conn);  
    ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">category tables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th colspan='2'>control</th>
                        <th>date</th>
                        <td>view</td>
                    </tr>
                </thead>
                <tfoot>
                        <td>id</td>
                        <td>name</td>
                        <td colspan='2'>control</td>
                        <td>date</td>
                        <td>view</td>
                </tr>
                </tfoot>
                    <tbody>
                        <?php
                            $data = getcategoriesinfo($conn);
                            while($row = mysqli_fetch_assoc($data)):
                        ?>
                            <tr>
                                <th><?= $row['cate_id'] ?></th>
                                <th><?= $row['name'] ?></th>
                                <th><a href="edit_category.php?id=<?= $row['cate_id'] ?>" class='btn btn-primary'>edit</a></th>
                                <th><a href="handlers/delete_category.php?id=<?= $row['cate_id'] ?>" class='btn btn-danger'>delete</a></th>
                                <th><?= $row['date'] ?></th>
                                <th><a href="show_category.php?id=<?= $row['cate_id'] ?>" class='btn btn-secondary'>show</a></th>
                            </tr>
                            <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<?php include_once "inc/footer.php" ?> 