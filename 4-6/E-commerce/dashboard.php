<?php include_once "inc/header.php" ?> 
<?php include_once "inc/sidebar.php" ?>
<?php
    $hide_search_item = true;
    include_once "inc/topbar.php";
?> 


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">users</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                    <div class="table-responsive">
                                            <table class="table  text-center" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                        <th>email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = selectallusrsdash($conn);
                                                    while($row = mysqli_fetch_assoc($result)):
                                                        ?>
                                                    <tr>
                                                        <td><?= $row['id'] ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    you can edit / delete users by press this button <a href="users.php" class='btn btn-success ml-3'>show</a>
                                </div>
                            </div>
                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">categories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <div class="table-responsive">
                                            <table class="table text-center" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        <?php
                                                            $data = getcategoriesinfodash($conn);
                                                            while($row = mysqli_fetch_assoc($data)):
                                                        ?>
                                                            <tr>
                                                                <th><?= $row['cate_id'] ?></th>
                                                                <th><?= $row['name'] ?></th>
                                                            </tr>
                                                            <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <hr>
                                    you can edit / delete categories by press this button <a href="categories.php" class='btn btn-success ml-3'>show</a>
                                </div>
                            </div>
                        </div>
                    </div>


                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">products</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <div class="table-responsive">
                                            <table class="table  text-center" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                        <th>price</th>
                                                        <th>count</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php 
                                                            $result = getproductsinfodash($conn);
                                                            while($row = mysqli_fetch_assoc($result)):
                                                                ?>
                                                            <tr>
                                                                <td><?= $row['pro_id'] ?></td>
                                                                <td><?= $row['name'] ?></td>
                                                                <td><?= $row['price'] ?></td>
                                                                <td><?= $row['count'] ?></td>
                                                                </tr>
                                                        <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <hr>
                                    you can edit / delete users by press this button <a href="products.php" class='btn btn-success ml-3'>show</a>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>

        </div>
        <!-- End of Content Wrapper -->
        

    </div>
    <!-- End of Page Wrapper -->

<?php include_once "inc/footer.php" ?> 


