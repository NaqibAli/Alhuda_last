$(document).ready(function () {
  if (window.location.href.indexOf("?" + "msg" + "=") != -1) {
    var param;
    var parameters = window.location.href
      .slice(window.location.href.indexOf("?") + 1)
      .split("&");
    param = parameters[0].split("=");
    if (param[1] != null) {
      $("#main_alert").addClass("alert-danger");
      $("#main_alert").removeClass("alert-success");
      $("#main_alert").css("display", "block");
      $("#main_alert .alert-message").html(
        "Session Expired, You don't have a session"
      );
    }
  }

  $("#form_signin").on("submit", function (e) {
    e.preventDefault();

    var username = $("#username").val();
    var password = $("#password").val();

    var data = {
      action: "login",

      username: username,
      password: password,
    };

    $.ajax({
      method: "POST",
      url: "controllers/login.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;

        if (status === true) {
            console.log(message[0])
            console.log(message[0]["jst_user_type"]);


          if (message[0]["password_status"] == "No")
            window.location = "password_change";
          
          if (message[0]["jst_user_type"] == "User")
          {
            localStorage.setItem("userType",message[0]["jst_user_type"]);
            
             window.location = "default_dashboard";
          }
           
          else window.location = "dashboard";

        } else {
          $("#main_alert").addClass("alert-danger");
          $("#main_alert").removeClass("alert-success");
          $("#main_alert").css("display", "block");
          $("#main_alert .alert-message").html(message);
          $("#password").val("");
        }
      },
      error: function (data) {},
    });
  });

  $("#form_change_password").on("submit", function (e) {
    e.preventDefault();

    var new_password = $("#new_password").val();
    var confirm_password = $("#confirm_password").val();

    var data = {
      action: "change_password",

      new_password: new_password,
      confirm_password: confirm_password,
    };

    if (new_password != confirm_password) {
      alert("Password & Confirm Does Not Same");
      return;
    }

    if (new_password == confirm_password)
      $.ajax({
        method: "POST",
        url: "controllers/login.php",
        data: data,
        dataType: "JSON",
        async: true,
        success: function (data) {
          var status = data.status;
          var message = data.message;

          if (status == true) {
            window.location = "default_dashboard.php";
          } else {
            $("#main_alert").addClass("alert-danger");
            $("#main_alert").removeClass("alert-success");
            $("#main_alert").css("display", "block");
            $("#main_alert .alert-message").html(message);
            $("#password").val("");
          }
        },
        error: function (data) {},
      });
  });
});
