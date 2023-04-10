<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?> 
<?php include_once "core/functions.php" ?> 
<?php include_once "core/validations.php" ?> 
<?php include_once "database/conn.php" ?> 
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-3 text-center text-gray-800">category</h1>


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
                        <th>date</th>
                        <th colspan='3'>control</th>
                    </tr>
                </thead>
                <tfoot>
                        <td>id</td>
                        <td>name</td>
                        <td>date</td>
                        <td colspan='3'>control</td>
                </tr>
                </tfoot>
                    <tbody>
                        <?php
                            $data = getcategorysinfo($conn);
                            while($row = mysqli_fetch_assoc($data)):
                        ?>
                            <tr>
                                <th><?= $row['id'] ?></th>
                                <th><?= $row['name'] ?></th>
                                <th><?= $row['date'] ?></th>
                                <th><a href="show_category.php?id=<?= $row['id'] ?>" class='btn btn-secondary'>show</a></th>
                                <th><a href="edit_category.php?id=<?= $row['id'] ?>" class='btn btn-primary'>edit</a></th>
                                <th><a href="handlers/delete_category.php?id=<?= $row['id'] ?>" class='btn btn-danger'>delete</a></th>
                            </tr>
                            <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<?php include_once "inc/footer.php" ?> 