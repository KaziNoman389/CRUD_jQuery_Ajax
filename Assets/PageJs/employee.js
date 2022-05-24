$(document).ready(function() {

    // ==================== READ ======================= //
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

    // fetch_modal_view_data
    $("#emp_table").on('click', '#view_id', function(e) {
        var v_id = $(this).attr('data-id');
        $("#view_emp_id").val(v_id);
        $("#viewEmp_Modal").modal("show");
    });

    //View_modal_data
    $("#viewEmp_Modal").on('show.bs.modal', function(e) {
        var v_id = $("#view_emp_id").val();
        $.ajax({
            url: "../APIs/api_1.php",
            type: "post",
            data: { 'request': '1', 'parameter': '2', 'data': 'id =' + v_id },
            dataType: "json",
            success: function(result) {
                $("#viewEmp_ModalData").html(result);
            }
        });
    });

    // ==================== INSERT ======================= //
    //insert data to database
    $('#form_data').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "Post",
            url: "../Controllers/insert_empData.php",
            data: $('form').serialize(),
            success: function(result) {
                $.ajax({
                    type: "post",
                    url: "url",
                    data: { 'request': '1', 'parameter': '1' },
                    dataType: "json",
                    success: function(response) {
                        $('#emp_data').html(result);
                    }
                });
            }
        });
        $("#form_data")[0].reset();
    });

});