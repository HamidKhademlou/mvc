</div>
</div>

<hr class="m-1">

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        <p class="copyright text-muted shadow-lg rounded">Copyright &copy; Your Website 2018</p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?= URL ?>/libs/jquery-3.3.1.min.js"></script>
<script src="<?= URL ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for this template -->
<script src="<?= URL . URL_JS_SITE ?>js/clean-blog.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php foreach ($this->myjs as $js) : ?>
<script src="<?= URL ?>/libs/myjs/<?= $js ?>"></script>
<?php endforeach ?>
<!-- <script src="<?= URL ?>/libs/myjs/time.js"></script> -->
</body>

</html>