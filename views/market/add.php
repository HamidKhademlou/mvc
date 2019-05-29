</div>
<?php if($_SESSION["Type"]=="Admin") :?>
<!------------------table-------------------->
<div class="limiter iransans">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100" id="user">
                <?php if (isset($_GET['error'])) :?>
                <?php if (@$_GET['error'] == 1) : echo "<center><span class=\" text-danger login100-form-title-1\">*fill all fields*</span></center>"; ?>
                <?php endif; ?>
                <?php if (@$_GET['error'] == 2) : echo "<center><span class=\" text-danger login100-form-title-1\">*this product exists*</span></center>"; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php if (isset($_GET['uploaderror'])) :?>
                <div class="text-center"><span class="text-danger"><?=$_GET['uploaderror']?></span></div>
                <?php endif; ?>
                <p class="text-center m-2">مشخصات کالا را وارد کنید</p>
                <form method="POST" action="<?= URL ?>/market/add" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-inline mb-4 mx-auto">
                            <input type="text" name="name" id="name" class="form-control-sm m-2"
                                value="<?= @$_GET['name'] ?>" placeholder="Enter name">
                            <input type="number" name="price" class="form-control-sm m-2" value="<?= @$_GET['price'] ?>"
                                placeholder="Enter Price">
                            <input type="text" name="body" class="form-control-sm m-2" value="<?= @$_GET['body'] ?>"
                                placeholder="Product Description">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="btn-sm btn-warning mx-2">
                            <input type="submit" name="submit" class="btn btn-success m-2">
                        </div>
                    </div>
                </form>

                <table class="col-6">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">ID</th>
                            <th class="column2">name</th>
                            <th class="column3">price</th>
                            <th class="column4">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($output as $key => $value) {
                            echo " <tr>
                            <td class=\"column1\">$value[id]</td>
                            <td class=\"column2\">$value[name]</td>
                            <td class=\"column3\">$value[price]</td>
                            <td class=\"column4\">
                                <div class=\"btn-group btn-group-sm\" data-toggle=\"buttons\">
                                    <button class=\"btn btn-danger\" onclick=\"window.location.href='".URL."/market/delete/?id=$value[id]&&name=$value[name]'\">Delete</button>
                                </div>
                            </td>
                        </tr> ";
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php else : header("Location: " . URL . "/admin/onlyadmin/"); ?>
<?php endif;?>