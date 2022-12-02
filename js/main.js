'use strict';


// Модуль приложения
var app = (function($) {

    // Инициализируем нужные переменные
    var ajaxUrl = '/site/php/function.php',
        ui = {
            $categories: $('#categories'),
            $goods: $('#goods'),
            $mytable: $('#mytable')
        };

    function table(category){
        var table ="Здесь будет находиться расход следующего подразделения: <br /><br />" + category;
        
        return table;
    }
    
    
    // Инициализация дерева категорий с помощью jstree
    function _initTree(data) {
        if (getCookie('Admin_ID') == "90872944c69f7b73b50f29090db53d47")
            {
            console.log("Мяу");
            var category;
            ui.$categories.jstree({
                core: {
                    check_callback: true,
                    multiple: false,
                    data: data,
                    
                },
                
                plugins: [ "contextmenu", "dnd", "themes", "wholerow", "json-data"],
                contextmenu: {"items": customMenu, "select_node": true},
            }).bind('changed.jstree', function(e, data) {
                $("#goods").css('display','inline-block');
                localStorage.setItem('id_category', data.node.id);
                var params = {
                    id : data.node.id, 
                    text : data.text,
                };
                $("#unit").html(data.text);
                _choosedCategory(params);
                /* ui.$goods.html(_tableCategory(params)); */
                
                console.log('changed node: ', data);
                
            }).bind('move_node.jstree', function(e, data) {
                var params = {
                    id: +data.node.id,
                    old_parent: +data.old_parent,
                    new_parent: +data.parent,
                    old_position: +data.old_position,
                    new_position: +data.position
                };
                _moveCategory(params);
                console.log('move_node params', params);
            }).bind('create_node.jstree', function (e, data) {
                var params = {
                    ParentId : data.node.parent, 
                    position : data.position, 
                    text : data.node.text,
                    icon : data.node.icon
                };
                _createCategory(params);
                console.log(params);
                location.reload();
                
            }).bind('rename_node.jstree', function (e, data) {
                var params = {
                    Id : data.node.id, 
                    text : data.text,
                };
                _renameCategory(params);
                console.log(params);
            }).bind('delete_node.jstree', function (e, data) {
                var params = {
                    Id : data.node.id
                };
                _deleteCategory(params);
            }).bind('loaded.jstree', function(e, data) {
                $('#categories').jstree('select_node', localStorage.getItem('id_category'))
            }).bind('loaded.jstree', function(e, data) {
                $('#categories').jstree('open_node', localStorage.getItem('id_category'))
            });
            }
        else {
            console.log("Мяу Мяу" + getCookie('Admin_ID'));
            var category;
            ui.$categories.jstree({
                core: {
                    check_callback: true,
                    multiple: false,
                    data: data,
                    
                },
                
                plugins: [ "dnd", "themes", "wholerow", "json-data"],
                contextmenu: {"items": customMenu, "select_node": true},
            }).bind('changed.jstree', function(e, data) {
                $("#goods").css('display','inline-block');
                localStorage.setItem('id_category', data.node.id);
                var params = {
                    id : data.node.id, 
                    text : data.text,
                };
                $("#unit").html(data.text);
                _choosedCategory(params);
                console.log('changed node: ', data);
                
            }).bind('loaded.jstree', function(e, data) {
                $('#categories').jstree('select_node', localStorage.getItem('id_category'))
            }).bind('loaded.jstree', function(e, data) {
                $('#categories').jstree('open_node', localStorage.getItem('id_category'))
            });
        }



    }

    // Перемещение категории
    function _moveCategory(params) {
        var data = $.extend(params, {
            action: 'move_category'
        });

        $.ajax({
            url: ajaxUrl,
            data: data,
            dataType: 'json',
            success: function(resp) {
                if (resp.code === 'success') {
                    console.log('category moved');
                } else {
                    console.error('Ошибка получения данных с сервера: ', resp.message);
                }
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
    }

    function _choosedCategory(params) {
        var data = $.extend(params, {
            action: 'choosed_category'
        });

        $.ajax({
            url: "/site/php/table.php",
            data: data,
            method: 'GET',
            dataType: 'html',
            success: function(resp) {
                    //console.log(resp);
                    $('#goods').html(resp);
                    
                
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
        $.ajax({
            url: "/site/php/buttons.php",
            data: data,
            method: 'GET',
            dataType: 'html',
            success: function(resp) {
                    //console.log(resp);
                    $('#buttons').html(resp);
                    
                
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
    }


    function _createCategory(params) {
        var data = $.extend(params, {
            action: 'create_category'
        });

        $.ajax({
            url: ajaxUrl,
            data: data,
            dataType: 'json',
            success: function(resp) {
                if (resp.code === 'success') {
                    console.log('category created');
                } else {
                    console.error('Ошибка получения данных с сервера: ', resp.message);
                }
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
    }

    function _tableCategory(params) {
        console.log('changed node: ', params);
        var data = $.extend(params, {
            action: 'table_category'
        });

        
        }
    

    function _renameCategory(params) {
        var data = $.extend(params, {
            action: 'rename_category'
        });

        $.ajax({
            url: ajaxUrl,
            data: data,
            dataType: 'json',
            success: function(resp) {
                if (resp.code === 'success') {
                    console.log(data);
                    console.log('category renamed');
                } else {
                    console.error('Ошибка получения данных с сервера: ', resp.message);
                }
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
    }

    function _deleteCategory(params) {
        var data = $.extend(params, {
            action: 'delete_category'
        });

        $.ajax({
            url: ajaxUrl,
            data: data,
            dataType: 'json',
            success: function(resp) {
                if (resp.code === 'success') {
                    console.log('category deleted');
                } else {
                    console.error('Ошибка получения данных с сервера: ', resp.message);
                }
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
    }

    // Загрузка категорий с сервера
    function _loadData() {
        var params = {
            action: 'get_categories'
        };
       
        $.ajax({
            url: ajaxUrl,
            method: 'GET',
            data: params,
            dataType: 'json',
            success: function(resp) {
                // Инициализируем дерево категорий
                
                if (resp.code === 'success') {
                    _initTree(resp.result);
                } else {
                    console.error('Ошибка получения данных с сервера: ', resp.message);
                }
            },
            error: function(error) {
                console.error('Ошибка: ', error);
            }
        });
    }
    
    function customMenu(node) {
        // The default set of all items
        var tree = ui.$categories.jstree(true);
        
        var items = {
            "Create": {
                "separator_before": false,
                "separator_after": false,
                "label": "Создать структурное подразделение",
                "action": function (obj) {
                    node = tree.create_node(node, { text: 'Новое структурное подразделение', type: 'default', icon: 'glyphicon glyphicon-th-list' });
                    
                }
            },

            "Create_unit": {
                "separator_before": true,
                "separator_after": true,
                "label": "Создать подразделение",
                "action": function (obj) {
                    node = tree.create_node(node, { text: 'Новое подразделение', type: 'default', icon: 'glyphicon glyphicon-user'});
                    
                }
            },

            "Rename": {
                "separator_before": false,
                "separator_after": false,
                "label": "Переименовать",
                "action": function (obj) {
                    tree.edit(node);                                    
                }
            },
            "Remove": {
                "separator_before": false,
                "separator_after": false,
                "label": "Удалить",
                "action": function (obj) {
                    tree.delete_node(node);
                }
            }
        };
    
        if ($(node).hasClass("folder")) {
            // Delete the "delete" menu item
            delete items.deleteItem;
        }
    
        return items;
    }

    // Инициализация приложения
    function init() {
        _loadData();
    }
    
    // Экспортируем наружу
    return {
        init: init
    }    

})(jQuery);

jQuery(document).ready(app.init);

jQuery.browser = {};
   (function () {
       jQuery.browser.msie = false;
       jQuery.browser.version = 0;
       if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
           jQuery.browser.msie = true;
           jQuery.browser.version = RegExp.$1;
       }
   })();

