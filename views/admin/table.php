<?php if ($_SESSION["Type"] == "Admin") : ?>
<!-- /* *-----------------------table---------------------- */ -->
<head>
    <style>
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

        p {
            margin: 0px;
        }

        ul,
        li {
            margin: 0px;
            list-style-type: none;
        }

        table {
            border-radius: 10px;
            overflow: hidden;
        }

        tbody tr {
            font-size: 0.9rem;
            color: #808080;
        }
        tbody th {
            font-size: 0.8rem;
        }

        /* tbody tr:hover {
            color: #555555;
            cursor: pointer;
        } */

        .column1, .column2, .column3, .column4, .column6, .column7, .column8, .column9, .column10 {
            /* width: 50px; */
        }
        /* .column5 {
            max-width: 450px;
            overflow: auto;
        }*/
    </style>
</head>
<div class="loader"></div>
<div class="col-11 mx-auto p-2">
    <div class="table-responsive" id="user">
        <table class="table table-hover" style="direction: rtl;">
            <thead class="text-center">
                <tr class="bg-warning" style="fontsize">
                    <th class="column1">#</th>
                    <th class="column2 byekan">نام</th>
                    <th class="column3 byekan">نام خانوادگی</th>
                    <th class="column4">نام کاربری</th>
                    <!-- <th class="column5">Password</th> -->
                    <th class="column6">ایمیل</th>
                    <th class="column7">وضعیت</th>
                    <th class="column8">آخرین ورود</th>
                    <th class="column9">آخرین ip</th>
                    <th class="column10">عملیات</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php foreach ($output as $key => $value) : ?>
                <tr id="tr-<?= $value['id'] ?>" class="trsearchhide">
                <td class="column1"><?= $value["id"] ?></td>
                <td class="column2"><?= $value["firstname"] ?></td>
                <td class="column3"><?= $value["lastname"] ?></td>
                <td class="column4"><?= $value["username"] ?></td>
                <!-- <td class="column5"><?= $value["password"] ?></td> -->
                <td class="column6"><?= $value["email"] ?></td>
                <td class="column7">
                    <div class="dropdown">
                        <button class="btn-sm dropdown-toggle" type="button" id="dropdownMenuButton<?= $value['id'] ?>" data-toggle="dropdown"><?= $value["typeuser"] ?></button>
                        <div class="dropdown-menu">
                        <?php if ($value["typeuser"] == "Admin") : ?>
                            <!-- <button id="normal <?= $value['id'] ?>" class="btn-sm dropdown-item" onclick="window.location.href='<?= URL ?>/admin/access/?id=<?= $value['id'] ?>&&typeuser=normal'">normal</button> -->
                            <button id="normal-<?= $value['id'] ?>" class="btn-sm dropdown-item">normal</button>
                            <button id="notactive-<?= $value['id'] ?>" class="btn-sm dropdown-item">notactive</button>
                        <?php elseif ($value["typeuser"] == "normal") : ?>
                            <button id="Admin-<?= $value['id'] ?>" class="btn-sm dropdown-item">Admin</button>
                            <button id="notactive-<?= $value['id'] ?>" class="btn-sm dropdown-item">notactive</button>
                        <?php elseif ($value["typeuser"] == "notactive") : ?>
                            <button id="Admin-<?= $value['id'] ?>" class="btn-sm dropdown-item">Admin</button>
                            <button id="normal-<?= $value['id'] ?>" class="btn-sm dropdown-item">normal</button>
                        <?php endif ?>
                        </div>
                    </div>
                </td>
                <td class="column8"><?= $value["lastlogin"] ?></td>
                <td class="column9"><?= $value["lastloginip"] ?></td>
                <td class="column10">
                    <div class="btn-group btn-group-sm" data-toggle="buttons">
                        <button class="btn-sm" id="delete-<?= $value['id'] ?>"><i class="far fa-trash-alt"></i></button>
                        <button class="btn-sm" onclick="window.location.href='<?= URL ?>/admin/edit/?id=<?= $value['id'] ?> &&firstname=<?= $value['firstname'] ?>&&lastname=<?= $value['lastname'] ?>&&username=<?= $value['username'] ?>&&email=<?= $value['email'] ?>'"><i class="far fa-edit"></i></button>
                    </div>
                </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php else : header("Location: " . URL . "/admin/onlyadmin/"); ?>
<?php endif; ?>