fill_users();
load_members();

$("#user_id").change(function () {
    var opt = $('#users option[value="' + $(this).val() + '"]');
    if (opt.length) {
      var value = opt.attr("user_id");
      $("#user_id").attr("user_id", value);
    } else {
      $("#user_id").val("");
      $("#user_id").attr("user_id", '');
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

  function load_members() {
    var data = {
      action: "read",
      id: $("#user_id").attr("user_id") || '',
      procedure: "rpt_user_authoruty_sp",
    };

    $.ajax({
      method: "POST",
      url: "controllers/crud_operation.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        var column = "";
        var row = "";

        if (status) {
          $("#table").dataTable().fnClearTable();
          $("#table").dataTable().fnDestroy();

          message.forEach(function (item, i) {
            column = "<tr>";
            for (index in item) {
              if (!(index == "ID")) {
                column += "<th>" + index + "</th>";
              }
              
            }
            column += "</tr>";

            row += "<tr>";
            for (index in item) {
             if(!(index == "ID")) row += "<td>" + item[index] + "</td>";
            }
            

            row += "</tr>";
          });

          $("#table thead").html(column);
          $("#table tbody").html(row);
          $("#table").DataTable({responsive: true});
          // $("#table_paginate").addClass("pull-right");
        } else {
          $("#table tbody").html(
            "<tr><td colspan='4' class='text-center'>" + message + "</td></tr>"
          );
        }
      },
      error: function (data) {},
    });
  }

  $("#form").on("submit",(e)=>{
      e.preventDefault();
      load_members();
  })