$("#form").on("submit", function (e) {
  e.preventDefault();
  var form_data = new FormData($("#form")[0]);
  var columns = [];
  var address = "";
  form_data.forEach((item, key) => {
    if (key == "street" || key == "postcode" || key == "village") {
      if (key == "village") {
        if (item != "") {
          address += item;
        }
        columns.push(address);
      } else {
        if (item != "") address += item + " # ";
      }
    } else columns.push(item);
  });

  var data = {};
  data = {
    type: "insert",
    procedure: "Member_sp",
    columns: columns,
  };

  if (!checkID($("#national_id")[0])) {
    $("#national_id").addClass("is-invalid");
    show_toast("error", "National ID Must be 11 Digits");
    return;
  } else {
    $("#national_id").removeClass("is-invalid");
  }

  $.ajax({
    method: "POST",
    url: "controllers/member_registration.php",
    data: data,
    dataType: "JSON",
    async: true,
    success: function (data) {
      var status = data.status;
      var message = data.message;
      if (status == true) {
        window.scroll(0, 0);
        $("#form")[0].reset();
        show_toast("success", "You Registered SuccessFuly");
        swal("SUCCESS", "You Registered SuccessFuly", "success");
      } else {
        swal("Error!", message, "error");
        show_toast("error", message);
        window.scroll(0, 0);
      }
    },
    error: function (data) {},
  });
});
function checkID(input) {
  if (input.value.length < 11 || input.value.length > 11) {
    return false;
  } else {
    return true;
  }
}
function show_toast(type, message) {
  notif({
    msg: "<b>" + type + ":</b> " + message,
    type: type,
  });
}
$(document).on("click", ".exit-fullscreen-button", function () {
  $("#logintoChange").modal("show");
});

$(document).on("click", ".fullscreen-button", function toggleFullScreen() {
  if (
    (document.fullScreenElement !== undefined &&
      document.fullScreenElement === null) ||
    (document.msFullscreenElement !== undefined &&
      document.msFullscreenElement === null) ||
    (document.mozFullScreen !== undefined && !document.mozFullScreen) ||
    (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)
  ) {
    if (document.documentElement.requestFullScreen) {
      document.documentElement.requestFullScreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullScreen) {
      document.documentElement.webkitRequestFullScreen(
        Element.ALLOW_KEYBOARD_INPUT
      );
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    }
    $("#full-screen").removeClass("fullscreen-button");
    $("#full-screen").addClass("exit-fullscreen-button");
  } else {
    // if (confirm("")) {
    // }
  }
});

$("#exit_form").on("submit", (e) => {
  e.preventDefault();
  $.ajax({
    method: "POST",
    url: "controllers/login.php",
    data: { action: "checkPassword", pass: $("#passcode").val() },
    dataType: "JSON",
    async: true,
    success: function (data) {
      var status = data.status;
      var message = data.message;
      if (status == true) {
        swal("Message", message, "success");
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
        $("#exit_form")[0].reset();
        $("#logintoChange").modal("hide");
        $("#full-screen").removeClass("exit-fullscreen-button");
        $("#full-screen").addClass("fullscreen-button");
      } else {
        swal("Message", message, "error");
      }
    },
    error: function (data) {},
  });
});

// if (document.addEventListener)
// {
//  document.addEventListener('fullscreenchange', exitHandler, false);
//  document.addEventListener('mozfullscreenchange', exitHandler, false);
//  document.addEventListener('MSFullscreenChange', exitHandler, false);
//  document.addEventListener('webkitfullscreenchange', exitHandler, false);
// }
// document.addEventListener('keydown',function(e){
// // console.log(e.key);
// if (e.key  === "Escape") {
//   alert("")
// }
// },false);
