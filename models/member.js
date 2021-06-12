$(document).ready(function () {
  check_user_link();
  get_family_stats();
  load_members();
 
  fetch_boxes();

  var btn_action = "insert";
  var register_option = "individual";
  var ModelPopup = $("#add_model");
  var ModelStatus = $("#status");
  var ModalView = $("#viewMember");

  $("#table").on("click", "a.edit", function () {
    var member_id = $(this).attr("member_id");
    btn_action = "update";
    $("#single-member")[0].reset();
    fetch_member(member_id);
    window.scroll(0, 0);
    $("#collapseExample").addClass("show");
  });
  $("#manageMembers").on("click", "input[type='checkbox']", function () {
    console.log("Hi Man");
    if ($(this).is(":checked")) {
      $("#deleteMembers").removeAttr("disabled");
    }
  });

  $("#table").on("click", "a.btn-add", function () {
    var member_id = $(this).attr("member_id");
    get_all_family();
    $("#m_member_id").val(member_id);
    ModelPopup.modal("show");
    window.scroll(0, 0);
  });
  $("#table").on("click", "a.status", function () {
    var member_id = $(this).attr("member_id");
    $("#s_member_id").val(member_id);
    $("#status_modal").modal("show");
    window.scroll(0, 0);
  });
  $("#table").on("click", "a.view", function () {
    var member_id = $(this).attr("member_id");
    $("#s_member_id").val(member_id);
    get_member(member_id);
    $("#view_modal").modal("show");
    window.scroll(0, 0);
  });
  $("#family_id").change(() => {
    var sel_opt = $("#families option[value='" + $("#family_id").val() + "']");
    $("#family_id").attr("family_id", sel_opt.attr("f_id"));
  });

  $("#table").on("click", "a.delete", function () {
    var member_id = $(this).attr("member_id");
    swal(
      {
        title: "Are you sure?",
        text: "You will delete Member No: " + member_id + " Permanently!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-duccess",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel pls!",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          swal(
            "Deleted!",
            "Member No: " + member_id + " Permanently has been deleted.",
            "success"
          );
          delete_member(member_id);
        } else {
          swal("Cancelled", "Member No: " + member_id + " is safe :)", "error");
        }
      }
    );
  });
  function checkID(input){
    if(input.value.length < 11 || input.value.length > 11){
        return false;
    }
    else{
      return true;
    }
    

}
  $("#single-member").on("submit", function (e) {
    e.preventDefault();
    var form_data = new FormData($("#single-member")[0]);
    var columns = [];
    var address="";
    form_data.forEach((item, key) => {
     if (key == 'street' || key == 'postcode' || key == 'village') {
      if (key == 'village') {
       if(item != '') {
          address +=item;
       }
      columns.push(address);
      } else {
        if(item != '') address +=item+" # ";
      }
     }
     else
      columns.push(item);
    });

    var data = {};
    if (btn_action == "insert") {
        data = {
          action: "insert_and_update",
          type: "insert",
          procedure: "Member_sp",
          columns: columns,
        };
    
    } else {
      data = {
        action: "insert_and_update",
        type: "update",
        procedure: "Member_sp",
        columns: columns,
      };
    }
    
    if(!checkID($("#national_id")[0])){
      $("#national_id").addClass("is-invalid");
      show_toast("error","National ID Must be 11 Digits");
      return;
    }
    else{
      $("#national_id").removeClass("is-invalid");
    }

    $.ajax({
      method: "POST",
      url: "controllers/crud_operation.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          if (btn_action == "update") {
            ModelPopup.modal("hide");
            btn_action = "insert";
            window.scroll(0, 0);
            $("#single-member")[0].reset();
            load_members();
            swal(
              "Congratulations!",
              "Member Has been Updated Successfully",
              "success"
            );
            show_toast("success", "Member Has been Updated Successfully");
          } else {
            btn_action = "insert";
            window.scroll(0, 0);
            $("#single-member")[0].reset();
            load_members();
            show_toast("success", "Member Has been Saved Successfully");
          }

          $("#collapseExample").removeClass("show");
        } else {
          swal("Error!", message, "error");
          show_toast("error", message);
          window.scroll(0, 0);
        }
        fetch_boxes();
      },
      error: function (data) {},
    });
  });
  $("#withFamily").on("submit", function (e) {
    e.preventDefault();
    var form_data = new FormData($("#withFamily")[0]);
   
    form_data.append("action","registerFamilyWith");

    var nationalIDS = $("#withFamily input[name='nationalID[]']");
    var checked = true;
    // console.log($(nationalIDS[0]))
    for (let index in nationalIDS) {
      if (!isNaN(index)) {
        if(!checkID(nationalIDS[index])){
      $(nationalIDS[index]).addClass("is-invalid");
      $(nationalIDS[index]).removeClass("parsley-success");
      show_toast("error","National ID Must be 11 Digits");
      checked=false;
    }
    else{
      $(nationalIDS[index]).removeClass("is-invalid");
    }
      }
      
    }

    if (!checked) {
      return;
    }
    
    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: form_data,
      contentType:false,
      processData:false,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          if (btn_action == "update") {
            btn_action = "insert";
            window.scroll(0, 0);
            $("#single-member")[0].reset();
            load_members();
            swal(
              "Congratulations!",
              "Member Has been Updated Successfully",
              "success"
            );
            show_toast("success", message);
          } else {
            btn_action = "insert";
            window.scroll(0, 0);
            $("#single-member")[0].reset();
            load_members();
            show_toast("success", message);
          }

          $("#collapseExample").removeClass("show");
        } else {
          swal("Error!", message, "error");
          show_toast("error", message);
          window.scroll(0, 0);
        }
        fetch_boxes();
      },
      error: function (data) {},
    });
  });

  $("#join_form").on("submit", (e) => {
    e.preventDefault();
    console.log($("#m_member_id").val());
    var data = {
      action: "Managefamily",
      id: $("#m_member_id").val(),
      fid: $("#family_id").attr("family_id"),
      type: "add",
    };
    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          show_toast("success", message);
          $("#join_form")[0].reset();
          ModelPopup.modal("hide");
          get_family_stats();
          load_members();
        } else {
        }
      },
      error: function (data) {},
    });
  });
  $("#opt_type").click(function (e) {
    $("#withFamily").removeClass("d-none");
    $("#single-member").addClass("d-none");
    $("#single-member :input").val("");
    $("#name,#sec_name,#national_id").removeAttr("required");
    $("#family_name, #registermemberstbl :input").prop("required", true);
  });
  $("#newM").click(function (e) {
    $("#withFamily").addClass("d-none");
    $("#withFamily :input").val("");
    $("#single-member").removeClass("d-none");
    $("#name,#sec_name,#national_id").prop("required", true);
    $("#family_name,#registermemberstbl :input").removeAttr("required");
  });

  $("#registermemberstbl").on("click", "td>button.addrow", function (e) {
    if (!($("#registermemberstbl tbody tr").length + 1 <= 12)) {
      $(this).prop("disabled", true);
      console.log("Limited Reached");
      return;
    }

    var row = ` <tr class="text-left"><td class="px-1 align-middle">${
      $("#registermemberstbl tbody tr").length + 1
    }</td>
   <td class="px-1 "><input type="text" class="form-control" name="firstname[]" id="first_name${
     $("#registermemberstbl tbody tr").length + 1
   }" placeholder="First Name" required></td>
   <td class="px-1"><input type="text" class="form-control" name="second_name[]" id="second_name${
     $("#registermemberstbl tbody tr").length + 1
   }" placeholder="Middle Name" required></td>
   <td class="px-1"><input type="text" class="form-control" name="nationalID[]" id="nationalID${
     $("#registermemberstbl tbody tr").length + 1
   }" placeholder="National ID" required></td>
   <td class="text-center align-middle"><button Type="button" class="btn btn-sm btn-outline-danger removeRow"><i class="fa fa-trash"></i></button></td>
</tr>`;

    $("#registermemberstbl tbody").append(row);
  });
  $("#registermemberstbl").on("click", "td>button.removeRow", function (e) {
    $(this).parent().parent().remove();
    if ($("#registermemberstbl tbody tr").length + 1 <= 12) {
      $("#registermemberstbl td>button.addrow").removeAttr("disabled");
    }
  });

  $("#status_form").on("submit", (e) => {
    e.preventDefault();
    var formdata = new FormData($("#status_form")[0]);
    formdata.append("action", "ChangeStatus");
    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: formdata,
      processData: false,
      contentType: false,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          show_toast("success", message);
          $("#status_form")[0].reset();
          $("#status_modal").modal("hide");
          load_members();
        } else {
          show_toast("Error", message);
        }
        fetch_boxes();
      },
      error: function (data) {},
    });
  });

  $("#deleteMembers").click(function () {
    swal(
      {
        title: "Are you sure?",
        text: "You will delete Members Permanently!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-duccess",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel pls!",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          deleteMembers();
        } else {
          swal("Cancelled", "Members is safe :)", "error");
        }
      }
    );
  });

  $("#manageMembers").on("click", "input#member_check_all", function () {
    if ($(this).is(":checked")) {
      $("#deleteMembers").removeAttr("disabled");
      $("#manageMembers input[type='checkbox']").prop("checked", true);
    } else {
      $("#manageMembers input[type='checkbox']").prop("checked", false);
    }
  });
 
  function deleteMembers() {
    var fdata = new FormData($("#manageMembers")[0]);
    fdata.append("action", "DeleteMembers");
    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: fdata,
      dataType: "JSON",
      async: true,
      contentType: false,
      processData: false,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          swal(
            "Deleted!",
            data.deleted + " Members Permanently deleted.",
            "success"
          );
          load_members();
        } else {
          swal("Information", message, "info");
          load_members();
        }
        fetch_boxes();
      },
      error: function (data) {},
    });
  }
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
  function load_members() {
    var data = {
      action: "read",
      id: "",
      procedure: "get_Members",
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
            column += `<th class="custom-checkbox"><input type="checkbox" class="custom-control-input" id="member_check_all"  name="member_check_all">&nbsp; &nbsp;
            <label class="custom-control-label ml-4" for="member_check_all">ID</label></th>`;
            for (index in item) {
              if (!(index == "ID")) {
                column += "<th>" + index + "</th>";
              }
            }
            column += "<th class='text-center'>" + "Action" + "</th>";
            column += "</tr>";

            row += "<tr>";
            row += `<td class="align-middle text-center"><div class="custom-checkbox"><input type="checkbox" class="custom-control-input" id="member_${item["ID"]}" value='${item["ID"]}'  name="members[]">
            <label class="custom-control-label ml-4" for="member_${item["ID"]}">${item["ID"]}</label></div></td>`;
            for (index in item) {
              if (index == "Family") {
                if (item["Family"] == null) {
                  row += `<td>N/A</td>`;
                } else
                  row += `<td class="text-capitalize font-weight-bold">${item["Family"]}</td>`;
              } else if (index == "Status") {
                if (item[index] == "Active") {
                  row += `<td><span class="badge badge-success text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Disputed") {
                  row += `<td><span class="badge badge-warning text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Deceased") {
                  row += `<td><span class="badge badge-danger text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Moved") {
                  row += `<td><span class="badge badge-info text-capitalize">${item[index]}</span></td>`;
                }
              } else if (!(index == "ID"))
                row += "<td>" + item[index] + "</td>";
            }
            row += `<td class='text-center'><div class="dropdown"><a  aria-expanded="false" aria-haspopup="true"
            data-toggle="dropdown" id="dropdownMenuButton" href="javascript:;" class="btn cursor"><i class="fe fe-settings ml-1"></i></a><div  class="dropdown-menu tx-13 border">`;

            if (item["Family"] == null) {
              row +=
                `<a href="javascript:;" class='dropdown-item btn-add' title="Add to Family" member_id='` +
                item["ID"] +
                `'><i class='fa fa-plus'></i> Add to Family </a>`;
            }

            row +=
              `<a href="javascript:;" class='status dropdown-item' title="Change Status" member_id='` +
              item["ID"] +
              `'> <i class="fe fe-link"></i> Change Status</a>
              <a href="javascript:;" class='view dropdown-item' title="View Member" member_id='` +
              item["ID"] +
              `'> <i class="fe fe-eye"></i> View</a>
              <a href="javascript:;" class='edit dropdown-item' title="Edit" member_id='` +
              item["ID"] +
              `'><i class='fa fa-wrench'></i> Edit</a><a href="javascript:;" class='delete dropdown-item' title="Delete" member_id='` +
              item["ID"] +
              `'><i class='fa fa-trash'></i> Delete</a>`;

            row += "</div></div></td></tr>";
          });

          $("#table thead").html(column);
          $("#table tbody").html(row);
          $("#table").DataTable({ responsive: true });
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
  function fetch_boxes() {
    var data = {
      action: "fetch",
      procedure: "dashboard_counts",
    };

    $.ajax({
      method: "POST",
      url: "controllers/reports.php",
      data: data,
      dataType: "JSON",
      async: false,
      success: function (data) {
        var status = data.status;
        var message = data.message;

        if (status == true) {
          $("#active_members").html(message["active_m"]);
          $("#moved_members").html(message["moved_m"]);
          $("#deceased_members").html(message["des_m"]);
          $("#disputed_members").html(message["disp_m"]);
        }
      },
      error: function (data) {},
    });
  }
  function delete_member(member_id) {
    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: { action: "delete", member_id: member_id },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;

        if (status == true) {
          window.scroll(0, 0);
          load_members();
          swal(
            "Congratulations!",
            "Member Has Been Deleted Successfully",
            "success"
          );
        } else {
          window.scroll(0, 0);
          ModelPopup.modal("hide");
          swal("Error!", message, "error");
        }
        fetch_boxes();
      },
      error: function (data) {},
    });
  }

  function fetch_member(member_id) {
    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: { action: "fetch", member_id: member_id },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          let address = message["Address"].split("#");
         
          $("input#member_id").val(message["Member_Id"]);
          $("input#name").val(message["FirstName"]);
          $("input#sec_name").val(message["SecondName"]);
          $("input#nickname").val(message["Nickname"]);
          $("input#surname").val(message["Surname"]);
          $("input#phone").val(message["Phone"]);
          $("input#email").val(message["Email"]);
          $("input#street").val(address[0]);
          $("input#postcode").val(address[1]);
          $("input#village").val(address[2]);
          $("input#national_id").val(message["NationalID"]);
          $("input#gender").val(message["Gender"]);
          $("input#r_date").val(message["Registered_Date"]);
        }
      },
      error: function (data) {},
    });
  }


  function get_member(member_id) {
    var data = {
      action: "getMemberInfo",
      member_id: member_id,
    };
    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        if (status == true) {
          $("#full_name").text(
            `${message["First Name"] || ""}  ${message["Second Name"] || ""} ${
              message["Surname"] || ""
            } (${message["Nick Name"] || ""})` || ""
          );
          $("p#m_id").text(message["ID"] || "");
          $("p#gender").text(message["Gender"] || "");
          $("p#national_id").text(message["National ID"] || "");
          $("p#phone").text(message["Phone"] || "");
          $("p#email").text(message["Email"] || "");
          $("p#address").text(message["Address"] || "");
          $("p#r_date").text(message["Date"] || "");
          $("p#m_date").text(message["Modified_date"] || "");
          var span = ``;
          if (message["Status"] == "Active") {
            span = `<span class="badge badge-success text-capitalize">${message["Status"]}</span>`;
          } else if (message["Status"] == "Disputed") {
            span = `<span class="badge badge-warning text-capitalize">${message["Status"]}</span>`;
          } else if (message["Status"] == "Deceased") {
            span = `<span class="badge badge-danger text-capitalize">${message["Status"]}</span>`;
          } else if (message["Status"] == "Moved") {
            span = `<span class="badge badge-info text-capitalize">${message["Status"]}</span>`;
          }
          $("p#status").html(span || "");
          $("p#family").html(
            message["family"] == null ? "None" : message["family"]
          );
        } else {
        }
      },
      error: function (data) {},
    });
  }

  function get_family_stats() {
    var data = {
      action: "get_family_stats",
      id: "",
    };

    $.ajax({
      method: "POST",
      url: "controllers/member.php",
      data: data,
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        var row = "";
        if (status == true) {
          message.forEach(function (item, i) {
            row += `<tr family_id='${item["ID"]}' aria-controls="collapse${
              item["ID"]
            }" aria-expanded="${
              i == 0 ? true : false
            }" data-toggle="collapse" href="#collapse${
              item["ID"]
            }" class="collapsed cursor"><th class="text-center text-dark text-capitalize"  colspan="100%" style="background:#f0f0f0">${
              item["Family Name"]
            }, ${item["Total Members"]} Members </th></tr>`;

            if (item["Members"] != "") {
              row += `<div class="collapse" data-parent="#accordion" id="collapse${item["ID"]}">`;

              for (member in item["Members"]) {
                row += `<tr>`;
                row += `<td>${item["Members"][member]["Full Name"]}</td>`;
                row += `<td class='text-center'><button class='btn btn-danger btn-remove btn-sm' title="Remove Remember" member_id='${item["Members"][member]["Member_Id"]}' ><i class='fa fa-trash'></i></button></td>`;
                row += "</tr>";
              }
              row += `</div>`;
            }
          });
        } else {
        }
        $("#family_table #cus").html(row);
      },
      error: function (data) {},
    });
  }
  $("#family_table").on("click", "button.btn-remove", function () {
    var member_id = $(this).attr("member_id");
    swal(
      {
        title: "Are you sure?",
        text: "You will Member No: " + member_id + " From Family!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-duccess",
        confirmButtonText: "Yes, Remove it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "controllers/member.php",
            data: {
              action: "Managefamily",
              id: member_id,
              fid: "",
              type: "remove",
            },
            dataType: "JSON",
            async: true,
            success: function (data) {
              var status = data.status;
              var message = data.message;

              if (status == true) {
                window.scroll(0, 0);
                get_family_stats();
                load_members();
                swal(
                  "Congratulations!",
                  "Member Has Been Removed Successfully",
                  "success"
                );
              } else {
                window.scroll(0, 0);
                swal("Error!", message, "error");
              }
            },
            error: function (data) {},
          });
          swal(
            "Removed!",
            "Member No: " + member_id + " Removed From Family.",
            "success"
          );
        } else {
          swal("Cancelled", "Member No: " + member_id + " is safe :)", "error");
        }
      }
    );
  });
  $("#btn_modle").on("click", function () {
    $("#form")[0].reset();
    ModelPopup.modal("show");
    btn_action = "insert";
  });

  function show_toast(type, message) {
    notif({
      msg: "<b>" + type + ":</b> " + message,
      type: type,
    });
  }



});
