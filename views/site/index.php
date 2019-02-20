</div>
<?php 
// echo "first page of my site";
// echo $this->myjs;
?>
<style>
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="card m-1" style="box-sizing: border-box;">
    <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"><small class="text-muted "></small></p>
        <button id="getscsv" type="button" class="btn btn-success" onclick="window.location.href='<?= URL ?>/site/getcsv'">getcsv</button>
        <button id="getuser" type="button" class="btn btn-success">getuser</button>
        <button id="api" type="button" class="btn btn-success">APi</button>
        <div id="table1" class="table-responsive"></div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr class="">
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