$(document).ready(function() {

    check_user_link();
    load_menus();
    load_sub_menus();
    fill_menus();
    var btn_action = "insert";


    $("#table_menu").on("click", "button.edit", function() {
        var menu_id = $(this).attr("menu_id");
        btn_action = "update";
        fetch_menus(menu_id);
        window.scroll(0, 0);
        $("#collapse_menu").addClass("show");
    });

    $("#table_submenu").on("click", "button.edit", function() {
        var submenu_id = $(this).attr("submenu_id");
        btn_action = "update";
        fetch_submenus(submenu_id);
        window.scroll(0, 0);
        $("#collapse_submenu").addClass("show");
    });


    $("#menus_id").change(function() {
        var opt = $('#menus option[value="' + $(this).val() + '"]');
        if (opt.length) {
            var value = opt.attr('menus_id');

            $("#menus_id").attr('menus_id', value);
        } else {
            $("#menus_id").val("");
            $("#menus_id").focus();
            return;
        }
    });

    $("#table_menu").on("click", "button.delete", function() {
        var menu_id = $(this).attr("menu_id");



        swal({
                title: "Are you sure?",
                text: "You will delete Menu No: " + menu_id + " Permanently!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-duccess",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel pls!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your Menu No: " + menu_id + " Permanently has been deleted.", "success");
                    delete_menu(menu_id);
                } else {
                    swal("Cancelled", "Your Menu No: " + menu_id + " is safe :)", "error");
                }
            });
    });

    $("#table_submenu").on("click", "button.delete", function() {
        var submenu_id = $(this).attr("submenu_id");



        swal({
                title: "Are you sure?",
                text: "You will delete Submenu No: " + submenu_id + " Permanently!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-duccess",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel pls!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your Submenu No: " + submenu_id + " Permanently has been deleted.", "success");
                    delete_submenu(submenu_id);
                } else {
                    swal("Cancelled", "Your Submenu No: " + submenu_id + " is safe :)", "error");
                }
            });
    });
    $("#form_menu").on("submit", function(e) {
        e.preventDefault();
        var menu_id = $("#menu_id").val();
        var name = $("#name").val();
        var module = $("#module").val();
        var icon = $("#icon").val();

        var columns = [];



        if (btn_action == "insert") {

            columns.push('');
            columns.push(name)
            columns.push(module)
            columns.push(icon);

            var data = {
                "action": "insert_and_update",
                "type": "insert",
                "procedure": "menu_sp",
                'columns': columns
            };

        } else {
            columns.push(menu_id);
            columns.push(name)
            columns.push(module)
            columns.push(icon);
            var data = {
                "action": "insert_and_update",
                "type": "update",
                "procedure": "menu_sp",
                'columns': columns
            };
        }



        $.ajax({
            method: "POST",
            url: "controllers/crud_operation.php",
            data: data,
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    if (btn_action == "update") {

                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form_menu")[0].reset();
                        load_menus();
                        swal('Congratulations!', 'Menus Has been Updated Successfully', 'success');
                        show_toast('success', 'Menus Has been Updated Successfully');


                    } else {
                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form_menu")[0].reset();
                        load_menus();
                        show_toast('success', 'Menus Has been Saved Successfully');

                    }

                    $("#collapse_menu").removeClass("show");
                    fill_menus();
                } else {
                    swal('Error!', message, 'error');
                    show_toast('error', message)
                    window.scroll(0, 0);


                }
            },
            error: function(data) {

            }
        });

    });

    $("#form_submenu").on("submit", function(e) {
        e.preventDefault();
        var submenu_id = $("#submenu_id").val();
        var name = $("#menu_name").val();
        var link = $("#link").val();
        var menu_id = $("#menus_id").attr('menus_id');
        var columns = [];



        if (btn_action == "insert") {

            columns.push('');
            columns.push(name);
            columns.push(menu_id);
            columns.push(link);

            var data = {
                "action": "insert_and_update",
                "type": "insert",
                "procedure": "submenu_sp",
                'columns': columns
            };

        } else {
            columns.push(submenu_id);
            columns.push(name)
            columns.push(menu_id);
            columns.push(link)
            var data = {
                "action": "insert_and_update",
                "type": "update",
                "procedure": "submenu_sp",
                'columns': columns
            };
        }



        $.ajax({
            method: "POST",
            url: "controllers/crud_operation.php",
            data: data,
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    if (btn_action == "update") {


                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form_submenu")[0].reset();
                        load_sub_menus();
                        swal('Congratulations!', 'Sub Menus Has been Updated Successfully', 'success');
                        show_toast('success', 'Sub Menus Has been Updated Successfully');


                    } else {
                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form_submenu")[0].reset();
                        load_sub_menus();
                        show_toast('success', 'Sub Menus Has been Saved Successfully');

                    }
                    $("#collapse_submenu").removeClass("show");

                } else {
                    swal('Error!', message, 'error');
                    show_toast('error', message)
                    window.scroll(0, 0);


                }
            },
            error: function(data) {

            }
        });

    });

    function fill_menus() {
        var data = {
            "action": "fill",
            "id": "",
            "procedure": "menus_fill",

        };

        $.ajax({
            method: "POST",
            url: "controllers/crud_operation.php",
            data: data,
            dataType: "JSON",
            async: true,
            success: function(data) {
                var jsonObj = data.message;
                var status = data.status;
                var strHTML = '';
                var column = '';
                if (status == true) {
                    $('#menus').html(strHTML);
                    jsonObj.forEach(function(item, i) {

                        strHTML += '<option menu_id="' + item['id'] + '" value="' + item['name'] + '"> ';
                        strHTML += '</option>';

                    });
                    $('#menus').append(strHTML);
                } else {
                    alert(jsonObj);
                }

            },
            error: function(data) {
                alert(data.Message);
            }
        });
    }

    function load_menus() {

        var data = {
            "action": "read",
            "id": "",
            "procedure": "menu_get",

        };

        $.ajax({
            method: "POST",
            url: "controllers/crud_operation.php",
            data: data,
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;
                var column = '';
                var row = '';

                if (status) {
                    $('#table_menu').dataTable().fnClearTable();
                    $('#table_menu').dataTable().fnDestroy();

                    message.forEach(function(item, i) {

                        column = "<tr>";

                        for (index in item) {
                            column += "<th>" + index + "</th>";
                        }
                        column += "<th class='text-center'>" + 'Action' + "</th>"
                        column += "</tr>";



                        row += "<tr>";

                        for (index in item) {
                            row += "<td>" + item[index] + "</td>";
                        }

                        row += `<td class='text-center'>                         <button class='btn btn-success btn-sm edit' title="Edit" menu_id='` + item['ID'] + `'>
                                    <i class='fa fa-wrench'></i>

                                    
                                </button>
                                <button class='btn btn-danger btn-sm delete' title="Delete" menu_id='` + item['ID'] + `'>
                                    <i class='fa fa-trash'></i>
                                </button>
                                </td>`;

                        row += "</tr>";

                    });

                    $("#table_menu thead").html(column);
                    $("#table_menu tbody").html(row);
                    $('#table_menu').DataTable({
                        "order": [
                            [0, "desc"]
                        ]
                    });
                } else {
                    $("#table_menu tbody").html("<tr><td colspan='4' class='text-center'>" + message + "</td></tr>");
                }

            },
            error: function(data) {

            }
        });

    }

    function load_sub_menus() {

        var data = {
            "action": "read",
            "id": "",
            "procedure": "submenu_get",

        };

        $.ajax({
            method: "POST",
            url: "controllers/crud_operation.php",
            data: data,
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;
                var column = '';
                var row = '';

                if (status) {
                    $('#table_submenu').dataTable().fnClearTable();
                    $('#table_submenu').dataTable().fnDestroy();

                    message.forEach(function(item, i) {

                        column = "<tr>";

                        for (index in item) {
                            column += "<th>" + index + "</th>";
                        }
                        column += "<th class='text-center'>" + 'Action' + "</th>"
                        column += "</tr>";



                        row += "<tr>";

                        for (index in item) {
                            row += "<td>" + item[index] + "</td>";
                        }

                        row += `<td class='text-center'>                         <button class='btn btn-success btn-sm edit' title="Edit" submenu_id='` + item['ID'] + `'>
                                    <i class='fa fa-wrench'></i>

                                   
                                </button>
                                <button class='btn btn-danger btn-sm delete' title="Delete" submenu_id='` + item['ID'] + `'>
                                    <i class='fa fa-trash'></i>
                                </button>
                                </td>`;

                        row += "</tr>";

                    });

                    $("#table_submenu thead").html(column);
                    $("#table_submenu tbody").html(row);
                    $('#table_submenu').DataTable({
                        "order": [
                            [0, "desc"]
                        ]
                    });
                    // $("#table_paginate").addClass("pull-right");

                } else {
                    $("#table_submenu tbody").html("<tr><td colspan='4' class='text-center'>" + message + "</td></tr>");
                }

            },
            error: function(data) {

            }
        });

    }

    function delete_menu(menu_id) {

        $.ajax({
            method: "POST",
            url: "controllers/menus.php",
            data: { "action": "delete", "menu_id": menu_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    window.scroll(0, 0);
                    load_menus();
                    swal('Congratulations!', 'Menus Has Been Deleted Successfully', 'success');
                } else {

                    window.scroll(0, 0);
                    ModelPopup.modal('hide');
                    swal('Error!', message, 'error');
                }

            },
            error: function(data) {

            }
        });

    }

    function fetch_menus(menu_id) {



        $.ajax({
            method: "POST",
            url: "controllers/menus.php",
            data: { "action": "fetch", "menu_id": menu_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    $("#menu_id").val(message['menu_id']);
                    $("#name").val(message['name']);
                    $("#module").val(message['module']);
                    $("#icon").val(message['icon']);


                    ModelPopup.modal('show');

                }

            },
            error: function(data) {

            }
        });

    }


    function delete_submenu(submenu_id) {

        $.ajax({
            method: "POST",
            url: "controllers/submenus.php",
            data: { "action": "delete", "submenu_id": submenu_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    window.scroll(0, 0);
                    load_sub_menus();
                    swal('Congratulations!', 'Sub Menu Has Been Deleted Successfully', 'success');
                } else {

                    window.scroll(0, 0);
                    ModelPopup.modal('hide');
                    swal('Error!', message, 'error');
                }

            },
            error: function(data) {

            }
        });

    }



    function fill_menus() {
        var data = {
            "action": "fill",
            "id": "",
            "procedure": "menus_fill",

        };

        $.ajax({
            method: "POST",
            url: "controllers/crud_operation.php",
            data: data,
            dataType: "JSON",
            async: true,
            success: function(data) {
                var jsonObj = data.message;
                var status = data.status;
                var strHTML = '';
                var column = '';
                if (status == true) {
                    $('#menus').html(strHTML);
                    jsonObj.forEach(function(item, i) {

                        strHTML += '<option menus_id="' + item['id'] + '" value="' + item['name'] + '"> ';
                        strHTML += '</option>';

                    });
                    $('#menus').append(strHTML);
                } else {
                    alert(jsonObj);
                }

            },
            error: function(data) {
                alert(data.Message);
            }
        });
    }

    function fetch_submenus(submenu_id) {



        $.ajax({
            method: "POST",
            url: "controllers/submenus.php",
            data: { "action": "fetch", "submenu_id": submenu_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    var option = $('#menus option[menus_id="' + message['menu_id'] + '"]');
                    $("#menus_id").val(option.attr('value'));
                    var val = option.attr('menus_id');
                    $("#menus_id").attr('menus_id', val);
                    $("#submenu_id").val(message['submenu_id']);
                    $("#menu_name").val(message['name']);
                    $("#link").val(message['link']);


                    ModelPopup.modal('show');

                }

            },
            error: function(data) {

            }
        });

    }


    $("#btn_modle").on("click", function() {

        $("#form")[0].reset();
        ModelPopup.modal('show');
        btn_action = "insert";
    });


    function show_toast(type, message) {
        notif({
            msg: "<b>" + type + ":</b> " + message,
            type: type
        });
    }


});