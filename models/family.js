$(document).ready(function () {
  check_user_link();
  load_families();
  load_members();
  get_all_family();
  // fill_employees();

  var btn_action = "insert";
  var ModelPopup = $("#model");
  var AddMemberPopup = $("#addmember");

  $("#table").on("click", "button.edit", function () {
    var family_id = $(this).attr("family_id");
    btn_action = "update";
    $("#tbl-m1").addClass("d-none");
    fetch_family(family_id);
    window.scroll(0, 0);
  });
  $("#table").on("click", "button.add_m", function () {
    var family_id = $(this).attr("family_id");
    AddMemberPopup.modal("show");
    $("#m_family_ids").attr("m_family_id", family_id);
    var tr = $(this).parent().parent();
    var fname = tr.children().eq(1).text();
    $("#m_family_ids").val(fname);
    window.scroll(0, 0);
  });
  $("#Addmemberform").on("click", "input#check_all_1", function () {
    if ($(this).is(":checked")) {
      $("#Addmemberform input[type='checkbox']").prop("checked", true);
    } else {
      $("#Addmemberform input[type='checkbox']").prop("checked", false);
    }
  });

  $("#btn_addMember").on("click", () => {
    var ids = $("input[name='member_ids']");
    var selected = [];
    // for(const member_id in ids){
    //     console.log(ids[member_id].value)
    // }
    for (let element = 0; element < ids.length; element++) {
      if (ids[element].checked) {
        selected.push(ids[element].value);
      }
    }
    var data = {
      action: "test",
      family_id: $("#family_ids").val(),
      ids: selected,
      procedure: "getM",
    };
    $.ajax({
      method: "POST",
      url: "controllers/family.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
        } else {
        }
      },
      error: function (data) {},
    });
  });

  $("#table").on("click", "button.delete", function () {
    var family_id = $(this).attr("family_id");

    swal(
      {
        title: "Are you sure?",
        text: "You will delete Family No: " + family_id + " Permanently!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-duccess",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          swal(
            "Deleted!",
            "Family No: " + family_id + " Permanently has been deleted.",
            "success"
          );
          delete_Family(family_id);
        } else {
          swal("Cancelled", "Family No: " + family_id + " is safe :)", "error");
        }
      }
    );
  });

  $("#employee_id").change(function () {
    var opt = $('#employees option[value="' + $(this).val() + '"]');
    if (opt.length) {
      var value = opt.attr("employee_id");

      $("#employee_id").attr("employee_id", value);
    } else {
      $("#employee_id").val("");
      $("#employee_id").focus();
      return;
    }
  });

  $("#form").on("submit", function (e) {
    e.preventDefault();
    // var user_id = $("#user_id").val();
    var family_name = $("#family_name").val();
    var family_id = $("#family_id").val();
    // var user_type = $("#user_type").val();
    // var status = $("#status").val();
    // var employee_id = $("#employee_id").attr('employee_id');
    // var user_date = $("#user_date").val();

    var columns = [];

    if (btn_action == "insert") {
      var data = new FormData($("#form")[0]);
      data.append("action", "newFamily");
      $.ajax({
        method: "POST",
        url: `controllers/${
          btn_action == "insert" ? "family.php" : "crud_operation.php"
        }`,
        data: data,
        dataType: "JSON",
         contentType: false,processData: false,
        async: true,
        success: function (data) {
          var status = data.status;
          var message = data.message;
  
          if (status == true) {
             
              btn_action = "insert";
              window.scroll(0, 0);
              $("#form")[0].reset();
              load_families();
              show_toast("success", `Family Has been Saved Successfully and Added ${data.added} members`);
          
          } else {
            swal("Error!", message, "error");
            show_toast("error", message);
            window.scroll(0, 0);
          }
        },
        error: function (data) {},
      });
    } else {
      columns.push(family_id);
      columns.push(family_name);
      console.log(columns)
      var data = {
        action: "insert_and_update",
        type: "update",
        procedure: "family_sp",
        columns: columns,
      };
      $.ajax({
        method: "POST",
        url: `controllers/${
          btn_action == "insert" ? "family.php" : "crud_operation.php"
        }`,
        data: data,
        dataType: "JSON",
        async: true,
        success: function (data) {
          var status = data.status;
          var message = data.message;
  
          if (status == true) {
              ModelPopup.modal("hide");
              btn_action = "insert";
              window.scroll(0, 0);
              $("#form")[0].reset();
              load_families();
              swal(
                "Congratulations!",
                "Family Has been Updated Successfully",
                "success"
              );
              show_toast("success", "Family Has been Updated Successfully");
      
          } else {
            swal("Error!", message, "error");
            show_toast("error", message);
            window.scroll(0, 0);
          }
        },
        error: function (data) {},
      });
    }
    load_members();
    $("#tbl-m1").removeClass("d-none");
    
  });
  $("#Addmemberform").on("submit", function (e) {
    e.preventDefault();
    var formdata = new FormData($("#Addmemberform")[0]);
    formdata.append("action", "addMembers");
    formdata.append("family_id", $("#m_family_ids").attr("m_family_id"));

    $.ajax({
      method: "POST",
      url: "controllers/family.php",
      data: formdata,
      dataType: "JSON",
      processData: false,
      contentType: false,
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          swal(
            "Success Message",
            message + $("#m_family_ids").val(),
            "success"
          );
          load_members();
          load_families();
        } else {
          swal("Information", message, "info");
          load_members();
          load_families();
        }
      },
      error: function (data) {},
    });
  });

  $("#form").on("click", "input#check_all_2", function () {
    if ($(this).is(":checked")) {
      $("#form input[type='checkbox']").prop("checked", true);
    } else {
      $("#form input[type='checkbox']").prop("checked", false);
    }
  });

  function get_all_family() {
    var data = {
      action: "read",
      id: "",
      procedure: "get_families",
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
        if (status) {
          message.forEach((items, i) => {
            opt += `<option f_id=${items["ID"]} value="${items["Family Name"]} Family - ${items["Total Members"]} Members"></option>`;
          });
          $("#families").html(opt);
        } else {
        }
      },
      error: function (data) {},
    });
  }

  function load_families() {
    var data = {
      action: "read",
      id: "",
      procedure: "get_families",
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
              column += "<th>" + index + "</th>";
            }
            column += "<th class='text-center'>" + "Action" + "</th>";
            column += "</tr>";

            row += "<tr class='border-0'>";
            for (index in item) {
              row += "<td>" + item[index] + "</td>";
            }

            row +=
              `<td class='text-center '>
              <button class='btn btn-info btn-sm add_m ' title="Add Member" family_id='` +
              item["ID"] +
              `'>
                                    <i class='fa fa-user-plus'></i>
                                </button>
                        <button class='btn btn-success btn-sm edit ' title="Edit" family_id='` +
              item["ID"] +
              `'>
                                    <i class='fa fa-wrench'></i>
                                </button>
                                <button class='btn btn-danger btn-sm delete ' title="Delete" family_id='` +
              item["ID"] +
              `'>
                                    <i class='fa fa-trash'></i>
                                </button>
                                </td>`;

            row += "</tr>";
          });

          $("#table thead").html(column);
          $("#table tbody").html(row);
          $("#table").DataTable();
          // $("#table_paginate").addClass("pull-right");
        } else {
          $("#table tbody").html(
            "<tr><td colspan='8' class='text-center'>" + message + "</td></tr>"
          );
        }
      },
      error: function (data) {},
    });
  }

  function delete_Family(family_id) {
    $.ajax({
      method: "POST",
      url: "controllers/family.php",
      data: { action: "delete", family_id: family_id },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;

        if (status == true) {
          window.scroll(0, 0);
          load_families();
          swal(
            "Congratulations!",
            "Family Has Been Deleted Successfully",
            "success"
          );
        } else {
          window.scroll(0, 0);
          ModelPopup.modal("hide");
          swal("Error!", message, "error");
        }
      },
      error: function (data) {},
    });
  }


  function fetch_family(family_id) {
    $.ajax({
      method: "POST",
      url: "controllers/family.php",
      data: { action: "fetch", family_id: family_id },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;

        if (status == true) {
          $("#family_id").val(message["Family_id"]);
          $("#family_name").val(message["Family_Name"]);
          $("#user_date").val(message["Registered_Date"]);
          ModelPopup.modal("show");
        }
      },
      error: function (data) {},
    });
  }
  function load_members() {
    var data = {
      action: "read",
      id: "",
      procedure: "get_individual_members",
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
          generateTable("memberstbl", "1", message);
          generateTable("Addmemberstbl", "2", message);
        } else {
          $("#memberstbl tbody").html(
            "<tr><td colspan='4' class='text-center'>" + message + "</td></tr>"
          );
        }
      },
      error: function (data) {},
    });
  }
  $("#btn_modle").on("click", function () {
    $("#form")[0].reset();
    ModelPopup.modal("show");
    btn_action = "insert";
  });

  function show_toast(type, message) {
    notif({
      msg: "<b>" + type + ":</b>" + message,
      type: type,
    });
  }
});

function generateTable(tblname, shortcut, message) {
  var column = "";
  var row = "";
  $("#" + tblname)
    .dataTable()
    .fnClearTable();
  $("#" + tblname)
    .dataTable()
    .fnDestroy();

  message.forEach(function (item, i) {
    if (item["Family"] == null) {
      column = "<tr>";
      column += `<th class="custom-checkbox text-center"><input class="custom-control-input" type="checkbox" name="check_all_${shortcut}" id="check_all_${shortcut}"/><label class="custom-control-label" for="check_all_${shortcut}"></label></th>`;
      for (index in item) {
        column += "<th>" + index + "</th>";
      }

      column += "</tr>";

      row += "<tr>";

      row += `<td class="custom-checkbox text-center"><input type="checkbox" class="custom-control-input" id="member_${item["ID"]}_${shortcut}"  value="${item["ID"]}" name="member_ids[]" > &nbsp; &nbsp;
                <label class="custom-control-label" for="member_${item["ID"]}_${shortcut}"></label></td>`;
      for (index in item) {
        if (index == "Family") {
          if (item["Family"] == null) {
            row += `<td>None</td>`;
          } else
            row += `<td class="text-capitalize font-weight-bold">${item["Family"]}</td>`;
        } else row += "<td>" + item[index] + "</td>";
      }
      row += "</tr>";
    }
  });

  $("#" + tblname + " thead").html(column);
  $("#" + tblname + " tbody").html(row);
  $("#" + tblname).DataTable();
}
