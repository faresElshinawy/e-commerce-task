<?php include_once "inc/header.php" ?> 
<?php 
    $id =  sanitizeinput($_GET['id']);
?> 



<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">edit product</h1>
                            </div>
                            <form class="user" method='post' action="handlers/edit_product.php" enctype='multipart/form-data'>
                                <?php
                                    $row_product = getproductbyid($conn,$id);
                                ?>
                                <input type="hidden" name='id' value='<?= $id ?>'>
                                <?php if(isset($_SESSION['errors']['name'])): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errors']['name']; ?>
                                    </div>
                                    <?php  endif; ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user rounded-3 p-4" id="exampleFirstName" name='name' value='<?= $row_product['name']?>'
                                        placeholder="product name">     
                                    </div>
                                    <?php if(isset($_SESSION['errors']['description'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['description']; ?>
                                        </div>
                                        <?php  endif; ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user rounded-3 p-4" id="exampleInputEmail" name='description' value='<?= $row_product['description']?>'
                                            placeholder="description">
                                        </div>
                                        <?php if(isset($_SESSION['errors']['image'])): ?>
                                            <div class="alert alert-danger">
                                                <?php echo $_SESSION['errors']['image']; ?>
                                            </div>
                                            <?php  endif; ?>
                                            <div class="form-group mb-3">
                                                <img src="uploaded/<?= $row_product['image'] ?>" alt="" width='200' height='200'>
                                                <input type="hidden" name='old_image' value='<?= $row_product['image'] ?>'>
                                            </div>
                                    <div class="form-group mb-3">
                                <label for="formFileMultiple" class="form-label text-muted  ">product image</label>
                                <input class="form-control text-muted rounded-3"  type="file" id="formFileMultiple" name='image' multiple />
                                </div>
                                <?php if(isset($_SESSION['errors']['count'])): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errors']['count']; ?>
                                    </div>
                                <?php  endif; ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <input type="number" class="form-control form-control-user rounded-3" value='<?= $row_product['count']?>'
                                            id="exampleInputPassword" placeholder="count" name='count'>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user rounded-3" value='<?= $row_product['price']?>'
                                        id="exampleRepeatPassword" placeholder="price" name='price'>
                                    </div>
                                </div>
                                <?php if(isset($_SESSION['errors']['category'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['errors']['category']; ?>
                                        </div>
                                    <?php  endif; ?>
                                <div class="form-group">
                                    <select name="category_id" id=""  class="form-select text-muted" aria-label="Default select example">
                                        <?php
                                        $data = getcategoriesinfo($conn);
                                        while($row = mysqli_fetch_assoc($data)):
                                        ?>
                                        <option value="<?= $row['id'] ?>" class='from form-control text-muted ' <?php 
                                        if($row['id'] == $row_product['category_id']){
                                            echo 'selected';
                                        }
                                        ?>><?= $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
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