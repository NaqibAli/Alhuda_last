loadfiles();
loadYears();
loadMonths();

function loadMonths() {
    var opt = "";
    $.ajax({
        method: "POST",
        url: "controllers/backup.php",
        data: { action: "getMonths", year: new Date().getFullYear() },
        dataType: "JSON",
        async: true,
        success: function (data) {
            data.forEach(option => {
                opt += `<option value="${option}">${option}</option>`;
            });
            $("#month").html(opt);
        },
        error: function (data) {
            alert(data);
        },
    });
}

function loadYears() {
    var opt = "";
    $.ajax({
        method: "POST",
        url: "controllers/backup.php",
        data: { action: "getYears" },
        dataType: "JSON",
        async: true,
        success: function (data) {
            data.forEach(option => {
                opt += `<option value="${option}">${option}</option>`;

            });
            $("#year").html(opt);
        },
        error: function (data) {
            alert(data);
        },
    });
}

$("#month").change(function () {
    let year = $("#year").val();
    let month = $("#month").val();
    if (year == '' && month == '') {
        loadfiles();
    }
    else {
        var rows = "";
        $.ajax({
            method: "POST",
            url: "controllers/backup.php",
            data: { action: "getSpecificFiles", year: year, month: month },
            dataType: "JSON",
            async: true,
            success: function (data) {
                var rowno = 1;
                data.forEach(file => {
                    rows += `
                   <tr>
                        <td>${rowno}</td>
                        <td>${file.filename}</td>

                        <td class="text-center">

                           
                            <button title="Delete Backup" class="btn btn-danger btn-sm " id="delete" year='${file.year}' month='${file.month}'><i class="fa fa-trash" ></i> Delete</button>
                        </td>
                    </tr>
                   `;
                    rowno++;
                });
                $("#table tbody").html(rows);
            },
            error: function (data) { console.log(data) },
        });
    }
})

$("#year").change(function () {
    var opt = "";
    $.ajax({
        method: "POST",
        url: "controllers/backup.php",
        data: { action: "getMonths", year: $(this).val() },
        dataType: "JSON",
        async: true,
        success: function (data) {
            data.forEach(option => {
                opt += `<option value="${option}">${option}</option>`;
            });
            $("#month").html(opt);
        },
        error: function (data) {
            alert(data);
        },
    });
})

function loadfiles() {
    var data = {
        action: "getAllFiles"
    }
    var rows = "";

    $.ajax({
        method: "POST",
        url: "controllers/backup.php",
        data: data,
        dataType: "JSON",
        async: true,
        success: function (data) {
            var rowno = 1;
            data.forEach(file => {

                //Deleting Button
                // <a download href="downloads/database/${file.year}/${file.month}/${file.filename}" title="Download Backup" class="btn btn-primary btn-sm p-2"><i class="fa fa-download"></i> Download</a>

                rows += `
               <tr>
                    <td>${rowno}</td>
                    <td>${file.filename}</td>

                    <td class="text-center">
                        
                        <button title="Delete Backup" class="btn btn-danger btn-sm p-2" id="delete" year='${file.year}' month='${file.month}'><i class="fa fa-trash" ></i> Delete</button>
                    </td>
                </tr>
               `;

                // Restoring Button
                //    <button title="Restore Backup" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Restore</button>
                rowno++;
            });
            $("#table tbody").html(rows);
        },
        error: function (data) { },
    });
}

$("#table").on("click", "button#delete", function () {
    var filename = $(this).parent().parent().children().eq(1).text();
    $.ajax({
        method: "POST",
        url: "controllers/backup.php",
        data: {
            action: "deletefile",
            year: $(this).attr("year"),
            month: $(this).attr("month"),
            filename: filename
        },
        dataType: "JSON",
        async: true,
        success: function (data) {
            alert(data.message)
            loadfiles();
        },
        error: function (data) {
            alert(data);
        },
    });
})