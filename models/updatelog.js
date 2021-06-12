var dateformat = "all";
getUpdateLog();
fill_users();
get_all_members();

function getUpdateLog() {
  var user = $("#user_id").attr("user_id");
  var from = (dateformat == "all") ? "" : $("#from_date").val();
  var to = (dateformat == "all") ? "" : $("#to_date").val();
  var mid = $("#member_id").attr("member_id");

  var data = {
    action: "rpt_update_logs",
    mid: mid,
    from: from,
    to: to,
    user: user,
  };

  $.ajax({
    method: "POST",
    url: "controllers/reports.php",
    data: data,
    dataType: "JSON",
    async: true,
    success: function (data) {
      var status = data.status;
      var message = data.message;
      var column = "";
      var row = "";
      if (status == true) {
          console.log(message)
        $("#table").dataTable().fnClearTable();
        $("#table").dataTable().fnDestroy();
        message.forEach(function (item, i) {
          column = "<tr>";
          for (index in item) {
            if (!(index == "id")) {
              column += "<th>" + index + "</th>";
            }
          }
          column += "</tr>";

          row += "<tr>";

          for (index in item) {
            if (!(index == "id")) row += "<td>" + item[index] + "</td>";
          }

          row += "</tr>";
        });

        $("#table thead").html(column);
        $("#table tbody").html(row);
        $("#table").DataTable({ responsive: true });
      } else {
        $("#table tbody").html(
            "<tr><td colspan='7' class='text-center'>" + message + "</td></tr>"
          );
      }
    },
    error: function (data) {},
  });
}
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
$("#user_id").change(function () {
  var opt = $('#users option[value="' + $(this).val() + '"]');
  if (opt.length) {
    var value = opt.attr("user_id");
    $("#user_id").attr("user_id", value);
  } else {
    $("#user_id").val("");
    $("#user_id").attr("user_id", "");
    $("#user_id").focus();
    return;
  }
});

$("#form").on("submit", function (e) {
  e.preventDefault();
  getUpdateLog();
    $("#from_date").attr("disabled", "");
    $("#to_date").attr("disabled", "");

});

$("#date_type").on("change", function () {
  if ($(this).val() == "all") {
    dateformat = "all";
    $("#from_date").attr("disabled", "");
    $("#to_date").attr("disabled", "");
  } else {
    dateformat = "custom";
    $("#from_date").removeAttr("disabled");
    $("#to_date").removeAttr("disabled");
  }
});
$("#member_id").change(() => {
  var sel_opt = $("#members option[value='" + $("#member_id").val() + "']");
  $("#member_id").attr("member_id", sel_opt.attr("member_id"));
  if (! sel_opt.length) {
    $("#member_id").attr("member_id",'')
  }
});
function get_all_members() {
  var data = {
    action: "read",
    procedure: "get_Members",
    id: "",
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
      var opt = ``;
      if (status == true) {
        message.forEach((items, i) => {
          opt += `<option member_id=${items["ID"]} value="${items["ID"]} - ${items["Full Name"]}"> </option>`;
        });
        $("#members").html(opt);
      } else {
      }
    },
    error: function (data) {},
  });
}
