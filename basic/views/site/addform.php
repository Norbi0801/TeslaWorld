<form method="post" action="/site/submit-add">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <ul id="list" class="list-group" style="padding-top:1%">
    <li class="list-group-item"><label class="col-md-2">Marka: </label>
        <select required name="id_brand" class="d-inline"">
        <?php
        foreach($brands as $row){
            echo '<option value="'.$row["id"].'">'.$row['brand'].'</option>';
        }
        ?>
        </select></li>
    <li class="list-group-item"><label class="col-md-2">Model: </label><input required name="model" class="col-md-5" type="text"></li>
    <li class="list-group-item"><label class="col-md-2">Rok produkcji: </label><input required minlength="4" maxlength="4" name="production_year" class="col-md-5" type="number"></li>
    <li class="list-group-item"><label class="col-md-2">Przebieg: </label><input required name="mileage" class="col-md-5" type="number"></li>
    <li class="list-group-item"><label class="col-md-2">Status: </label>
        <select required onchange="change('id_status')" name="id_status" class="d-inline"">
        <?php
        foreach($status as $row){
            echo '<option value="'.$row["id"].'">'.$row['status'].'</option>';
        }
        ?>
        </select></li>
    <input type="submit" value="Dodaj">

</ul></form>