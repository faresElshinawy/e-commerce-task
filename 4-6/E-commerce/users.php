<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php include_once "inc/topbar.php" ?> 
<?php include_once "core/functions.php" ?> 
<?php include_once "core/validations.php" ?> 
<?php include_once "database/conn.php" ?> 
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-3 text-center text-gray-800">users</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">users tables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>password</th>
                        <th>date</th>
                        <th>phone</th>
                        <th>image</th>
                        <th>address</th>
                        <th colspan = '2'>control</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>password</th>
                        <th>date</th>
                        <th>phone</th>
                        <th>image</th>
                        <th>address</th>
                        <th colspan = '2'>control</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $result = selectallusrs($conn);
                    while($row = mysqli_fetch_assoc($result)):
                        ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= '0' . $row['phone'] ?></td>
                        <td>
                            <img src="<?= 'uploaded/' . $row['image'] ?>
                            " alt="" width='70' height='70'>
                    </td>
                    <td><?= $row['address'] ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $row['id'] ?>" class='btn btn-primary'>edit</a>
                    </td>
                    <td>
                        <a href="handlers/handle_delete_user.php?id=<?= $row['id'] ?>" class='btn btn-danger'>delete</a>
                    </td>
                </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div> 
<?php include_once "inc/footer.php" ?> 