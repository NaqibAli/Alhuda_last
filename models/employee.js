$(document).ready(function() {

    check_user_link();


    load_employees();
    fill_emp_type();
    // fill_branches();
    fetch_boxes();

    var btn_action = "insert";
    var ModelPopup = $('#model');

    $("#table").on("click", "button.edit", function() {
        var employee_id = $(this).attr("employee_id");
        btn_action = "update";
        fetch_employees(employee_id);
        window.scroll(0, 0);
        $("#collapseExample").addClass("show");
    });



    $("#table").on("click", "button.delete", function() {
        var employee_id = $(this).attr("employee_id");



        swal({
                title: "Are you sure?",
                text: "You will delete Employee No: " + employee_id + " Permanently!",
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
                    swal("Deleted!", "Your Employee No: " + employee_id + " Permanently has been deleted.", "success");
                    delete_employees(employee_id);
                } else {
                    swal("Cancelled", "Your Employee No: " + employee_id + " is safe :)", "error");
                }
            });
    });






    $("#form").on("submit", function(e) {
        e.preventDefault();

        var form_data = new FormData($("#form")[0]);
        var file_data = $('#photo').prop('files')[0];

        form_data.append('photo', file_data);



        if (btn_action == "insert") {
            form_data.append('action', 'insert');
        } else {
            form_data.append('action', 'update');
        }





        $.ajax({
            method: "POST",
            url: "controllers/employee.php",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    if (btn_action == "update") {

                        ModelPopup.modal("hide");
                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form")[0].reset();
                        load_employees();
                        swal('Congratulations!', 'Employee Has been Updated Successfully', 'success');
                        show_toast('success', 'Emploeye Has been Updated Successfully');


                    } else {
                        btn_action = "insert";
                        window.scroll(0, 0);
                        $("#form")[0].reset();
                        load_employees();
                        show_toast('success', 'Employee Has been Saved Successfully');

                    }

                    $("#collapseExample").removeClass("show");
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





    function load_employees() {

        var data = {
            "action": "read",
            "id": "",
            "procedure": "employee_get",

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

                            if (index == 'Status') {
                                if (item['Status'] == 'InActive') {
                                    row += `<td> <span class="badge badge-pill badge-danger mr-1 mb-1 mt-1">` + item[index] + `   </span></td>`;

                                } else {
                                    row += `<td> <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">` + item[index] + `   </span></td>`;

                                }
                            } else
                                row += "<td>" + item[index] + "</td>";
                        }

                        row += `<td class='text-center'>                         <button class='btn btn-success btn-sm edit' title="Edit" employee_id='` + item['ID'] + `'>
                                    <i class='fa fa-wrench'></i>

                                   
                                </button>
                                <button class='btn btn-danger btn-sm delete' title="Delete" employee_id='` + item['ID'] + `'>
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
                    $("#table tbody").html("<tr><td colspan='4' class='text-center'>" + message + "</td></tr>");
                }

            },
            error: function(data) {

            }
        });

    }


    function delete_employees(employee_id) {

        $.ajax({
            method: "POST",
            url: "controllers/employee.php",
            data: { "action": "delete", "employee_id": employee_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    window.scroll(0, 0);
                    load_employees();
                    swal('Congratulations!', 'Employees Has Been Deleted Successfully', 'success');
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

    function fetch_employees(employee_id) {

        $.ajax({
            method: "POST",
            url: "controllers/employee.php",
            data: { "action": "fetch", "employee_id": employee_id },
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {

                    // var option = $('#addresses option[address_id="' + message['address'] + '"]');
                    // $("#address_id").val(option.attr('value'));
                    // var val = option.attr('address_id');
                    // $("#address_id").attr('address_id', val);
                    $("#address_id").val(message['address']);


                    var option = $('#emp_types option[emp_type_id="' + message['emp_type'] + '"]');
                    $("#emp_type_id").val(option.attr('value'));
                    var val = option.attr('emp_type_id');
                    $("#emp_type_id").attr('emp_type_id', val);


                    $("#employee_id").val(message['employee_id']);
                    $("#name").val(message['name']);
                    $("#tel").val(message['contact']);
                    $("#email").val(message['email']);
                    $("#gender").val(message['gender']);
                    $("#user_date").val(message['created_date']);
                    $("#status").val(message['status']);


                    $("#imgName").val(message['photo']);




                }

            },
            error: function(data) {

            }
        });

    }



    function fill_emp_type() {
        var data = {
            "action": "fill",
            "id": "",
            "procedure": "fill_emp_type",

        };

        $.ajax({
            method: "POST",
            url: "controllers/crud_operation.php",
            data: data,
            dataType: "JSON",
            async: false,
            success: function(data) {
                var jsonObj = data.message;
                var status = data.status;
                var strHTML = '';
                var column = '';
                if (status == true) {
                    $('#emp_types').html(strHTML);
                    jsonObj.forEach(function(item, i) {

                        strHTML += '<option emp_type_id="' + item['emp_type'] + '" value="' + item['emp_type'] + '"> ';
                        strHTML += '</option>';

                    });
                    $('#emp_types').append(strHTML);
                } else {
                    alert(jsonObj);
                }

            },
            error: function(data) {
                alert(data.Message);
            }
        });
    }

    function fetch_boxes() {
        var data = {
            "action": "fetch",
            "id": '',
            "procedure": "dashboard_counts",

        };

        $.ajax({
            method: "POST",
            url: "controllers/reports.php",
            data: data,
            dataType: "JSON",
            async: false,
            success: function(data) {
                var status = data.status;
                var item = data.message;

                if (status == true) {
                        $("#total_employee").html(item['all_e']);
                        $("#total_active_employee").html(item['active e']);
                        $("#total_inactive_employee").html(item['inactive_e']);
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
            msg: "<b>" + type + ":</b>" + message,
            type: type
        });
    }


});