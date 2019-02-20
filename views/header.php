<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>my site</title>
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="<?= URL ?>/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
    rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
  <link href="<?= URL . URL_CSS_SITE ?>css/clean-blog.min.css" rel="stylesheet">
  <!----------------------------mycss------------------------------------------>
  <!-- <?php foreach ($this->mycss as $css) : ?>
  <link rel="stylesheet" href="<?= URL ?>/libs/mycss/<?= $css ?>">
  <?php endforeach ?> -->

  <style>
    @font-face {
      font-family: 'byekan';      /*a name to be used later*/
      src: url('<?= URL ?>/views/fonts/BYekan.ttf');      /*URL to font*/
    }
    @font-face {
      font-family: 'broya';      /*a name to be used later*/
      src: url('<?= URL ?>/views/fonts/BRoya.ttf');      /*URL to font*/
    }
    @font-face {
      font-family: 'iransans';      /*a name to be used later*/
      src: url('<?= URL ?>/views/fonts/IRANSansWeb.ttf');      /*URL to font*/
    }

    .byekan{
      font-family: 'byekan';
    }
    .broya{
      font-family: 'broya';
    }
    .iransans{
      font-family: 'iransans';
    }
    
    .bg {
      background-image: url("<?= URL ?>/views/sard.jpg");
      position: fixed;
      height: 100%;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      opacity: 0.5;
      z-index: -5;
    }

    button {
      outline: none !important;
      border: none;
      background: transparent;
    }

    button:hover {
      cursor: pointer;
    }

    input {
      display: block;
      outline: none;
      border: none !important;
    }

    textarea {
      display: block;
      outline: none;
    }

    textarea:focus,
    input:focus {
      border-color: transparent !important;
    }

    a:hover{
      color:#ffc107;
    }
    .loader {
      position:fixed;
      display:none;
      top: 40vh;
      left: 45%;
      border: 16px solid #f3f3f3;
      /* Light grey */
      border-top: 16px solid #3498db;
      /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
      z-index: 1000;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid">
      <?php @$username = Session::getSession('Login'); ?>
      <?php if ($username) : ?>
      <a class="navbar-brand" href="#">Hello
        <?= $username ?> </a>
      <?php else : ?>
      <a class="navbar-brand" href="#">Hello Dear guest</a>
      <?php endif; ?>

      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>/site/index">Home</a>
          </li>

          <?php if ((@$_SESSION["Type"]) == "Admin") : ?>
          <li class="nav-item">
            <a class="nav-link" href='<?= URL ?>/admin/table'>Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='<?= URL ?>/market/add'>Products</a>
          </li>
          <?php elseif ((@$_SESSION["Type"]) == "normal") : ?>
          <li class="nav-item">
            <a class="nav-link" href='<?= URL ?>/login/index'>USer Profile</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <?php if (!isset($_SESSION["Login"])) {
              echo "<a class=\"nav-link\" href=\"" . URL . "/login/login\">Login</a>";
            }
            ?>
          <?php if (isset($_SESSION["Login"])) : ?>
          <li class="nav-item">
            <a class="nav-link" href='<?= URL ?>/market'>Market</a>
          </li><?php endif; ?>
          <li class="nav-item">
            <a id="clock" class="nav-link"></a>
          </li>
          <?php
          $uri = $_SERVER['REQUEST_URI'];
          $url = trim($uri, "/");
          $request = explode("/", $url);
          ?>
          <li class="nav-item">
            <form id="searchform" class="form-inline m-0" style="padding:4.5px 0px" action="<?= URL.'/'.$request[2] ?>/search/">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button class="btn-sm btn-outline-warning" type="submit" id="search1">
                    <i class="fas fa-search"></i></button>
                </div>
                <input class="form-control" style="height:28px" type="text" placeholder="search" aria-describedby="search1" name="search">
              </div>
            </form>
          </li>
          <li class="nav-item">
            <button type="button" class="btn-sm btn-outline-warning " onclick="window.location.href='<?= URL ?>/market/basket/'">
              <i class="fas fa-shopping-cart" style="font-size:20px"></i> <span class="badge badge-light">
                <?php
                if (isset($_SESSION['count'])) {
                  echo $_SESSION['count'];
                } else {
                  echo "0";
                }
                ?>
              </span>
            </button>
          </li>
          </li>
          <li class="nav-item">
            <?php if (isset($_SESSION["Login"])) {
              echo "<a class=\"nav-link\" href=\"" . URL . "/login/logout\">Logout</a>";
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- <header class="masthead"> -->
  <header class="masthead non" style="background-image: url('<?= URL . URL_IMG_SITE ?>img/home-bg.jpg');">
    <div class="overlay "></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <!-- <h1>in the name of god</h1> -->
            <!-- <span class="subheading">In the name of God</span> -->
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container-fluid iransans">
    <div class="bg"></div>
    <div class="row mx-auto">