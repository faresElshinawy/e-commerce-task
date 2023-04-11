<?php include_once "inc/header.php" ?> 
<?php if(isset($_SESSION['auth'])){
    header("location: dashboard.php");
    die;
}?>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action = 'handlers/handle_login.php' method = 'POST'>
                                        <?php if(isset($_SESSION['errors']['wrong'])): ?>
                                            <div class="alert alert-danger">
                                                <?= $_SESSION['errors']['wrong']; ?>
                                            </div>
                                            <?php endif; ?>
                                            <?php if(isset($_SESSION['errors']['email'])): ?>
                                            <div class="alert alert-danger">
                                                <?= $_SESSION['errors']['email']; ?>
                                            </div>
                                            <?php endif; ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name = 'email'
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <?php if(isset($_SESSION['errors']['password'])): ?>
                                            <div class="alert alert-danger">
                                                <?= $_SESSION['errors']['password']; ?>
                                            </div>
                                            <?php endif; ?>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name = 'password'
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">submit</button>
                                    </form>
                                    <?php unset($_SESSION['errors']); ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php include "inc/footer.php" ?> 
