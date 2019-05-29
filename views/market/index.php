<div class="container-fluid ">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade col-11 mx-auto my-2" style="height: 300px" data-ride="carousel">
        <ol class="carousel-indicators ">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner shadow">
            <div class="carousel-item active">
                <img class="d-block w-100" style="height: 300px" src="<?= URL ?>/views/market/pic/1.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
                <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>We had such a great time in LA!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" style="height: 300px" src="<?= URL ?>/views/market/pic/2.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
                <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>We had such a great time in LA!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" style="height: 300px" src="<?= URL ?>/views/market/pic/3.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
                <div class="carousel-caption">
                    <h3>my slider</h3>
                    <p>We had such a great time in LA!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="d-flex justify-content-center flex-wrap text-center">
        <?php foreach ($output as $key => $value) : ?>
            <div id="<?= $value["id"] ?> " class="card m-2 shadow" style="width: 25rem;">
                <img class="card-img-top" src="<?= URL ?>/views/market/pic/<?= $value["name"] ?>.jpg" height="265" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $value["name"] ?>
                    </h5>
                    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                            content. This content is a little bit longer.</p> -->
                    <p class="card-text"><small class="text-muted"><?= $value["body"] ?></small></p>
                    <h5 class="card-title">price :
                        <?= $value["price"] ?> $</h5>
                    <button type="button" class="btn btn-primary px-4" onclick="window.location.href='<?= URL ?>/market/count/?id=<?= $value['id'] ?>'"><i class="fas fa-cart-plus" style="font-size:20px"></i></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>