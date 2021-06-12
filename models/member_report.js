var dateformat="all";
load_members();
get_all_family()
fill_users();

$("#print").on("click", function () {

  var win = window.open("");
  var table = document.querySelector("#table");
  table.classList.remove("table-bordered")
//  $("#table").dataTable().fnClearTable();
// $("#table").dataTable().fnDestroy();
$("#table thead th").removeClass("sorting sorting_asc sorting_desc");
var head = $("head").html();
head+="<style>thead tr{background-color:#183153 !important;color:#FAB005 !important;} .badge{border:none !important;} </style>"
console.log(head);
  win.document.write("<html>");
  win.document.write("<head>" + head + "</head>");
  win.document.write("<body>");
  win.document.write(table.outerHTML);
  win.document.write("</body></html>");

  setTimeout(() => {
      win.print();
  }, 500);
  setTimeout(() => {
    $("#table thead th").addClass("sorting");
      win.close();
  }, 500);

});

function load_members() {
    var status = $("#status").val();
    var from = $("#from_date").val();
    var to = $("#to_date").val();
    var user = $("#user_id").attr("user_id");
    var type = $("#membertype").val();
    var gender = $("#gender").val();
    var family = $("#family_id").attr("family_id");;

    var data = {
      action: "rpt_members",
      from:(dateformat=="all")?"":from,
      to:(dateformat=="all")?"":to,
      status:(status=="all")?"":status,
      user:user,
      family:family,
      type:(type=="all")?"":type,
      gender:(gender=="all")?"":gender
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
       if($.fn.dataTable.isDataTable("#table")){
           $("#table").dataTable().fnClearTable();
          $("#table").dataTable().fnDestroy();
       }
        
        if (status) {
          message.forEach(function (item, i) {
            column = "<tr>";
            for (index in item) {
                column += "<th>" + index + "</th>";
            }
            column += "</tr>";

            row += "<tr>";
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
              } else row += "<td>" + item[index] + "</td>";
            }
            row += "</tr>";
          });

          $("#table thead").html(column);
          $("#table tbody").html(row);
        //  $("#table").DataTable();
 
        var table = $('#table').DataTable({
            lengthChange: false,
            buttons: ['excel', 'colvis'],
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ ',
            },
            "paging": false,
            "sPaginationType": "bootstrap",

        });
        table.buttons().container()
            .appendTo('#table_wrapper .col-md-6:eq(0)');

        } else {
            show_toast("error",message)
            $("#table thead").html("");
          $("#table tbody").html(
            `<tr><td colspan='4' class='text-center'>${message}</td></tr>`
          );
        }
      },
      error: function (data) {},
    });
  }

$("#date_type").on("change",function() {
      if ($(this).val()=="all") {
        dateformat="all";
        $("#from_date").attr("disabled",'');
        $("#to_date").attr("disabled",'');
      }
      else{
        dateformat="custom";
        $("#from_date").removeAttr("disabled");
          $("#to_date").removeAttr("disabled");
      }
})

  function fill_users() {

    var data = {
        "action": "fill",
        "id": "",
        "procedure": "user_fill",

    };

    $.ajax({
        method: "POST",
        url: "controllers/crud_operation.php",
        data: data,
        dataType: "JSON",
        async: true,
        success: function(data) {
            var message = data.message;
            var status = data.status;
            var strHTML = '';
            var column = '';
            if (status == true) {
                $('#users').html(strHTML);
                message.forEach(function(item, i) {

                    strHTML += '<option user_id="' + item['id'] + '" value="' + item['employee'] + ' -  ' + item['username'] + ' -  ' + item['type'] + '"> ';


                    strHTML += '</option>';

                });
                $('#users').append(strHTML);
            } else {
                alert(message);
            }

        },
        error: function(data) {
            alert(data.Message);
        }
    });
}
$("#user_id").change(function() {
    var opt = $('#users option[value="' + $(this).val() + '"]');
    if (opt.length) {
        var value = opt.attr('user_id');
        $("#user_id").attr('user_id', value);
    } else {
        $("#user_id").val("");
        $("#user_id").attr("user_id",'');
        $("#user_id").focus();
        return;
    }
});

$("#form").on("submit",function(e) {
    e.preventDefault();
    load_members();
})
$("#btn-reset").click(function() {
  console.log("dhsdf")
  $("#form")[0].reset();
    $("#from_date").attr("disabled",'');
    $("#to_date").attr("disabled",'');
    $("#family_id").attr("family_id",'');
    $("#user_id").attr("user_id",'');
    dateformat="all";
})
function show_toast(type, message) {
    notif({
      msg: "<b>" + type + ":</b> " + message,
      type: type,
    });
}
$("#family_id").change(() => {
  var sel_opt = $("#families option[value='" + $("#family_id").val() + "']");
  console.log(sel_opt.length)
  if (sel_opt.length) {
    $("#family_id").attr("family_id", sel_opt.attr("f_id"));
  } else {
    $("#family_id").attr("family_id",'');
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
          opt += `<option f_id=${items["ID"]} value="${items["Family Name"]} Family "></option>`;
        });
        $("#families").html(opt);
      } else {
      }
    },
    error: function (data) {},
  });
}