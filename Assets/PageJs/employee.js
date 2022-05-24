$(document).ready(function() {

    // fetch_table_data
    $.ajax({
        type: "Post",
        url: "../APIs/api_1.php",
        data: { 'request': '1', 'parameter': '1' },
        dataType: "json",
        success: function(result) {
            $('#emp_data').html(result);
            // $('#emp_table').DataTable();
        }
    });
});