<?php if ($_SESSION["Type"] == "Admin") : ?>
    <!-------------------------table----------------------->
    <div class="loader"></div>
    <div class="col-11 mx-auto p-2">
        <div class="table-responsive" id="user">
            <table class="table table-hover" style="direction: rtl;">
                <thead class="text-center iransans">
                    <tr class="bg-warning">
                        <th class="column1">ID</th>
                        <th class="column2 ">نام</th>
                        <th class="column3">نام خانوادگی</th>
                        <th class="column4">نام کاربری</th>
                        <!-- <th class="column5">Password</th> -->
                        <th class="column6">ایمیل</th>
                        <th class="column7">وضعیت</th>
                        <th class="column8">آخرین ورود</th>
                        <th class="column9">آخرین ip</th>
                        <th class="column10">عملیات</th>
                    </tr>
                </thead>
                <tbody class="text-center byekan">
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
                            <td class="column8" style='direction:ltr'><?= date('Y-m-d H:i:s', $value["lastlogin"]) ?></td>
                            <td class="column9"><?= $value["lastloginip"] ?></td>
                            <td class="column10">
                                <div class="btn-group btn-group-sm" data-toggle="buttons">
                                    <button class="btn btn-sm" onclick="window.location.href='<?= URL ?>/admin/edit/?id=<?= $value['id'] ?> &&firstname=<?= $value['firstname'] ?>&&lastname=<?= $value['lastname'] ?>&&username=<?= $value['username'] ?>&&email=<?= $value['email'] ?>'">
                                        <svg height="0.8rem" aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-sm" id="delete-<?= $value['id'] ?>">
                                        <svg height="0.8rem" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
                                        </svg>
                                    </button>
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