<form method="post" action="/site/submit-edit">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <input type="hidden" name="id" value="<?= $record['id'] ?>">
    <ul id="list" class="list-group" style="padding-top:1%">
        <li class="list-group-item"><label class="col-md-2">Marka: </label>
            <select name="id_brand" class="d-inline"">
            <?php

            foreach($brands as $row){
                echo '<option '.($record['id_brand']==$row['id']?"selected":"").' value="'.$row["id"].'">'.$row['brand'].'</option>';
            }
            ?>
            </select></li>
        <li class="list-group-item"><label class="col-md-2">Model: </label><input value="<?php echo $record['model'];?>" name="model" class="col-md-5" type="text"></li>
        <li class="list-group-item"><label class="col-md-2">Rok produkcji: </label><input value="<?php echo $record['production_year'];?>" name="production_year" class="col-md-5" type="text"></li>
        <li class="list-group-item"><label class="col-md-2">Przebieg: </label><input value="<?php echo $record['mileage'];?>" name="mileage" class="col-md-5" type="text"></li>
        <li class="list-group-item"><label class="col-md-2">Status: </label>
            <select onchange="change('id_status')" name="id_status" class="d-inline"">
            <?php
            foreach($status as $row){
                echo '<option'.($record['id_status']-1==$row['id']?"selected":"").' value="'.$row["id"].'">'.$row['status'].'</option>';
            }
            ?>
            </select></li>
        <input type="submit" value="Edytuj">

    </ul></form>