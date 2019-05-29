<!-- <? php: $this->myjs; ?> -->
<!-- alert -->
<?php if (!empty($_GET["alert"])) : ?>
    <div class="my-1 alert alert-danger alert-dismissible fade show rtl text-right" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <?= $_GET["alert"] ?>
    </div>
<?php endif; ?>
<!-- end alert -->
<div class="card my-1">
    <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"><small class="text-muted "></small></p>
        <button id="getscsv" type="button" class="btn btn-success" onclick="window.location.href='<?= URL ?>/site/getcsv'">getcsv</button>
        <button id="getuser" type="button" class="btn btn-success">getuser</button>
        <button id="api" type="button" class="btn btn-success">APi</button>
        <div id="table1" class="table-responsive"></div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th class="column1">Id</th>
                    <th class="column2">Firstname</th>
                    <th class="column3">Lastname</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($output as $key => $value) : ?>
                    <tr id="tr-<?= $value['id'] ?>">
                        <td class="column1">
                            <?= $value["id"] ?>
                        </td>
                        <td class="column2">
                            <?= $value["firstname"] ?>
                        </td>
                        <td class="column3">
                            <?= $value["lastname"] ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div style="overflow:auto;">
            <div id="r11" class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="r1" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="r1">check once</label>
            </div>
            <div id="r22" class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="r2" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="r2">check every 3s</label>
            </div>
            <div class="table2 col-6 d-inline-block text-center"></div>
            <div class="loader col-6" style="display:none"></div>
        </div>
    </div>
</div>
<!-- currency API -->
<div class="row">
    <div class="col-12">
        <script src="http://www.tgju.org/webservice/global/snippet-loader.php?token=webservice&items=price_dollar_rl,price_eur,price_aed,price_gbp,sekeb,sekee,nim,rob,ons,mesghal,geram18,geram24,gerami,oil,oil_brent,oil_opec,bourse,bank_usd,bank_eur,bank_aed,bank_gbp,sana_buy_usd,sana_buy_eur,sana_buy_aed,sana_sell_usd,sana_sell_eur,sana_sell_aed&opts=diff,time&placeholder=tgju-data">
        </script>
        <div id="tgju-data"></div>
        <style>
            body #tgju table.data-table thead th,
            body .tgju-copyright {
                background-color: #000000;
            }

            body #tgju table.data-table thead th,
            body .tgju-copyright {
                color: #FF2654;
            }

            body #tgju table.data-table {
                border-color: #1a1a1a;
            }
        </style>
    </div>
</div>