<div class="container-fluid mt-2 col-12 col-md-5 mx-auto">
    <div class="jumbotron shadow">
        <?php if (@$_GET['error'] == 1) : echo "<center><span class=\" text-danger login100-form-title-1\">*fill all fields*</span></center>"; ?>
        <?php endif; ?>
        <?php if (@$_GET['error'] == 2) : echo "<center><span class=\" text-danger login100-form-title-1\">*username already exists*</span></center>"; ?>
        <?php endif; ?>
        <?php if (@$_GET['error'] == 3) : echo "<center><span class=\" text-danger login100-form-title-1\">*email already exists*</span></center>"; ?>
        <?php endif; ?>
        <h3 class="text-center text-warning byekan">مشخصات خود را وارد کنید</h3>
        <form method="POST" action="register" style="font-size: 0.9rem">
            <div class="form-group d-flex flex-column flex-wrap">
                <div class="mt-2 px-5">
                <label for="username">Username :</label>      
                    <input id="username" type="text" class="form-control" required style="text-align: center" name="username"
                        placeholder="Enter username" value="<?= @$_GET['username'] ?>">
                </div>
                <div class="mt-2 px-5">
                <label for="password">Password :</label>  
                    <input id="password" type="password" class="form-control" required style="text-align: center" name="password"
                        placeholder="Enter password">
                </div>
                <div class="mt-2 px-5">
                <label for="email">Email :</label>
                    <input id="email" type="email" class="form-control" required style="text-align: center" name="email"
                        placeholder="Enter email" value="<?= @$_GET['email'] ?>"></div>
                <div class="mt-2 px-5">
                <label for="firstname">Firstname :</label>  
                    <input id="firstname" type="text" class="form-control" required style="text-align: center" name="firstname"
                        placeholder="Enter firstname" value="<?= @$_GET['firstname'] ?>"></div>
                <div class="mt-2 px-5">
                <label for="lastname">Lastname :</label>  
                    <input id="lastname" type="text" class="form-control" required style="text-align: center" name="lastname"
                        placeholder="Enter lastname" value="<?= @$_GET['lastname'] ?>"></div>
                <div class="mt-3 text-center">
                <input type="submit" name="submit" class="btn btn-warning"></div>
            </div>
        </form>
    </div>
</div>    