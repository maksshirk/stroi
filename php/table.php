<?php
include 'table_config.php';

?>
<h6 align="center"><b>РАЗВЕРНУТАЯ СТРОЕВАЯ ЗАПИСКА</b> 
<br> подразделения "<?=$result_3["0"]["category"]?>"
<div id="current_date_time_block3"><br></div>
</h6>

<?php 
foreach ($result_3 as $value) { ?>
<?php if ($value['have_units'] != 1) { ?>
    <table id="mytable3" class="table table-bordered border border-dark table-hover table-responsive ">
      <thead>
        <tr>
          <th class="table_column">Подразделение</th>
          <th>По списку</th>
          <th>На лицо</th>
          <th>Наряд</th>
          <th>Командировка</th>
          <th>База ОУП</th>
          <th>Отпуск</th>
          <th>Мед.учр.</th>
          <th>Освоб. <br> по болезни</th>
          <th>Увольнение</th>
          <th>Лазарет</th>
          <th>Прочее</th>
          <th>Последняя редакция</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td class="table_column"><?=$value['category'] ?></td>        
            <td><a href="#" class="people-editable" data-name="on_list" data-type="text" data-title="По cписку" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['on_list'] ?></a></td>    
            <td><?=$value['on_the_face'] ?></td>
            <td><a href="#" class="people-editable" data-name="on_service" data-type="text" data-title="Наряд" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['on_service'] ?></a></td>    
            <td><a href="#" class="people-editable" data-name="mission" data-type="text" data-title="Командировка" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['mission'] ?></a></td>
            <td><a href="#" class="people-editable" data-name="boyp" data-type="text" data-title="База ОУП" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['boyp'] ?></a></td>        
            <td><a href="#" class="people-editable" data-name="holiday" data-type="text" data-title="Отпуск" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['holiday'] ?></a></td>    
            <td><a href="#" class="people-editable" data-name="patient" data-type="text" data-title="Болен" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['patient'] ?></a></td>    
            <td><a href="#" class="people-editable" data-name="osvobojdenie_po_bolezni" data-type="text" data-title="Освобожден по болезни" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['osvobojdenie_po_bolezni'] ?></a></td>    
            <td><a href="#" class="people-editable" data-name="dismissal" data-type="text" data-title="Увольнение" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['dismissal'] ?></a></td>    
            <td><a href="#" class="people-editable" data-name="lazaret" data-type="text" data-title="Лазарет" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['lazaret'] ?></a></td>    
            <td><a href="#" class="people-editable" data-name="other" data-type="text" data-title="Прочее" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['other'] ?></a></td>
            <td><?=$value['refresh_data'] ?></td>
          </tr> 
      </tbody>
    </table>  
    <table id="mytable_gun" class="table table-bordered border border-dark table-hover table-responsive table-striped">
    <h6 align="center"><b>Расход оружия в подразделении</b></h6>  
    <thead>
      <tr>
        <th rowspan = "2">Подразделение</th>
        <th colspan = "3">Автомат АК-74</th>
        <th colspan = "3">Штык-нож к автомату АК-74</th>
        <th colspan = "3">Ящики с боеприпасами</th>
        <th colspan = "3">5,45 мм патроны с ПС</th>
      </tr>
      <tr>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="table_column"><?=$value['category'] ?></td>        
        <td><a href="#" class="people-editable editable editable-click" data-name="ak74_komplekt_ps" data-type="text" data-title="Автомат АК-74 по списку" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['ak74_komplekt_ps'] ?></a></td>
        <td><a href="#" class="people-editable editable editable-click" data-name="ak74_komplekt_nv" data-type="text" data-title="Автомат АК-74 на выдаче" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['ak74_komplekt_nv'] ?></a></td>
        <td><?=$value['ak74_komplekt_vn'] ?></td>
        <td><a href="#" class="people-editable editable editable-click" data-name="ak74_noj_ps" data-type="text" data-title="Штык-нож к автомату АК-74 по списку" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['ak74_noj_ps'] ?></a></td>
        <td><a href="#" class="people-editable editable editable-click" data-name="ak74_noj_nv" data-type="text" data-title="Штык-нож к автомату АК-74 на выдаче" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['ak74_noj_nv'] ?></a></td>
        <td><?=$value['ak74_noj_vn'] ?></td>
        <td><a href="#" class="people-editable editable editable-click" data-name="boepripasi_ps" data-type="text" data-title="Ящики с боеприпасами по списку" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['boepripasi_ps'] ?></a></td>
        <td><a href="#" class="people-editable editable editable-click" data-name="boepripasi_nv" data-type="text" data-title="Ящики с боеприпасами на выдаче" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['boepripasi_nv'] ?></a></td>
        <td><?=$value['boepripasi_vn'] ?></td>
        <td><a href="#" class="people-editable editable editable-click" data-name="patroni_ps" data-type="text" data-title="5,45 мм патроны с ПС по списку" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['patroni_ps'] ?></a></td>
        <td><a href="#" class="people-editable editable editable-click" data-name="patroni_nv" data-type="text" data-title="5,45 мм патроны с ПС на выдаче" data-pk="<?=$value['id'] ?>" data-url="php/ajax.php" ><?=$value['patroni_nv'] ?></a></td>
        <td><?=$value['patroni_vn'] ?></td>
      </tr>
    </tbody>
    </table>      
<?php } 
else { ?>
          <table id="mytable3" class="table table-bordered border border-dark table-hover table-responsive">
      <thead>
        <tr>
          <th class="table_column">Подразделение</th>
          <th>По списку</th>
          <th>На лицо</th>
          <th>Наряд</th>
          <th>Командировка</th>
          <th>База ОУП</th>
          <th>Отпуск</th>
          <th>Мед.учр.</th>
          <th>Освоб. <br> по болезни</th>
          <th>Увольнение</th>
          <th>Лазарет</th>
          <th>Прочее</th>
          <th>Последняя редакция</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="table_column"><?=$value['category'] ?></td>
          <td><?=$value['on_list'] ?></td>
          <td><?=$value['on_the_face'] ?></td>
          <td><?=$value['on_service'] ?></td>
          <td><?=$value['mission'] ?></td>
          <td><?=$value['boyp'] ?></td>
          <td><?=$value['holiday'] ?></td>
          <td><?=$value['patient'] ?></td>
          <td><?=$value['osvobojdenie_po_bolezni'] ?></td>
          <td><?=$value['dismissal'] ?></td>
          <td><?=$value['lazaret'] ?></td>
          <td><?=$value['other'] ?></td>
          <td><?=$value['refresh_data'] ?></td>
        </tr> 
      </tbody>
    </table>  
    <table id="mytable_gun" class="table table-bordered border border-dark table-hover table-responsive table-striped">
    <h6 align="center"><b>Расход оружия</b></h6>  
    <thead>
      <tr>
        <th rowspan = "2">Подразделение</th>
        <th colspan = "3">Автомат АК-74</th>
        <th colspan = "3">Штык-нож к автомату АК-74</th>
        <th colspan = "3">Ящики с боеприпасами</th>
        <th colspan = "3">5,45 мм патроны с ПС</th>
      </tr>
      <tr>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
        <th>По списку</th>
        <th>На выдаче</th>
        <th>В наличии</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="table_column"><?=$value['category'] ?></td>        
        <td><?=$value['ak74_komplekt_ps'] ?></td>
        <td><?=$value['ak74_komplekt_nv'] ?></td>
        <td><?=$value['ak74_komplekt_vn'] ?></td>
        <td><?=$value['ak74_noj_ps'] ?></td>
        <td><?=$value['ak74_noj_nv'] ?></td>
        <td><?=$value['ak74_noj_vn'] ?></td>
        <td><?=$value['boepripasi_ps'] ?></td>
        <td><?=$value['boepripasi_nv'] ?></td>
        <td><?=$value['boepripasi_vn'] ?></td>
        <td><?=$value['patroni_ps'] ?></td>
        <td><?=$value['patroni_nv'] ?></td>
        <td><?=$value['patroni_vn'] ?></td>
      </tr>
    </tbody>
    </table>
  <?php } ?>
<?php } ?>




<!-- <button id= "button-refresh" type="submit" value="//$result_3["0"]['id']" class="btn btn-success btn-block text-align: center">Обновить расход за подчиненные подразделения</button>
 --><p>
<?php
  if ($result_3["0"]["have_units"] != '0') 
    { ?>
    <table id="mytable" class="table table-bordered border border-dark table-hover table-responsive table-striped">
    <h6 align="center"><b>Расход в подчиненных подразделениях</b></h6>    
    <thead>
        <tr>
          <th>№ п/п</th>
          <th>Подразделение</th>
          <th>По списку</th>
          <th>На лицо</th>
          <th>Наряд</th>
          <th>Командировка</th>
          <th>База ОУП</th>
          <th>Отпуск</th>
          <th>Мед.учр.</th>
          <th>Освоб. <br> по болезни</th>
          <th>Увольнение</th>
          <th>Лазарет</th>
          <th>Прочее</th>
          <th>Последняя редакция</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i = 1;
      foreach ($result as $value) { ?>
          <tr>
            <td><?=$i ?></td>
            <td><?=$value['category'] ?></td>
            <td><?=$value['on_list'] ?></td>
            <td><?=$value['on_the_face'] ?></td>
            <td><?=$value['on_service'] ?></td>
            <td><?=$value['mission'] ?></td>
            <td><?=$value['boyp'] ?></td>
            <td><?=$value['holiday'] ?></td>
            <td><?=$value['patient'] ?></td>
            <td><?=$value['osvobojdenie_po_bolezni'] ?></td>
            <td><?=$value['dismissal'] ?></td>
            <td><?=$value['lazaret'] ?></td>
            <td><?=$value['other'] ?></td>          
            <td><?=$value['refresh_data'] ?></td>
          </tr> 
      <?php $i++;} ?>
      </tbody>
    </table>
    
    <table id="mytable_guns" class="table table-bordered border border-dark table-hover table-responsive table-striped">
      <h6 align="center"><b>Расход оружия в подчиненных подразделениях</b></h6>     
      <thead>
        <tr>
          <th rowspan = "2">№ п/п</th>
          <th rowspan = "2">Подразделение</th>
          <th colspan = "3">Автомат АК-74</th>
          <th colspan = "3">Штык-нож к автомату АК-74</th>
          <th colspan = "3">Ящики с боеприпасами</th>
          <th colspan = "3">5,45 мм патроны с ПС</th>
        </tr>
        <tr>
          <th>По списку</th>
          <th>На выдаче</th>
          <th>В наличии</th>
          <th>По списку</th>
          <th>На выдаче</th>
          <th>В наличии</th>
          <th>По списку</th>
          <th>На выдаче</th>
          <th>В наличии</th>
          <th>По списку</th>
          <th>На выдаче</th>
          <th>В наличии</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $i = 1;
      foreach ($result as $value) { ?>
        <tr>
          <td><?=$i ?></td>
          <td class="table_column"><?=$value['category'] ?></td>        
          <td><?=$value['ak74_komplekt_ps'] ?></td>
          <td><?=$value['ak74_komplekt_nv'] ?></td>
          <td><?=$value['ak74_komplekt_vn'] ?></td>
          <td><?=$value['ak74_noj_ps'] ?></td>
          <td><?=$value['ak74_noj_nv'] ?></td>
          <td><?=$value['ak74_noj_vn'] ?></td>
          <td><?=$value['boepripasi_ps'] ?></td>
          <td><?=$value['boepripasi_nv'] ?></td>
          <td><?=$value['boepripasi_vn'] ?></td>
          <td><?=$value['patroni_ps'] ?></td>
          <td><?=$value['patroni_nv'] ?></td>
          <td><?=$value['patroni_vn'] ?></td>
        </tr>
      <?php $i++;} ?>
      </tbody>
    </table>    
  <?php } ?>

<div class="table-responsive">  
      <h6 align="center"><b>Отсутствующие</b></h6>  
      <div id="live_data"></div>                 
</div>  
<h6 align="center"><b>Командир (начальник) подразделения</b> 
<br> __________________________________________________________________ 
<br> <font size="1">(Должность, в/звание, подпись, инициал, фамилия)</font>
<br><br> "____" __________________ 202__ г.
</h6>
<script>
    $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"php/select.php",  
                method:"POST",  
                data:{id_category:localStorage.getItem('id_category')},
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var division = $('#division').text();  
           var title = $('#title').text();  
           var unit = $('#unit').text();  
           var reason = $('#reason').text();  
           var place = $('#place').text();  
           var time = $('#time').text();  
           if(division == '')  
           {  
                alert("Введите подразделение");  
                return false;  
           }  
           if(title == '')  
           {  
                alert("Введите воинское звание");  
                return false;  
           }  
           if(unit == '')  
           {  
                alert("Введите ФИО");  
                return false;  
           }  
           if(reason == '')  
           {  
                alert("Введите причину отсутствия");  
                return false;  
           }  
           if(place == '')  
           {  
                alert("Введите местонахождение");  
                return false;  
           }  
           if(time == '')  
           {  
                alert("Введите время отсутствия");  
                return false;  
           }  
           $.ajax({  
                url:"php/insert.php",  
                method:"POST",  
                data:{division:division, 
                      title:title,
                      unit:unit, 
                      reason:reason,
                      place:place, 
                      time:time,
                      id_category:localStorage.getItem('id_category')
                    },  
                dataType:"text",  
                success:function(data)  
                {  
                     
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"php/edit.php",  
                method:"POST",  
                data:{
                      id:id, 
                      text:text, 
                      column_name:column_name,
                      id_category:localStorage.getItem('id_category')},  
                dataType:"text",  
                success:function(data){  
                     alert("Данные изменены");
                     fetch_data(); 
                }  
           });  
      }  
      $(document).on('blur', '.division', function(){  
           var id = $(this).data("id1");  
           var division = $(this).text();  
           edit_data(id, division, "division");  
      });  
      $(document).on('blur', '.title', function(){  
           var id = $(this).data("id2");  
           var title = $(this).text();  
           edit_data(id,title, "title");  
      });  
      $(document).on('blur', '.unit', function(){  
           var id = $(this).data("id3");  
           var unit = $(this).text();  
           edit_data(id,unit, "unit");  
      });  
      $(document).on('blur', '.reason', function(){  
           var id = $(this).data("id4");  
           var reason = $(this).text();  
           edit_data(id,reason, "reason");  
      });  
      $(document).on('blur', '.place', function(){  
           var id = $(this).data("id5");  
           var place = $(this).text();  
           edit_data(id,place, "place");  
      });  
      $(document).on('blur', '.time', function(){  
           var id = $(this).data("id6");  
           var time = $(this).text();  
           edit_data(id,time, "time");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id7");  
                $.ajax({  
                     url:"php/delete.php",  
                     method:"POST",  
                     data:{
                          id:id,
                          id_category:localStorage.getItem('id_category')
                          },  
                     dataType:"text",  
                     success:function(data){  
                          fetch_data();  
                     }  
                });     
      });  
    });  
    $(document).ready(function() {
        $('.people-editable').editable({
          mode: "inline",
          success: function(response, newValue) {
            location.reload();
          }
        });

    });
</script>
<script type="text/javascript">
        var  months = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
        var d = new Date();
        var monthName=months[d.getMonth()];
        
        var time = setInterval(function() {
        var date = new Date();
        document.getElementById("current_date_time_block3").innerHTML = ("на " + date.getDate() + " " + months[date.getMonth()] + " " + date.getFullYear() + " г.");
        }, 1000);
        setInterval(function() {
        location.reload();
        }, 60000);
    </script>    
<script src="/site/js/table_script.js" type="text/javascript"></script>
