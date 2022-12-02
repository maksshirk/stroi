





document.querySelector("#button-refresh").onclick = function(){
    var btn = $(this);
    btn = btn.val();
    var ui = {
            $categories: $('#categories'),
            $goods: $('#goods'),
            $mytable: $('#mytable')
        };
    var axa = ui.$categories.jstree(true).get_json(btn, { flat: true });
            //console.log(JSON.stringify(axa));
    let all_categories = $.ajax({
            url: "php/get_all.php",
            method: 'POST',
            data: {
                "name": btn,
                "json_db": JSON.stringify(axa)
            },
            async: false,
            dataType: 'json',
            success: function(resp) {
                // Инициализируем дерево категорий
                return resp;
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
    console.log("all_categories:");
    all_categories = all_categories.responseJSON;
    all_categories = JSON.parse(all_categories);
    for (key in all_categories) {
        if (arrayHasOwnIndex(all_categories, key)) {
            console.log(all_categories[key]["id"]);
            var baxa = ui.$categories.jstree(true).get_json(all_categories[key]["id"], { flat: true });
            $.ajax({     
                url: "php/refresh.php",
                method: 'POST',
                data: {
                    "name": all_categories[key]["id"],
                    "json_db": JSON.stringify(baxa)
                  },
                dataType: 'json',
                async: false,
                success: function(resp) {
                    // Инициализируем дерево категорий
                    
                    if (resp.code === 'success') {
                        console.log("Все ок");
                        
                    } else {
                        console.error('Ошибка получения данных с сервера: ', resp.message);
                    }
                },
                error: function(error) {
                    console.error('Ошибка: ', error);
                }
            });     
        }
    }
    
    location.reload();
}

function arrayHasOwnIndex(array, key) {
    return array.hasOwnProperty(key) && /^0$|^[1-9]\d*$/.test(key) && key <= 4294967294;
}