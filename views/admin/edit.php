<?php if ($_SESSION["Type"] == "Admin") : ?>
<div class="container col-12 col-md-6">
    <div class="jumbotron col-10 mt-3 shadow">
        <?php if (@$_GET['error'] == 1) : echo "<center><span class=\" text-danger login100-form-title-1\">*fill all fields*</span></center>"; ?>
        <?php endif; ?>
        <?php if (@$_GET['error'] == 2) : echo "<center><span class=\" text-danger login100-form-title-1\">*username already exists*</span></center>"; ?>
        <?php endif; ?>
        <?php if (@$_GET['error'] == 3) : echo "<center><span class=\" text-danger login100-form-title-1\">*email already exists*</span></center>"; ?>
        <?php endif; ?>
        <h4 class="text-center text-primary byekan">مشخصات خود را وارد کنید</h4>
        <form class="col-8 mx-auto" method="POST" action="<?= URL ?>/admin/edit">
            <div class="form-group d-flex flex-column flex-wrap">
                <div class="">
                <label for="username">Username :</label>
                    <input id="username" type="text" class="form-control" required style="text-align: center" name="username"
                        placeholder="Enter username" value="<?= @$_GET['username'] ?>" data-toggle="tooltip" title="enter new username">
                </div>
                <div class="">                    
                <label for="password">Password :</label>
                    <input  id="password" type="text" class="form-control mt-2" required style="text-align: center" name="password"
                        placeholder="Enter password" value="<?= @$_GET['password'] ?>" data-toggle="tooltip" title="enter new password">
                </div>
                <div class=""> 
                <label for="email">Email :</label>
                    <input id="email" type="email" class="form-control mt-2" required style="text-align: center" name="email"
                        placeholder="Enter email" value="<?= @$_GET['email'] ?>" data-toggle="tooltip" title="enter new email"></div>
                <div class="">
                <label for="firstname">Firstname :</label> 
                    <input id="firstname" type="text" class="form-control mt-2" required style="text-align: center" name="firstname"
                        placeholder="Enter firstname" value="<?= @$_GET['firstname'] ?>" data-toggle="tooltip" title="enter new firstname"></div>
                <div class="">
                <label for="lastname">Lastname :</label> 
                    <input id="lastname" type="text" class="form-control mt-2" required style="text-align: center" name="lastname"
                        placeholder="Enter lastname" value="<?= @$_GET['lastname'] ?>" data-toggle="tooltip" title="enter new lastname"></div>
                <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                <div class="mt-3 text-center">
                <input type="submit" name="submit" class="btn-sm btn-danger mt-2"></div>
            </div>
        </form>
    </div>
</div>
<?php else : header("Location: " . URL . "/admin/onlyadmin/"); ?>
<?php endif; ?>