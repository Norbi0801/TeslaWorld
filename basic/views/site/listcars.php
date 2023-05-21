
<script>

    function edit(id){
        window.location.href = '/site/edit-form?id='+encodeURIComponent(id);
    }

    function addElementsList(json){
        document.getElementById('list').innerHTML='';
        json.forEach(function (el){
            document.getElementById('list').innerHTML+=
                '<li class="list-group-item">' +
                '<label class="col-md-3">Numer: '+ el['id']+'</label>' +
                '<label class="col-md-3">\tMarka: '+ el['brand']+'</label>' +
                '<label class="col-md-3">\tModel: '+ el['model']+'</label>' +
                '<label class="col-md-3">\tStatus: '+ el['status']+'</label>' +
                '</label>' +
                '<button onclick="edit('+el["id"]+')">Edytuj</button></li>'
        })
    }
    function changeCountRows(){
        fetch('/site/change-count-rows?CountRows='+encodeURIComponent(document.getElementById("CountRows").value))
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Błąd żądania');
                }
            })
            .then(function(data) {
                console.log(data)
                addElementsList(data)
            })
            .catch(function(error) {
                // Obsłuż błąd żądania
            });
    }
    function changeNumberPage(){
        fetch('/site/change-select-page?NumberPage='+encodeURIComponent(document.getElementById("NumberPage").value)+')')
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Błąd żądania');
                }
            })
            .then(function(data) {
                console.log("Hello PHP");
            })
            .catch(function(error) {
                // Obsłuż błąd żądania
            });
    }
    window.onload = function() {
        addElementsList(<?= $page ?>);
    };

</script>
<select onchange="changeCountRows()" id="CountRows" class="d-inline"">
    <?php
    foreach([10,20,50,100,200,300] as $num){
        echo '<option value="'.$num.'">'.$num.' pozycji</option>';
    }
    ?>
</select>
<input class="d-inline" type="number" value="1" min="1" max="<?= ($len+$countRows)/$countRows?>">
<a href="/site/add-form"><button>Dodaj</button></a>
<ul id="list" class="list-group" style="padding-top:1%">
</ul>