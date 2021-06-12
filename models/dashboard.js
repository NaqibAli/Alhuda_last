$(document).ready(function () {
  fetch_boxes();
  last_10_members();
  family_summery();
  getupdate();
  last_10_family_members();

  function make_chart(type, control, lables, datas) {
    var barData = {
      labels: lables,
      datasets: [
        {
          label: "Total",
          backgroundColor: [
            "#285cf7",
            "#f09819",
            "#00cccc",
            "#74de00",
            "#6f42c1",
            "#FF00FF",
          ],

          borderColor: [
            "#285cf7",
            "#f09819",
            "#00cccc",
            "#74de00",
            "#6f42c1",
            "#FF00FF",
          ],
          borderWidth: 1,
          data: datas,
        },
      ],
    };

    var barOptions = {
      responsive: true,
    };

    var ctx2 = document.getElementById(control).getContext("2d");
    new Chart(ctx2, { type: type, data: barData, options: barOptions });
  }
  function getupdate() {
    var data = {
      action: "getUpdates",
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
          let deleted = message.D;
          let updated = message.U;
          let registred = message.R;
          if (deleted == 0 && updated == 0 && registred ==  0) {
            $("#top-alert").html(`<span class="alert-inner--icon "><i class="fe fe-users"></i></span>
            <strong class="mr-3">NO activities Since last Active </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>`);
          }
          $("#re").text(registred)
          $("#upd").text(updated)
          $("#del").text(deleted)

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
          $("#all_members").html(message["all_m"]);
          $("#all_employee").html(message["all_e"]);
          $("#all_users").html(message["all_u"]);
          $("#all_family").html(message["all_f"]);

          var labels = ["Active", "Moved", "Deceased", "Disputed"];
          var data = [
            message["active_m"],
            message["moved_m"],
            message["des_m"],
            message["disp_m"],
            0,
          ];
          //    data= data.filter(m=>m>0);

          make_chart("bar", "member_status", labels, data);

          var m_label = ["Individual", "Member Families"];
          var m_data = [message["individual"], message["family"], 0];
          // m_data=m_data.filter(m=>m>0);
          make_chart("bar", "members_types", m_label, m_data);

          if (localStorage.getItem("userType") == "User") return;

          var e_label = ["Active", "Inactive"];
          var e_data = [message["active e"], 0];
          e_data = e_data.filter((m) => m > 0);
          make_chart("pie", "employee_status", e_label, e_data);

          var u_label = ["Active Users", "Inactive Users"];
          var u_data = [message["Active users"], message["In active users"], 0];
          u_data = u_data.filter((m) => m > 0);
          make_chart("pie", "users_status", u_label, u_data);
        }
      },
      error: function (data) {},
    });
  }

  function last_10_members() {
    $.ajax({
      method: "POST",
      url: "controllers/reports.php",
      data: { action: "last_10_members" },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        var colum = "";
        var row = "";
        if (status == true) {
          message.forEach((item, i) => {
            colum = "<tr>";
            for (let index in item) {
              if (index == "National ID") {
                if (localStorage.getItem("userType") == "User") continue;
              }
              colum += `<th>${index}</th>`;
            }
            colum += "</tr>";
            row += "<tr>";
            for (let index in item) {
              if (index == "Status") {
                if (item[index] == "Active") {
                  row += `<td><span class="badge badge-success text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Disputed") {
                  row += `<td><span class="badge badge-warning text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Deceased") {
                  row += `<td><span class="badge badge-danger text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Moved") {
                  row += `<td><span class="badge badge-info text-capitalize">${item[index]}</span></td>`;
                }
              } else if (index == "National ID") {
                if (localStorage.getItem("userType") == "User") continue;
                else row += `<td>${item[index]}</td>`;
              } else row += `<td>${item[index]}</td>`;
            }
            row += "</tr>";
          });
          $("#table_10_members thead").html(colum);
          $("#table_10_members tbody").html(row);
        } else {
        }
      },
      error: function (data) {},
    });
  }
  function last_10_family_members() {
    $.ajax({
      method: "POST",
      url: "controllers/reports.php",
      data: { action: "get_latest_10" },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        var colum = "";
        var row = "";
        if (status == true) {
          message.forEach((item, i) => {
            colum = "<tr>";
            for (let index in item) {
              if (index == "National ID") {
                if (localStorage.getItem("userType") == "User") continue;
              }

              colum += `<th>${index}</th>`;
            }
            colum += "</tr>";
            row += "<tr>";
            for (let index in item) {
              if (index == "Status") {
                if (item[index] == "Active") {
                  row += `<td><span class="badge badge-success text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Disputed") {
                  row += `<td><span class="badge badge-warning text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Deceased") {
                  row += `<td><span class="badge badge-danger text-capitalize">${item[index]}</span></td>`;
                } else if (item[index] == "Moved") {
                  row += `<td><span class="badge badge-info text-capitalize">${item[index]}</span></td>`;
                }
              } else if (index == "National ID") {
                if (localStorage.getItem("userType") == "User") continue;
                else row += `<td>${item[index]}</td>`;
              } else row += `<td>${item[index]}</td>`;
            }
            row += "</tr>";
          });
          $("#table_10_member_family thead").html(colum);
          $("#table_10_member_family tbody").html(row);
        } else {
        }
      },
      error: function (data) {},
    });
  }
  function family_summery() {
    $.ajax({
      method: "POST",
      url: "controllers/crud_operation.php",
      data: { action: "read", procedure: "get_families", id: "" },
      dataType: "JSON",
      async: true,
      success: function (data) {
        var status = data.status;
        var message = data.message;
        var colum = "";
        var row = "";
        if (status == true) {
          message.forEach((item, i) => {
            row += "<tr>";
            row += `<td>${item["Family Name"]}</td><td>${item["Total Members"]}</td><td>${item["Date"]}</td>`;
            row += "</tr>";
          });
          $("#family_members tbody").html(row);
        } else {
        }
      },
      error: function (data) {},
    });
  }
});
