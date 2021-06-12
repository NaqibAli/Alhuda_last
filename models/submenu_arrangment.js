$(document).ready(function() {

    check_user_link();


    load_submenus();
    load_sidebar();

    var btn_action = "insert";
    var ModelPopup = $('#model');










    $("#form").on("submit", function(e) {
        e.preventDefault();
        var columns = [];


        $("p[name='submenu[]']").each(function() {
            columns.push($(this).attr('row_id'));

        });



        var data = {
            "action": "update_submenus",
            'columns': columns
        };

        $.ajax({
            method: "POST",
            url: "controllers/submenus.php",
            data: data,
            dataType: "JSON",
            async: true,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {


                    window.scroll(0, 0);
                    $("#form")[0].reset();
                    load_submenus();
                    load_sidebar();
                    swal('Congratulations!', 'Sub Menus Has been Updated Successfully', 'success');
                    show_toast('success', 'Sub Menus Has been Updated Successfully');




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



    function load_submenus() {

        var data = {
            "action": "read",
            "id": "",
            "procedure": "dragable_submenu_get",

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

                    message.forEach(function(item, i) {

                        row += `<div class="card custom-card card-body card-draggable" style="color: white; background: rgb(0, 22, 105) !important;">
                            <p class="card-text" name='submenu[]'  row_id="` + item['ID'] + `">` + item['Name'] + ' - ' + item['Menu'] + `</p>
                        </div>
                       `

                    });


                    $("#menu_arragment").html(row);

                    // $("#table_paginate").addClass("pull-right");

                } else {
                    $("#table tbody").html("<tr><td colspan='4' class='text-center'>" + message + "</td></tr>");
                }

            },
            error: function(data) {

            }
        });

    }

    function load_sidebar() {

        $.ajax({
            method: "POST",
            url: "controllers/menus.php",
            data: {
                "action": "load_nav"
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var status = data.status;
                var message = data.message;
                var column = '';
                var row = '';
                var Category = '';

                if (status) {

                    message.forEach(function(item, i) {

                        column = "<tr>";

                        for (index in item) {
                            if (index != 'menu' && index != 'icon')
                                column += `<th style="width: 5%; background:#3E3C59 !important; color:#fff !important; font-size: large;" >` + index + `</th>`;
                        }
                        column += "</tr>";

                        if (Category != item['menu']) {
                            row += '<tr><th class="text-center " colspan="6" style="background: #fbd9df !important;color: #3e3c58 !important; ">' + item['menu'] + '</th></tr>';
                            Category = item['menu'];
                        } else


                            row += "<tr>";

                        for (index in item) {

                            if (index != 'menu' && index != 'icon') {
                                row += "<td>" + item[index] + "</td>";
                            }
                        }



                        row += "</tr>";

                    });

                    $("#table thead").html(column);
                    $("#table tbody").html(row);

                } else {
                    $("#table tbody").html("<tr><td colspan='4' class='text-center'>" + message + "</td></tr>");
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