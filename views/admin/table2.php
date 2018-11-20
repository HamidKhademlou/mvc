<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL ?>/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'b-yekan';
            /*a name to be used later*/
            src: url('<?= URL ?>/views/fonts/BYekan.ttf');
            /*URL to font*/
        }

        body {
            background-image: url('');
            background-size: cover;
            font-family: 'b-yekan';
            /* font-size: 0.8rem; */
        }
        a{
            color:grey;
        }
        a.active{
            border-bottom: 3px solid #724EAF;
        }
        
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="d-flex flex-row " style="background-color: #724EAF;">
            <div class="col-1 border-right">
                <img src="<?= URL ?>/views/admin/pic7/image.png" style="width:4rem" class="rounded">
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center text-white text-center border-right">
                <i class="far fa-bell" style="font-size:2.1rem"></i>
            </div>
            <?php
            $uri = $_SERVER['REQUEST_URI'];
            $url = trim($uri, "/");
            $request = explode("/", $url);
            ?>
            <div class="col-8 d-flex justify-content-start align-items-center">
                <form id="searchform" class="form-inline mx-1" action="<?= URL.'/'.$request[2] ?>/search/">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn bg-transparent text-white" type="submit" id="search1">
                                <i class="fas fa-search" style="font-size:1.8rem"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" style="width:15rem" aria-describedby="search1" name="search" placeholder="عبارت مورد نظر خود را جستجو کنید">
                    </div>
                </form>
            </div>
            <div class="col-2 text-white d-flex align-items-center">
                مکتب
            </div>
        </div>
        <div class="col-12 d-flex flex-row-reverse">
            <div class="col-1 px-0 d-flex flex-column">
                <div class="d-flex flex-column my-auto">
                    <div class="py-3 text-center text-secondary" style="border-left: 3px solid #724EAF;"><i class="fas fa-home"></i></div>
                    <div class="py-3 text-center text-secondary"><i class="fas fa-shopping-cart"></i></div>
                    <div class="py-3 text-center text-secondary"><i class="far fa-calendar-alt"></i></div>
                    <div class="py-3 text-center text-secondary"><i class="fas fa-user"></i></div>
                </div>
                <div class="d-flex justify-content-center text-secondary"><i class="fas fa-cog"></i></div>
            </div>
            <div class="col-11 d-flex flex-wrap px-0 border-right" style="direction: rtl">
                <div class="col-9">
                    <ol class="breadcrumb bg-white mb-0">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item"><a href="#">مدیریت</a></li>
                        <li class="breadcrumb-item" aria-current="page">لیست کاربران</li>
                    </ol>
                </div>
                <div class="col-3 text-center align-self-center">بازگشت <i class="fas fa-chevron-left"></i></div>
                <div class="col-12">
                    <ul class="nav pr-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">لینک 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">لینک 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">لینک 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">لینک 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">لینک 5</a>
                        </li>
                    </ul>
                </div>
                <hr class="col-12 mt-0">
                <div class="col-9 text-right">لیست کاربران
                </div>
                <div class="col-3 text-center align-self-center pb-1"><button class="btn text-white rounded-0" style="background-color: #724EAF;">افزودن
                        کاربر <i class="far fa-user"></i></button></div>
                <div class="col-12">
                    <table class="table table-hover text-center" style="direction: rtl;">
                        <thead>
                            <tr class="text-secondary">
                                <th scope="col"> نام ونام خانوادگی</th>
                                <th scope="col">نام کاربری</th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($output as $key => $value) : ?>
                            <tr id="tr-<?= $value['id'] ?>" class="trsearchhide">
                                <td><img src="<?= URL ?>/views/admin/pic7/image.png" style="width:2rem" class="rounded">
                                    <?= $value["firstname"] ?>
                                    <?= $value["lastname"] ?>
                                </td>
                                <td>
                                    <?= $value["username"] ?>
                                </td>
                                <td>
                                    <?= $value["email"] ?>
                                </td>
                                <td>
                                    <?= $value["typeuser"] ?>
                                </td>
                                <td>
                                    <button class="btn bg-transparent" id="delete-1"><i class="far fa-trash-alt"></i></button>
                                    <button class="btn bg-transparent" onclick="window.location.href='http://localhost/hamid/mvc/admin/edit/?id=1 &amp;&amp;firstname=حمید&amp;&amp;lastname=خادملو&amp;&amp;username=admin&amp;&amp;email=hamid.5574@yahoo.com'"><i
                                            class="far fa-edit"></i></button>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="row col-12" style="direction: ltr;">
                    <div class="col-5">
                        <ul class="pagination m-0 p-0">
                            <li class="page-item"><a class="page-link text-secondary" href="#">انتها</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">بعدی</a></li>
                            <li class="page-item"><a class="page-link text-white" style="background-color: #724EAF;"
                                    href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">قبلی</a></li>
                            <li class="page-item"><a class="page-link text-secondary" href="#">ابتدا</a></li>
                        </ul>
                    </div>
                    <div class="col-7"> تعداد کل موارد</div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= URL ?>/libs/jquery-3.3.1.min.js"></script>
    <script src="<?= URL ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/hamid/mvc/libs/myjs/search.js"></script>
</body>

</html>