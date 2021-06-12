$(document).ready(function () {
  check_user_link();
  fill_users();

  load_authorities();

  $(".copy_rolls").on("click", function () {
    var value = $(this).attr("copy");
    if (value === "") {
      $(this).attr("copy", "yes");
      $(this).attr("title", "Cancle");
      $(this).addClass("text-dark");
    } else {
      $(this).attr("copy", "");
      $(this).attr("title", "Copy Rolls");
      $(this).removeClass("text-dark");
    }
  });

  $(".rolls").on("change", "input[name='check_all']", function () {
    var value = $(this).val();
    if ($(this).is(":checked")) {
      $("#content_body input[type='checkbox']").prop("checked", true);
    } else {
      $("#content_body input[type='checkbox']").prop("checked", false);
    }
  });

  $("#content_body").on("change", "input[name='menu[]']", function () {
    var value = $(this).val();

    if ($(this).is(":checked")) {
      $("#content_body input[type='checkbox'][menu_id='" + value + "']").prop(
        "checked",
        true
      );
    } else {
      $("#content_body input[type='checkbox'][menu_id='" + value + "']").prop(
        "checked",
        false
      );
    }
  });

  $("#content_body").on("change", "input[name='module[]']", function () {
    var value = $(this).val();

    if ($(this).is(":checked")) {
      $("#content_body input[type='checkbox'][module='" + value + "']").prop(
        "checked",
        true
      );
    } else {
      $("#content_body input[type='checkbox'][module='" + value + "']").prop(
        "checked",
        false
      );
    }
  });

  $("#user_id").change(function () {
    var opt = $('#users option[value="' + $(this).val() + '"]');
    if (opt.length) {
      var value = opt.attr("user_id");

      fetch_permissions(value);
      $("#user_id").attr("user_id", value);
    } else {
      $("#user_id").val("");
      $("#user_id").focus();
      return;
    }
  });
  function fill_users() {
    var data = {
      action: "fill",
      id: "",
      procedure: "user_fill",
    };

    $.ajax({
      method: "POST",
      url: "controllers/crud_operation.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var message = data.message;
        var status = data.status;
        var strHTML = "";
        var column = "";
        if (status == true) {
          $("#users").html(strHTML);
          message.forEach(function (item, i) {
            strHTML +=
              '<option user_id="' +
              item["id"] +
              '" value="' +
              item["employee"] +
              " -  " +
              item["username"] +
              " -  " +
              item["type"] +
              '"> ';

            strHTML += "</option>";
          });
          $("#users").append(strHTML);
        } else {
          alert(message);
        }
      },
      error: function (data) {
        alert(data.Message);
      },
    });
  }

  $("#form").on("submit", function (e) {
    e.preventDefault();
    var user_id = $("#user_id").attr("user_id");
    var sub_menu = [];

    $("input[name='submenu[]']").each(function () {
      if ($(this).is(":checked")) {
        sub_menu.push($(this).val());
      }
    });

    if (sub_menu == 0) {
      sub_menu = 0;
    }

    var data = {
      action: "update",
      username: user_id,
      sub_menu: sub_menu,
    };

    $.ajax({
      method: "POST",
      url: "controllers/user_authority.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;

        if (status === true) {
          $("#form")[0].reset();
          $(".rolls.copy_rolls").attr("copy", "");
          $(".rolls.copy_rolls").attr("title", "Copy Rolls");
          $(".rolls.copy_rolls").removeClass("text-dark");
          swal(
            "Congratulations!",
            "Rolls Has been Updated Successfully",
            "success"
          );
          show_toast("success", "Rolls Has been Updated Successfully");
          load_authorities();
          window.scroll(0, 0);
        } else {
          show_toast("error", message);
          window.scroll(0, 0);
        }
      },
      error: function (data) {},
    });
  });

  function load_authorities() {
    $("#table tr").remove();

    var data = {
      action: "read",
      id: "",
      procedure: "user_menu_get",
    };

    $.ajax({
      method: "POST",
      url: "controllers/crud_operation.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var message = data.message;
        var status = data.status;
        var strHTML = "";
        var column = "";
        var category = "";
        var menu = "";
        var submenu = "";

        if (status == true) {
          // strHTML = '<div class="">';
          message.forEach(function (item, i) {
            //Print module if its not printed
            if (category != item["module"]) {
              strHTML += `</fieldset><fieldset class="col-md-2 m-3 pl-3 custom-checkbox" >`;
              strHTML +=
                `<legend style="font-weight:600;background-color: #0b8457;color: #fff;"><b><label class="custom-control custom-checkbox mt-2" for="` +
                item["module"] +
                `"><input type="checkbox" class="custom-control-input" id="` +
                item["module"] +
                `" name="module[]" module="` +
                item["module"] +
                `" value="` +
                item["module"] +
                `">
                            <span class="custom-control-label">` +
                item["module"] +
                `</span></label></b></legend>`;
              category = item["module"];
              strHTML += `<ul class="custom-control custom-checkbox" style="list-style-type:none">`;
            }

            //Print menu if its not printed
            // if (menu != item['menu']) {
            //     strHTML += `<tr class="custom-control custom-checkbox" style="font-weight:500;">`;
            //     strHTML += `<td>&nbsp; &nbsp; &nbsp; &nbsp;
            //                 <input type="checkbox" class="custom-control-input" id="` + item['menu_id'] + `" name="menu[]" menu_id="` + item['menu_id'] + `" module="` + item['module'] + `" sub_menu_id="` + item['submenu_id'] + `" value="` + item['menu_id'] + `">
            //                 <label class="custom-control-label" for="` + item['menu_id'] + `">` + item['menu'] + `</label></td>`;
            //     menu = item['menu'];
            //     strHTML += `</tr>`;
            // }

            //Print Submenu if its not printed
            // <label class="custom-control ">
            // 								<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
            // 								Option 1
            // 							</label>
            if (submenu != item["sub_menu"]) {
              strHTML +=
                `<li><label class="custom-control custom-checkbox" for="` +
                item["submenu_id"] +
                `"><input type="checkbox"  class="custom-control-input" id="` +
                item["submenu_id"] +
                `" name="submenu[]" menu_id="` +
                item["menu_id"] +
                `" module="` +
                item["module"] +
                `" sub_menu_id="` +
                item["submenu_id"] +
                `" value="` +
                item["submenu_id"] +
                `">
                                        <span class="custom-control-label">` +
                item["sub_menu"] +
                `</span></label></li>`;
              submenu = item["sub_menu"];
            }
          });
          // strHTML += '</div>';

          $("#content_body").html(strHTML);
          // $('#content_body').append(strHTML);
        } else {
        }
      },
      error: function (data) {
        alert(data.Message);
      },
    });
  }

  function fetch_permissions(user_id) {
    $.ajax({
      method: "POST",
      url: "controllers/user_authority.php",
      data: { action: "fetch", user_id: user_id },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;

        if (status == true) {
          if ($(".copy_rolls").attr("copy") == "")
            $("input[type='checkbox']").prop("checked", false);

          message.forEach(function (item, i) {
            $(
              "input[type='checkbox'][name='submenu[]'][value='" +
                item["submenu_id"] +
                "']"
            ).prop("checked", true);
          });
        }
      },
      error: function (data) {},
    });
  }

  function showToast() {
    let toast1 = $(".toast1");
    toast1.toast({
      delay: 5000,
      animation: true,
    });
    toast1.toast("show");
  }

  function SuccessToast($body) {
    $(".toast-header").removeClass("toast-error");
    $(".toast-body").removeClass("toast-error");
    $(".toast-header").addClass("toast-success");
    $(".toast-body").addClass("toast-success");
    $(".toast-body").html($body);

    let toast1 = $(".toast1");
    toast1.toast({
      delay: 10000,
      animation: true,
    });
    toast1.toast("show");
  }

  function ErrorToast($body) {
    $(".toast-header").removeClass("toast-success");
    $(".toast-body").removeClass("toast-success");
    $(".toast-header").addClass("toast-error");
    $(".toast-body").addClass("toast-error");
    $(".toast-body").html($body);

    let toast1 = $(".toast1");
    toast1.toast({
      delay: 10000,
      animation: true,
    });
    toast1.toast("show");
  }

  $(".panel-body").on("change", "input[name='check_all']", function () {
    var value = $(this).val();
    if ($(this).is(":checked")) {
      $("#content_body input[type='checkbox']").prop("checked", true);
    } else {
      $("#content_body input[type='checkbox']").prop("checked", false);
    }
  });
});
