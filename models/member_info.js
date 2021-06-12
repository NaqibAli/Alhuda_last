var columns = [];
var data=[];
var selected = ["Member_Id", "FirstName", "SecondName", "Surname", "Nickname"];
get_all_members();

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
          opt += `<option member_id=${items["ID"]} value="${items["ID"]} - ${
            items["Full Name"]
          } - ${items["Phone"]}">Family : ${
            items["Family"] == null ? "No Family" : items["Family"]
          }
           </option>`;
        });
        $("#members").html(opt);
      } else {
      }
    },
    error: function (data) {},
  });
}

$("#member_id").change(() => {
  var sel_opt = $("#members option[value='" + $("#member_id").val() + "']");
  $("#member_id").attr("member_id", sel_opt.attr("member_id"));
  fetch_member(sel_opt.attr("member_id"));
});

function fetch_member(member_id) {
  var data = {
    action: "fetch",
    member_id: member_id,
  };
  $.ajax({
    method: "POST",
    url: "controllers/member.php",
    data: data,
    dataType: "JSON",
    async: false,
    success: function (data) {
      var status = data.status;
      var message = data.message;
      if (status == true) {
        // var m = {};
        // selected.forEach((col, index) => {
        //   m[col] = message[col];
        // });
        // m.Family_id = message["Family_id"];
        // message = m;
        if (message["Family_id"] == null) {
          getSingleMember(message);
          getColumns();
          var divs = ``;
          var l = 3;
          columns.forEach((name, index) => {
            if (index == l || index == 0) {
              if (index != 0) {
                divs += `</div>`;
              }
              l += 3;
              divs += `<div class="row mb-2"><div class="col-4 text-left">
            <div class="custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="check_column" ${(index <= 4)?"checked disabled" :""}
                    id="check_${name}" value='${name}' /><label class="custom-control-label" for="check_${name}">${name}</label>
            </div>
        </div>`;
            } else
              divs += `<div class="col-4  text-left">
            <div class="custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="check_column" ${(index <= 4)?"checked disabled" :""}
                    id="check_${name}" value='${name}'/><label class="custom-control-label" for="check_${name}">${name}</label>
            </div>
        </div>`;
          });
          $("#colum-group").html(divs);
          $("#settingModal").modal("show");
          data=message;
        } else {
          getFamilyMembers(message["Family_id"]);
          $("#indivual").addClass("d-none");
          $("#family").removeClass("d-none");
        }
      } else {
      }
    },
    error: function (data) {},
  });
}

function getFamilyMembers(family_id) {
  var data = {
    action: "get_family_stats",
    id: family_id,
    type: "get",
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
              row += `<td>${item["Members"][member]["NationalID"]}</td>`;
              row += `<td>${item["Members"][member]["Tell"]}</td>`;
              row += `<td>${item["Members"][member]["Registered Date"]}</td>`;
              
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

$("#select_col").on("click", "input#check_all", function () {
  if ($(this).is(":checked")) {
    $("#select_col input[type='checkbox']").prop("checked", true);
  } else {
    $("#select_col input[type='checkbox']").prop("checked", false);
  }
});
$("#select_col").on("submit", (e) => {
  e.preventDefault();
  selected = [];
  var col = $("#select_col input[name='check_column']");
  for (let element = 0; element < col.length; element++) {
    if (col[element].checked) {
      selected.push(col[element].value);
    }
  }
  var m = {};
  selected.forEach((col, index) => {
    m[col] = data[col];
  });
  m.Family_id = data["Family_id"];
  data = m;
  $("#indivual").removeClass("d-none");
  $("#family").addClass("d-none");
  $("#full_name").text(
    `${data["FirstName"]||''}  ${data["SecondName"]||''} ${data["Surname"]||''} (${data["Nickname"]||''})` ||
      ""
  );
  $("#m_id").text(data["Member_Id"] || "");
  $("#member-img").attr("src",`assets/img/${(data["Gender"]=="Female")?"default-female.jpg":"default-male.png"}`);
  $("#gender").text(data["Gender"] || "");
  $("#national_id").text(data["NationalID"] || "");
  $("#phone").text(data["Phone"] || "");
  $("#email").text(data["Email"] || "");
  $("#refrence").text(data["Reference"] || "");
  $("#address").text(data["Address"] || "");
  $("#type").text(data["MemberType"] || "");
  $("#r_date").text(data["Registered_Date"] || "");
  $("#m_date").text(data["Modified_date"] || "");
  $("#status").text(data["Status"] || "");

  var span = ``;
  if (data["Status"] == "Active") {
    span = `<span class="badge badge-success text-capitalize">${data["Status"]}</span>`;
  } else if (data["Status"] == "Disputed") {
    span = `<span class="badge badge-warning text-capitalize">${data["Status"]}</span>`;
  } else if (data["Status"] == "Deceased") {
    span = `<span class="badge badge-danger text-capitalize">${data["Status"]}</span>`;
  } else if (data["Status"] == "Moved") {
    span = `<span class="badge badge-info text-capitalize">${data["Status"]}</span>`;
  }
  $("#status").html(span || "");
  $("#settingModal").modal("hide");
});

$("#btn-setting").on("click", async () => {
  $("#settingModal").modal("show");
});
function getColumns() {
  $.ajax({
    method: "POST",
    url: "controllers/member.php",
    data: { action: "getColumns" },
    dataType: "JSON",
    async: false,
    success: function (data) {
      var status = data.status;
      var message = data.message;
      if (status == true) {
        columns = message;
      } else {
        return "error";
      }
    },
    error: function (data) {
      return data;
    },
  });
}

function getSingleMember(message){
 data=message;
}