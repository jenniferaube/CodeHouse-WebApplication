<!--
File: searchresults.js
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 19, 2018 by Jennifer Aube
-->
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


