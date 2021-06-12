</div>
<!-- main-content closed -->



<!-- Footer opened -->
<div class="main-footer ht-40" style="position: relative;bottom: 0;width: 100%;">
    <div class="container-fluid pd-t-0-f ht-100p">
        <span id="footer"></span>
    </div>
</div>
<!-- Footer closed -->

<!--- Back-to-top --->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<!--- JQuery min js --->
<script src="assets/plugins/jquery/jquery.min.js"></script>

<!--- Bootstrap Bundle js --->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--- Ionicons js --->
<script src="assets/plugins/ionicons/ionicons.js"></script>

<!--- Moment js --->
<script src="assets/plugins/moment/moment.js"></script>





<!--- JQuery sparkline js --->
<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!--- P-scroll js --->
 <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!--- Eva-icons js --->
<script src="assets/js/eva-icons.min.js"></script>

<!--- Rating js --->
<script src="assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="assets/plugins/rating/jquery.barrating.js"></script>
<!--- Internal Notify js --->
<script src="assets/plugins/notify/js/notifIt.js"></script>
<!--- Custom Scroll bar Js --->
<script src="assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
load_menu();

function load_menu() {
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
            var strHTML = '';
            var menu = '';

            if (status) {

                strHTML += `<li class="slide">`;
                message.forEach(function(item, i) {

                    if (menu != item['menu']) {
                        if (menu != '') {
                            strHTML += `</ul></li><li class="slide">`;
                        }
                         if (item['menu']=='Collaboration ') {
                            strHTML +=
                            `<a  class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fa ` +
                            item['icon'] + `" ></i>
						
						<span class="side-menu__label"
                        
                        menu_id='` + item['menu'] + `'> ` + item['menu'] + ` </span> <span class="badge badge-pink side-badge" id="notif_count">9</span><i class="angle fe fe-chevron-down"></i></a>
                   
                            <ul class="slide-menu">                            
                        `;

                        } else {
                            strHTML +=
                            `<a  class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fa ` +
                            item['icon'] + `" ></i>
						
						<span class="side-menu__label"
                        
                        menu_id='` + item['menu'] + `'> ` + item['menu'] + ` </span> <i class="angle fe fe-chevron-down"></i></a>
                   
                            <ul class="slide-menu">                            
                        `;

                        }
                        menu = item['menu'];
                    }


                    strHTML += `

                    <li current_page="` + item['link'] + `" menu="` + item['menu'] + `" >
                    <a href="` + item['link'] + `" class="slide-item" id="` + item['menu'] + `"> <span>` + item[
                        'submenu'] + `</span></a></li>

                    `;



                });
                strHTML += '</li>';
                $(".side-menu").html(strHTML);


            }
            // var url = window.location.href.split('/');
            // var name = url[url.length - 1];
            // var menu = $('ul li[current_page="' + name + '"]').attr('menu');
            // // alert(menu);
            // $('ul li[menu_id="' + menu + '"] a').addClass('subdrop');
            // $('ul li[menu_id="' + menu + '"] ul').css('display', 'block');


        },
        error: function(data) {

        }
    });

}
</script>
<!--- Sidebar js --->
<script src="assets/plugins/side-menu/sidemenu.js"></script>

<!--- Right-sidebar js --->
<!-- <script src="assets/plugins/sidebar/sidebar.js"></script>
<script src="assets/plugins/sidebar/sidebar-custom.js"></script> -->

<!--- Index js --->
<script src="assets/js/script.js"></script>

<!--- Custom js --->
<script src="assets/js/custom.js"></script>

<script>
setInterval(function() {
    var mode = $("body").attr("mode");
    check_user_session(mode);
},10000);
function show_notif(type, message, emp, date) {
    notif({
        msg: `<b> <span class="badge badge-pill badge-success mr-1 mb-1 mt-1">` + emp + ` - ` + date +
            `  </span>  </b><br>` +
            message,
        type: type
    });
}
function check_user_session(mode) {
    $.ajax({
        method: "POST",
        url: "controllers/login.php",
        data: {
            'action': 'check_user_session',
            "mode": mode
        },
        dataType: "JSON",
        async: false,
        success: function(data) {
            var status = data.status;

            if (status == false) {
                // window.location = "login.php?msg= You don't have a session";
            }
        },
        error: function(data) {

        }
    });
}



setTimeout(function(){ check_user_link(); }, 1000);

function check_user_link() {
    var url = window.location.href.split('/');
    var page = url[url.length - 1];
    $.ajax({
        method: "POST",
        url: "controllers/users.php",
        data: {
            'action': 'check_user_url',
            'page': page
        },
        dataType: "JSON",
        async: false,
        success: function(data) {
            var status = data.status;

            if (status == false) {
                window.location = "500";


            }
        },
        error: function(data) {

        }
    });
};

settings();

function settings() {

    $.ajax({
        method: "POST",
        url: "controllers/login.php",
        data: {
            "action": "fetch_settings"
        },
        dataType: "JSON",
        async: true,
        success: function(data) {
            var status = data.status;
            var message = data.message;

            if (status == true) {

                $("#head_d").html(message['head_name']);
                $("#footer").html(message['footer']);

                $("#logo_d").attr('src', 'uploads/images/system/' + message['logo']);
                $("#logo_white_d").attr('src', 'uploads/images/system/' + message['logo_white']);

                $("#favicon_d").attr('src', 'uploads/images/system/' + message['icon']);
                $("#fav_white_d").attr('src', 'uploads/images/system/' + message['icon_white']);



               



            }

        },
        error: function(data) {

        }
    });

}
</script>

<script>
$(document).ready(function() {

    // $(".subLink").on("click", function() {
    //     var page = $(this).attr("href");

    //     window.location = page;
    // })

    // location.hash = "Schedule Report"
});
</script>

<script>
var domain_hp = $(location).attr('host');
$("#form_change_user").on("submit", function(e) {
    e.preventDefault();
    var user_id_side = $("#user_id_side").val();
    var username_side = $("#username_side").val();
    var new_password = $("#new_password").val();


    $.ajax({
        method: "POST",
        url: "controllers/users.php",
        data: {
            "action": "change_user",
            "user_id_side": user_id_side,
            "username_side": username_side,
            "new_password": new_password
        },
        dataType: "JSON",
        async: true,
        success: function(data) {
            var status = data.status;
            var message = data.message;

            if (status) {

                var ModelPopup = $('#change_pass_modal');
                ModelPopup.modal('hide');
                $("#form_change_user")[0].reset();
                swal('Congratulations!', message, 'success');
                show_toast('success', message);
            } else {
                swal('Error!', message, 'error');
                show_toast('error', message);

            }
        },
        error: function(data) {

        }
    });

});

function show_toast(type, message) {
    notif({
        msg: "<b>" + type + ":</b>" + message,
        type: type
    });
}

$("#mode_dark").on("click", function(e) {
    e.preventDefault();
    $("body").attr("mode", 'dark-theme');
    $("body").addClass('dark-theme');

});

$("#mode_light").on("click", function(e) {
    e.preventDefault();
    $("body").attr("mode", '');
    $("body").removeClass('dark-theme');
});
</script>


</body>

</html>

<?php

$cookie_name = "mode";
$cookie_value = 'foot';
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>