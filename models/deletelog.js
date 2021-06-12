var dateformat="all";
getdeleteLog();
fill_users();

function getdeleteLog() {
    console.log(dateformat)
    var from=(dateformat=="all")? "": $("#from_date").val();
    var to= (dateformat=="all")? "" : $("#to_date").val();
    var user=$("#user_id").attr("user_id");

    var data={
        action:"rpt_delete_logs",
        user:user,
        from:from,
        to:to
    }
    $.ajax({
          method: "POST",
          url: "controllers/reports.php",
          data: data,
          dataType: "JSON",
          async: true,
          success: function (data) {
            var status = data.status;
            var message = data.message;
            var column="";
            var row="";
            if (status == true) {
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
                      if(!(index == "id")) row += "<td>" + item[index] + "</td>";
                    }
                   
        
                    
        
                    row += "</tr>";
                  });
                  
                  $("#table thead").html(column);
                  $("#table tbody").html(row);
$("#table").DataTable({responsive: true});
            } else {
                $("#table tbody").html(
                    "<tr><td colspan='3' class='text-center'>" + message + "</td></tr>"
                  );
            }
          },
          error: function (data) {},
        });
}
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
    getdeleteLog();
});

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
});

