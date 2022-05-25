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
            $('#emp_table').DataTable();
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
            data: { 'request': '1', 'parameter': '2', 'data': 'id = ' + v_id },
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


    // ==================== UPDATE ======================= //
    // fetch_modal_edit_data
    $("#emp_table").on('click', '#edit_id', function(e) {
        var u_id = $(this).attr('data-id');
        $("#update_emp_id").val(u_id);
        $("#updateEmp_Modal").modal("show");
    });

    //edit_modal_data_view
    $("#updateEmp_Modal").on('show.bs.modal', function(e) {
        var u_id = $("#update_emp_id").val();
        $.ajax({
            url: "../APIs/api_1.php",
            type: "post",
            data: { 'request': '1', 'parameter': '3', 'data': 'id = ' + u_id },
            dataType: "json",
            success: function(result) {
                var record = result[0];
                $('#edit_name').val(record['name']);
                $('#edit_email').val(record['email']);
                $('#edit_phone').val(record['phone']);
                $('#edit_birth_date').val(record['birth_date']);

                $('[name="edit_gender"]').val([record['gender']]);

                $('[name="edit_marital_status"]').val([record['marital_status']]);

                $('#edit_occupation').val(record['occupation']);
                $('#edit_nationality').val(record['nationality']);
                $('#edit_present_address').val(record['present_address']);
                $('#edit_permanent_address').val(record['permanent_address']);
            }
        });
    });

    //update data to database
    $('#edit_form_data').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "Post",
            url: "../Controllers/update_empData.php",
            data: $('form').serialize(),
            success: function(result) {
                $.ajax({
                    type: "post",
                    url: "../APIs/api_1.php",
                    data: { 'request': '1', 'parameter': '1' },
                    dataType: "json",
                    success: function(result) {
                        $('#emp_data').html(result);
                        $("#updateEmp_Modal").modal("hide");
                    }
                });
            }
        });
    });

    //Delete data to database
    $('#emp_table').on('click', '#delele_id', function(e) {
        var del_id = $(this).attr('data-id');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to delete this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "Post",
                    url: "../Controllers/delete_empData.php",
                    data: { 'del_emp_id': del_id },
                    success: function(result) {
                        $.ajax({
                            type: "post",
                            url: "../APIs/api_1.php",
                            data: { 'request': '1', 'parameter': '1' },
                            dataType: "json",
                            success: function(result) {
                                $('#emp_data').html(result);
                            }
                        });
                    }
                });

                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })

    });

});