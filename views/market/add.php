</div>
<?php if($_SESSION["Type"]=="Admin") :?>
<!-- /* *-----------------------table---------------------- */ -->

<head>
    <title>my market</title>
    <style>
        /* * {
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
        } */

        a {
            margin: 0px;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
        }

        a:focus {
            outline: none !important;
        }

        a:hover {
            text-decoration: none;
        }

        p {
            margin: 0px;
        }

        ul,
        li {
            margin: 0px;
            list-style-type: none;
        }
        iframe {
            border: none !important;
        }

        [ Table]*/ .limiter {
            margin: 0 auto;
        }
        .container-table100 {
            min-height: 100%;
            /* background: #c850c0;
            background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);
            background: -o-linear-gradient(45deg, #4158d0, #c850c0);
            background: -moz-linear-gradient(45deg, #4158d0, #c850c0);
            background: linear-gradient(45deg, #4158d0, #c850c0); */
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 33px 30px;
        }

        .wrap-table100 {
            width: 100%;
        }

        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        table * {
            position: relative;
        }

        table td,
        table th {
            padding-left: 8px;
        }

        table thead tr {
            height: 60px;
            background: #36304a;
        }

        table tbody tr {
            height: 50px;
        }

        table tbody tr:last-child {
            border: 0;
        }

        table td,
        table th {
            text-align: left;
        }

        table td.l,
        table th.l {
            text-align: right;
        }

        table td.c,
        table th.c {
            text-align: center;
        }

        table td.r,
        table th.r {
            text-align: center;
        }

        .table100-head th {
            font-size: 18px;
            color: #fff;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tbody tr {
            font-size: 15px;
            color: #808080;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:hover {
            color: #555555;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .column1 {
            /* width: 50px; */
            text-align: center;
            padding-left: 40px;
        }

        .column2 {
            /* width: 160px; */
            text-align: center;
        }

        .column3 {
            /* width: 245px; */
            text-align: center;
        }
        .column4 {
            /* width: 245px; */
            text-align: center;
        }

        @media screen and (max-width: 992px) {
            table {
                display: block;
            }

            table>*,
            table tr,
            table td,
            table th {
                display: block;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                height: auto;
                padding: 37px 0;
            }

            table tbody tr td {
                padding-left: 40% !important;
                margin-bottom: 24px;
            }

            table tbody tr td:last-child {
                margin-bottom: 0;
            }

            table tbody tr td:before {
                font-size: 14px;
                color: #999999;
                line-height: 1.2;
                font-weight: unset;
                position: absolute;
                left: 30px;
                top: 0;
            }

            table tbody tr td:nth-child(1):before {
                content: "id";
            }

            table tbody tr td:nth-child(2):before {
                content: "name";
            }

            table tbody tr td:nth-child(3):before {
                content: "price";
            }

            table tbody tr td:nth-child(4):before {
                content: "action";
            }
            tbody tr {
                font-size: 15px;
            }
        }

        @media (max-width: 576px) {
            .container-table100 {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</head>

<div class="limiter">
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
                            <input type="text" name="name" id="name" class="form-control-sm m-2" value="<?= @$_GET['name'] ?>"
                                placeholder="Enter name">
                            <input type="number" name="price" class="form-control-sm m-2" value="<?= @$_GET['price'] ?>"
                                placeholder="Enter Price">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="btn-sm btn-warning mx-2">
                            <input type="submit" name="submit" class="btn btn-success m-2">
                        </div>
                    </div>

                </form>

                <table class="col-6">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">#</th>
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