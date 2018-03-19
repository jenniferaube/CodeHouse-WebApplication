
function editClicked() {
    var table = document.getElementById("table");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler =
            function(row)
            {
                return function() {
                    var cell = row.getElementsByTagName("td")[0];
                    var id = cell.innerHTML;

                    location.href = "edituser.php";

                };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}
function deactivateClicked(){
    var table = document.getElementById("table");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler =
            function(row)
            {
                return function() {
                    var cell = row.getElementsByTagName("td")[0];
                    var id = cell.innerHTML;
                    //var id = "select id from user where id = ", currentRow;
                    location.href = "deactivateuser.php";

                };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}


