$(document).ready(function() {

    //check_user_link();


    fetch_settings();
    var btn_action = "insert";




    $("#form").on("submit", function(e) {
        e.preventDefault();


        var file_data = $('#logo_nature').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('logo_nature', file_data);

        var file_data = $('#logo_white').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('logo_white', file_data);

        var file_data = $('#fav_icon_nature').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('fav_icon_nature', file_data);

        var file_data = $('#fav_icon_white').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('fav_icon_white', file_data);


        var file_data = $('#background1').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('background1', file_data);

        var file_data = $('#background2').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('background2', file_data);

        var file_data = $('#background3').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('background3', file_data);

        var file_data = $('#background4').prop('files')[0];
        var form_data = new FormData($("#form")[0]);
        form_data.append('background4', file_data);




        form_data.append('action', 'update_Settings');


        $.ajax({
            method: "POST",
            url: "controllers/user_authority.php",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {



                    window.scroll(0, 0);
                    $("#form")[0].reset();
                    fetch_settings();
                    swal('Congratulations!', 'Settings Has been Updated Successfully', 'success');
                    show_toast('success', 'Settings Has been Updated Successfully');
                    location.reload();

                } else {
                    show_toast('error', message);
                    window.scroll(0, 0);
                    showToast();

                }
            },
            error: function(data) {

            }
        });

    });




    function fetch_settings() {



        $.ajax({
            method: "POST",
            url: "controllers/login.php",
            data: { "action": "fetch_settings" },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var status = data.status;
                var message = data.message;

                if (status == true) {
                    $("#sms_status").val(message['sms']);

                    $("#setting_id").val(message['setting_id']);

                    $("#title").val(message['title']);
                    $("#head").val(message['head_name']);
                    $("#body").val(message['body']);
                    $("#footer").val(message['footer']);

                    $("#logo_nature_h").val(message['logo']);
                    $("#logo_white_h").val(message['logo_white']);
                    $("#fav_icon_nature_h").val(message['icon']);
                    $("#fav_icon_white_h").val(message['icon_white']);

                    $("#background1").val(message['back_img_1']);
                    $("#background2").val(message['back_img_2']);
                    $("#background3").val(message['back_img_3']);
                    $("#background4").val(message['back_img_4']);



                }

            },
            error: function(data) {

            }
        });

    }





    function show_toast(type, message) {
        notif({
            msg: "<b>" + type + ":</b>" + message,
            type: type
        });
    }


});