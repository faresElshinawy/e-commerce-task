<?php include_once "inc/header.php" ?> 
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
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method='post' action="handlers/handle_register.php" enctype='multipart/form-data'>
                                <?php if(isset($_SESSION['errors']['firstname'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['firstname']; ?>
                                        </div>
                                    <?php  endif; ?>
                                    <?php if(isset($_SESSION['errors']['lastname'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['lastname']; ?>
                                        </div>
                                    <?php  endif; ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name='firstname'
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" name='lastname'
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <?php if(isset($_SESSION['errors']['email'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['email']; ?>
                                        </div>
                                    <?php  endif; ?>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name='email'
                                        placeholder="Email Address">
                                </div>
                                <?php if(isset($_SESSION['errors']['address'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['address']; ?>
                                        </div>
                                    <?php  endif; ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name='address'
                                        placeholder="address">
                                </div>
                                <?php if(isset($_SESSION['errors']['phone'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['phone']; ?>
                                        </div>
                                    <?php  endif; ?>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleInputEmail" name='phone'
                                        placeholder="phone">
                                </div>
                                <?php if(isset($_SESSION['errors']['image'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['image']; ?>
                                        </div>
                                    <?php  endif; ?>
                                <div class="form-group mb-3 ">
                                <label for="formFileMultiple" class="form-label text-muted ">upload image</label>
                                <input class="form-control text-muted rounded-pill "  type="file" id="formFileMultiple" name='image' multiple />
                                </div>
                                <?php if(isset($_SESSION['errors']['password'])): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errors']['password']; ?>
                                    </div>
                                <?php  endif; ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name='password'>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password" name='password_repeat'>
                                    </div>
                                </div>
                                <button class='btn btn-primary btn-user btn-block'>register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
                            </div>
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
