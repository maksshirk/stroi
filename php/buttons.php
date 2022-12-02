<?php
include 'table_config.php';
?>
<?php
$array = $result_3["0"]["personal"];
$id = $result_3["0"]["id"];
$category = $result_3["0"]["category"];
$array_new = array(); 
$i = 1;
?>

<button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#print">Печать строевой записки</button>
<button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#modal">Список личного состава</button>

<div class="modal" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="max-width: 1300px!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Список личного состава</h5>
        <button type="button" class="close" data-dismiss="modal" id="close" data-keyboard="false" aria-label="Close" data-bs-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>      
      
      <div class="modal-body" >
        <?php
        if (!$array) {
          $array = json_decode($array, true); ?>
          <?=$id;?>
          <table id="table_personal" class="table table-bordered border border-dark table-hover table-responsive table-striped">
          <h6 align="center"><b>Личный состав:</b></h6>    
          <thead>
              <tr>
                <th>№ п/п</th>
                <th>Подразделение</th>
                <th>Должность</th>
                <th>Воинское звание</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Номер телефона</th>
                <th>Состояние</th>
                <th>Причина/Вид наряда/Диагноз/Прочее</th>
                <th>Местонахождение</th>
                <th>Кто исполняет обязанности на время отсутствия</th>
                <th>С какого момента отсутствует</th>
                <th>Основание (приказ НА)</th>
                <th>Действие</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($array as $value) { ?>
                <tr>
                  <?php $value['id'] = $i;?>
                  <td><?=$value['id'] ?></td>
                  <td><?=$category ?></td>
                  <td><a href="#" id="position" class="editable editable-click" data-name="position" data-type="select" data-title="Должность" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['position'] ?></a></td>
                  <td><a href="#" id= "rank" class="editable editable-click" data-name="rank" data-type="select" data-title="Воинское звание" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['rank'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="last_name" data-type="text" data-title="Фамилия" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['last_name']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="first_name" data-type="text" data-title="Имя" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['first_name']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="middle_name" data-type="text" data-title="Имя" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['middle_name']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="phone" data-type="text" data-title="Телефон" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['phone']?></a></td>
                  <td><a href="#" id= "status" class="editable editable-click" data-name="status" data-type="select" data-title="Состояние" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['status'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="reason" data-type="text" data-title="Причина" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['reason'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="location" data-type="text" data-title="Местонахождение" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['location'] ?></a></td>
                  <td><a href="#" id= "reserv" class="editable editable-click" data-name="reserv" data-type="select" data-title="Резерв" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['reserv'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="time" data-type="text" data-title="Время отсутствия" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['time']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="prikaz" data-type="text" data-title="Основание (Приказ НА)" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['prikaz']?></a></td>
                  <td><button type="button" class="btn btn-danger btn-block">Удалить</button></td>
                </tr> 
            <?php $i++;} ?>
            </tbody>
          </table>
          <button type="button" class="btn btn-secondary">Добавить военнослужащего</button>
        <?php }
        else {
          
          $array = [["id" => "№ п/п", 
                    "category" => "Подразделение", 
                    "position" => "Должность",
                    "rank" => "Воинское звание", 
                    "last_name" => "Фамилия", 
                    "first_name" => "Имя", 
                    "middle_name" => "Отчество", 
                    "phone" => "Номер телефона", 
                    "status" => "Состояние", 
                    "reason" => "Причина", 
                    "location" => "Местонахождение",
                    "reserv" => "Резерв",
                    "time" => "18.07.2022",
                    "prikaz" => "Приказ"]];?>
          <?=$id;?>
          <table id="table_personal" class="table table-bordered border border-dark table-hover table-responsive table-striped">
          <h6 align="center"><b>Личный состав:</b></h6>    
          <thead>
              <tr>
                <th>№ п/п</th>
                <th>Подразделение</th>
                <th>Должность</th>
                <th>Воинское звание</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Номер телефона</th>
                <th>Состояние</th>
                <th>Причина/Вид наряда/Диагноз/Прочее</th>
                <th>Местонахождение</th>
                <th>Кто исполняет обязанности на время отсутствия</th>
                <th>С какого момента отсутствует</th>
                <th>Основание (приказ НА)</th>
                <th>Действие</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($array as $value) { ?>
                <tr>
                  <?php $value['id'] = $i;?>
                  <td><?=$value['id'] ?></td>
                  <td><?=$category ?></td>
                  <td><a href="#" id="position" class="editable editable-click" data-name="position" data-type="select" data-title="Должность" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['position'] ?></a></td>
                  <td><a href="#" id= "rank" class="editable editable-click" data-name="rank" data-type="select" data-title="Воинское звание" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['rank'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="last_name" data-type="text" data-title="Фамилия" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['last_name']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="first_name" data-type="text" data-title="Имя" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['first_name']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="middle_name" data-type="text" data-title="Имя" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['middle_name']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="phone" data-type="text" data-title="Телефон" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['phone']?></a></td>
                  <td><a href="#" id= "status" class="editable editable-click" data-name="status" data-type="select" data-title="Состояние" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['status'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="reason" data-type="text" data-title="Причина" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['reason'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="location" data-type="text" data-title="Местонахождение" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['location'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="reserv" data-type="text" data-title="Резерв" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['reserv'] ?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="time" data-type="text" data-title="Время отсутствия" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['time']?></a></td>
                  <td><a href="#" class="personal_editable editable editable-click" data-name="prikaz" data-type="text" data-title="Основание (Приказ НА)" data-pk="<?=$id?>" data-url="php/ajax_personal.php" ><?=$value['prikaz']?></a></td>
                  <td><button type="button" class="btn btn-danger btn-block">Удалить</button></td>
                </tr> 
            <?php $i++;} ?>
            </tbody>
          </table>
          <button type="button" class="btn btn-secondary">Добавить военнослужащего</button>
        <?php }; ?> 
      </div>
      
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Сохранить</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="print" tabindex="-1" role="dialog">
  <div class="modal-dialog" style="max-width: 1000px!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Выберите нужные данные!</h5>
        <button type="button" class="close" data-dismiss="modal" id="close" data-keyboard="false" aria-label="Close" data-bs-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Сохранить</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>



<script>
    
    $(document).ready(function() {
      $('.personal_editable').editable({
          mode: "inline",
          success: function(response, newValue) {
            location.reload();
          }
        });
        $('#position').editable({
            mode: "inline",
            value: 'Курсант',
            source: [
                {value: 'Курсант', text: 'Курсант'},
                {value: 'Командир отделения', text: 'Командир отделения'},
                {value: 'Командир учебной группы', text: 'Командир учебной группы'},
                {value: 'Старшина курса', text: 'Старшина курса'},
                {value: 'Курсовой офицер - преподаватель', text: 'Курсовой офицер - преподаватель'},
                {value: 'Начальник курса', text: 'Начальник курса'},
                {value: 'Инженер', text: 'Инженер'},
                {value: 'Начальник лаборатории', text: 'Начальник лаборатории'},
                {value: 'Преподаватель', text: 'Преподаватель'},
                {value: 'Старший преподаватель', text: 'Старший преподаватель'},
                {value: 'Доцент', text: 'Доцент'},
                {value: 'Профессор', text: 'Профессор'},
                {value: 'Заместитель начальника кафедры', text: 'Заместитель начальника кафедры'},
                {value: 'Начальник кафедры', text: 'Начальник кафедры'},
                {value: 'Заместитель начальника факультета', text: 'Заместитель начальника факультета'},
                {value: 'Начальник факультета', text: 'Начальник факультета'},
                {value: 'Начальник отдела', text: 'Начальник отдела'},
                {value: 'Прочее', text: 'Прочее'}
            ]
        });
        $('#rank').editable({
            mode: "inline",
            value: 'Рядовой',
            source: [
                {value: 'Рядовой', text: 'Рядовой'},
                {value: 'Матрос', text: 'Матрос'},
                {value: 'Ефрейтор', text: 'Ефрейтор'},
                {value: 'Старший матрос', text: 'Старший матрос'},
                {value: 'Младший сержант', text: 'Младший сержант'},
                {value: 'Старшина 2 статьи', text: 'Старшина 2 статьи'},
                {value: 'Сержант', text: 'Сержант'},
                {value: 'Старшина 1 статьи', text: 'Старшина 1 статьи'},
                {value: 'Старший сержант', text: 'Старший сержант'},
                {value: 'Главный старшина', text: 'Главный старшина'},
                {value: 'Старшина', text: 'Старшина'},
                {value: 'Главный корабельный старшина', text: 'Главный корабельный старшина'},
                {value: 'Прапорщик', text: 'Прапорщик'},
                {value: 'Мичман', text: 'Мичман'},
                {value: 'Старший прапорщик', text: 'Старший прапорщик'},
                {value: 'Старший мичман', text: 'Старший мичман'},
                {value: 'Лейтенант', text: 'Лейтенант'},
                {value: 'Старший лейтенант', text: 'Старший лейтенант'},
                {value: 'Капитан', text: 'Капитан'},
                {value: 'Капитан-лейтенант', text: 'Капитан-лейтенант'},
                {value: 'Майор', text: 'Майор'},
                {value: 'Капитан 3 ранга', text: 'Капитан 3 ранга'},
                {value: 'Подполковник', text: 'Подполковник'},
                {value: 'Капитан 2 ранга', text: 'Капитан 2 ранга'},
                {value: 'Полковник', text: 'Полковник'},
                {value: 'Капитан 1 ранга', text: 'Капитан 1 ранга'},
                {value: 'Генерал-майор', text: 'Генерал-майор'},
                {value: 'Генерал-лейтенант', text: 'Генерал-лейтенант'},
                {value: 'Прочее', text: 'Прочее'}
            ]
        });
        $('#status').editable({
            mode: "inline",
            value: 'on_the_face',
            source: [
                {value: 'on_the_face', text: 'На лицо'},
                {value: 'on_service', text: 'Наряд'},
                {value: 'mission', text: 'Командировка'},
                {value: 'boyp', text: 'База ОУП'},
                {value: 'holiday', text: 'Отпуск'},
                {value: 'patient', text: 'Мед.учр.'},
                {value: 'osvobojdenie_po_bolezni', text: 'Освоб. по болезни'},
                {value: 'dismissal', text: 'Увольнение'},
                {value: 'lazaret', text: 'Лазарет'},
                {value: 'other', text: 'Прочее'}
            ]
        });
        $('#time').editable({
                format: 'dd.mm.yyyy',
                viewformat: 'dd.mm.yyyy',
                datepicker: {
                    weekStart: 1,
                    zIndex: 1000
                }
            });
    });

</script>