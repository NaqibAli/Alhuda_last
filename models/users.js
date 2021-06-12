$(document).ready(function() {

    check_user_link();


    load_users();
    fill_employees();
    generate_user_id();

    var btn_action = "insert";
    var ModelPopup = $('#model');

    $("#table").on("click", "button.edit", function() {
        var user_id = $(this).attr("user_id");
        btn_action = "update";
        fetch_users(user_id);
        window.scroll(0, 0);
    });





    $("#table").on("click", "button.delete", function() {
        var user_id = $(this).attr("user_id");



        swal({
                title: "Are you sure?",
                text: "You will delete User No: " + user_id + " Permanently!",
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
                    swal("Deleted!", "Your User No: " + user_id + " Permanently has been deleted.", "success");
                    delete_users(user_id);
                } else {
                    swal("Cancelled", "Your User No: " + user_id + " is safe :)", "error");
                }
            });
    });


    $("#employee_id").change(function() {
        var opt = $('#employees option[value="' + $(this).val() + '"]');
        if (opt.length) {
            var value = opt.attr('employee_id');
            $("#employee_id").attr('employee_id', value);
        } else {
            $("#employee_id").val("");
            $("#employee_id").focus();
            return;
        }
    });

    $("#form").on("submit", function(e) {
        e.preventDefault();

        var user_id = $("#user_id").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var user_type = $("#user_type").val();
        var status = $("#status").val();
        var employee_id = $("#employee_id").attr('employee_id');
        var user_date = $("#user_date").val();


        var columns = [];



        if (btn_action == "insert") {

            columns.push(user_id);
            columns.push(username);
            columns.push(password);
            columns.push(user_type);
            columns.push(status);
            columns.push(employee_id);
            columns.push(user_date);

            var data = {
                "action": "insert_and_update",
                "type": "insert",
                "procedure": "users_sp",
                'columns': columns
            };

        } else {
            columns.push(user_id);
            columns.push(username);
            columns.push(password);
            columns.push(user_type);
            columns.push(status);
            columns.push(employee_id);
            columns.push(user_date);
            var data = {
                "action": "insert_and_update",
                "type": "update",
                "procedure": "users_sp",
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

                        ModelPopup.modal("hide");
                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form")[0].reset();
                        load_users();
                        swal('Congratulations!', 'Users Has been Updated Successfully', 'success');
                        show_toast('success', 'Users Has been Updated Successfully');
                        generate_user_id();
                        $('#password').prop('required', true);
                        $('#employee_id').prop('disabled', false);
                    } else {
                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form")[0].reset();
                        load_users();
                        show_toast('success', 'Users Has been Saved Successfully');
                        generate_user_id();
                    }


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



    function load_users() {

        var data = {
            "action": "read",
            "id": "",
            "procedure": "users_get",

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
                    $('#table').dataTable().fnClearTable();
                    $('#table').dataTable().fnDestroy();

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

                        row += `<td class='text-center'>                         <button class='btn btn-success btn-sm edit' title="Edit" user_id='` + item['ID'] + `'>
                                    <i class='fa fa-wrench'></i>

                                   
                                </button>
                                <button class='btn btn-danger btn-sm delete' title="Delete" user_id='` + item['ID'] + `'>
                                    <i class='fa fa-trash'></i>
                                </button>
                                </td>`;

                        row += "</tr>";

                    });

                    $("#table thead").html(column);
                    $("#table tbody").html(row);
                    $('#table').DataTable();
                    // $("#table_paginate").addClass("pull-right");

                } else {
                    $("#table tbody").html("<tr><td colspan='8' class='text-center'>" + message + "</td></tr>");
                }

            },
            error: function(data) {

            }
        });

    }


    function delete_users(user_id) {

        $.ajax({
            method: "POST",
            url: "controllers/users.php",
            data: { "action": "delete", "user_id": user_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    window.scroll(0, 0);
                    load_users();
                    swal('Congratulations!', 'Users Has Been Deleted Successfully', 'success');
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

    function generate_user_id() {
        var data = {
            "action": "generate",
            "max": 9999,
            "default": "USR0001",
            "abbr": "USR",
            "start": 3,
            "procedure": "user_fill",

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



                if (status == true) {



                    $("#user_id").val(message);




                }

            },
            error: function(data) {

            }
        });

    }

    function fill_employees() {
        var data = {
            "action": "fill",
            "id":"",
            "procedure": "employee_fill",

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
                    $('#employees').html(strHTML);
                    strHTML += '<option employee_id="" value="Default User"> ';
                    strHTML += '</option>';
                    jsonObj.forEach(function(item, i) {

                        strHTML += '<option employee_id="' + item['employee_id'] + '" value="' + item['name'] + ' - ' + item['title'] + ' - ' + item['phone'] + '"> ';
                        strHTML += '</option>';

                    });
                    $('#employees').append(strHTML);
                } else {
                    alert(jsonObj);
                }

            },
            error: function(data) {
                alert(data.Message);
            }
        });
    }

    function fetch_users(user_id) {



        $.ajax({
            method: "POST",
            url: "controllers/users.php",
            data: { "action": "fetch", "user_id": user_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    if (message['employee_id'] != null) {
                        var option = $('#employees option[employee_id="' + message['employee_id'] + '"]');
                        $("#employee_id").val(option.attr('value'));
                        var val = option.attr('employee_id');
                        $("#employee_id").attr('employee_id', val);
                    } else {
                        $("#employee_id").val('Default User');
                        $("#employee_id").attr('employee_id', '');
                    }

                    $("#user_id").val(message['user_id']);
                    $("#username").val(message['username']);

                    $("#user_type").val(message['user_type']);
                    $("#status").val(message['status']);
                    $("#user_date").val(message['created_date']);

                    ModelPopup.modal('show');
                    $('#password').prop('required', false);
                    $('#employee_id').prop('disabled', true);
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
        $('#password').prop('required', true);
        $('#employee_id').prop('disabled', false);
    });



    function show_toast(type, message) {
        notif({
            msg: "<b>" + type + ":</b>" + message,
            type: type
        });
    }


});