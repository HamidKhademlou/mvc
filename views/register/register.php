<div class="container-fluid mt-2 col-12 col-md-5 mx-auto">
    <div class="jumbotron shadow">
        <?php if (@$_GET['error'] == 1) : ?>
        <div class="alert alert-danger">Please fill all fields</div>
        <?php endif; ?>
        <?php if (@$_GET['error'] == 2) : ?>
        <div class="alert alert-danger">username already exists</div>
        <?php endif; ?>
        <?php if (@! is_null($_GET['emailerr'])) : ?>
        <div class="alert alert-danger"><?= $_GET['emailerr'] ?></div> 
        <?php endif; ?>

        <h3 class="text-center text-warning">مشخصات خود را وارد کنید</h3>
        <form method="POST" action="register" style="font-size: 0.8rem">
            <div class="form-group d-flex flex-column flex-wrap">
                <div class="my-2 px-5">
                    <label for="username">Username :</label>
                    <input id="username" type="text" class="form-control" required style="text-align: center" name="username" placeholder="Enter username" value="<?= @$_GET['username'] ?>">
                </div>
                <div class="my-2 px-5">
                    <label for="password">Password :</label>
                    <input id="password" type="password" class="form-control" required style="text-align: center" name="password" placeholder="Enter password">
                </div>
                <div class="my-2 px-5">
                    <label for="email">Email :</label>
                    <input id="email" type="email" class="form-control" required style="text-align: center" name="email" placeholder="Enter email" value="<?= @$_GET['email'] ?>"></div>
                <div class="my-2 px-5">
                    <label for="firstname">Firstname :</label>
                    <input id="firstname" type="text" class="form-control" required style="text-align: center" name="firstname" placeholder="Enter firstname" value="<?= @$_GET['firstname'] ?>"></div>
                <div class="my-2 px-5">
                    <label for="lastname">Lastname :</label>
                    <input id="lastname" type="text" class="form-control" required style="text-align: center" name="lastname" placeholder="Enter lastname" value="<?= @$_GET['lastname'] ?>"></div>
                <div class="my-3 text-center">
                    <input type="submit" name="submit" class="btn btn-danger"></div>
            </div>
        </form>
    </div>
</div>