<?php include_once "inc/header.php" ?> 


<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create new category!</h1>
                            </div>
                            <form class="user" method='post' action="handlers/add_category.php" enctype='multipart/form-data'>
                                <?php if(isset($_SESSION['errors']['name'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['name']; ?>
                                        </div>
                                    <?php  endif; ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name='name'
                                        placeholder="category name">
                                </div>
                                <button class='btn btn-primary btn-user btn-block'>submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                        <?php if(isset($_SESSION['errors'])):
                                                unset($_SESSION['errors']);
                                        endif;['firstname']
                                            ?>
    </div>

    <?php include "inc/footer.php" ?> 