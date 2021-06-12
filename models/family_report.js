get_all_family();
get_family_stats();
$("#print").on("click", function () {

  var win = window.open("");
  var table = document.querySelector("#table");
  // table.classList.remove("table")
//  $("#table").dataTable().fnClearTable();
// $("#table").dataTable().fnDestroy();

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
      win.close();
  }, 500);

});
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
            opt += `<option f_id=${items["ID"]} value="${items["Family Name"]}"></option>`;
          });
          $("#families").html(opt);
        } else {
        }
      },
      error: function (data) {},
    });
  }

  function get_family_stats() {
    var data = {
      action: "get_family_stats",
      id: $("#family_id").attr("family_id") || '',
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
        var row = "";
        var column="";
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
                  column="<tr>";
                  for (index in item["Members"][member]) {
                      if (index != 'Member_Id') {
                           column += "<th>" + index + "</th>";
                      }
                     
                  }
                  column +="</tr>";
                  row += `<tr>`;
                  for (index in item["Members"][member]) {
                    
                    if ( index != 'Member_Id') {
                        if (index == "Status") {
                            if (item["Members"][member][index] == "Active") {
                              row += `<td><span class="badge badge-success text-capitalize">${item["Members"][member][index]}</span></td>`;
                            } else if (item["Members"][member][index] == "Disputed") {
                              row += `<td><span class="badge badge-warning text-capitalize">${item["Members"][member][index]}</span></td>`;
                            } else if (item["Members"][member][index] == "Deceased") {
                              row += `<td><span class="badge badge-danger text-capitalize">${item["Members"][member][index]}</span></td>`;
                            } else if (item["Members"][member][index] == "Moved") {
                              row += `<td><span class="badge badge-info text-capitalize">${item["Members"][member][index]}</span></td>`;
                            }
                          }else row += `<td>${item["Members"][member][index]}</td>`;
               
                
                    }
                   
                }row += "</tr>";

                
              }
              row += `</div>`;
            }
          });
        } else {
        }
        $("#table thead").html(column);
        $("#table tbody").html(row);
      },
      error: function (data) {},
    });
  }

  $("#form").on("submit",(e)=>{
      e.preventDefault();
      get_family_stats();
  })