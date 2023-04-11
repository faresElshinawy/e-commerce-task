<?php include_once "inc/header.php" ?> 
<?php include_once "core/functions.php" ?> 
<?php include_once "core/validations.php" ?> 
<?php include_once "database/conn.php" ?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

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

                            <form class="user" method='post' action="handlers/edit_category.php" enctype='multipart/form-data'>
                                <?php if(isset($_SESSION['errors']['name'])): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errors']['name']; ?>
                                    </div>
                                    <?php  endif; ?>
                                    <div class="form-group">
                                        <?php 
                                    $id = sanitizeinput($_GET['id']);
                                    $row = getcategorybyid($conn,$id);
                                    ?>
                                    <input type="hidden" value = '<?= $row['id'] ?>' name = 'id'>
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name='name' value = '<?= $row['name'] ?>';
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