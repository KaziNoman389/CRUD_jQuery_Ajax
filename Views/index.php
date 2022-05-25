<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMS</title>

    <!-- ======================CSS LINKS======================= -->
    <!-- font-icon cdn -->
    <link rel="icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0eVcqw3IC0Y_FrO5iZCIk64RtqojoMt9--w&usqp=CAU">

    <!-- bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font Awesome cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <!-- Data table cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap5.min.css'>

    <style>
    .swal2-cancel.btn.btn-secondary {
        margin-right: 20px !important;
    }
    </style>

</head>

<body>
    <!--ADD Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Employee Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_data">
                        <div class="modal-body mb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="error-message">

                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control name" name="name" id="name">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" name="email" id="email">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control phone" name="phone" id="phone">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="">Gender</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input gender" type="radio" name="gender" id="gender"
                                            value="male">
                                        <label class="form-check-label" for="male">male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input gender" type="radio" name="gender" id="gender"
                                            value="female">
                                        <label class="form-check-label" for="female">female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input gender" type="radio" name="gender" id="gender"
                                            value="transgender">
                                        <label class="form-check-label" for="transgender">transgender</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="">Date Of Birth</label>
                                    <input type="date" class="form-control birth_date" name="birth_date"
                                        id="birth_date">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="">Marital Status</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input marital_status" type="radio"
                                            name="marital_status" id="marital_status" value="married">
                                        <label class="form-check-label" for="marital_status">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input marital_status" type="radio"
                                            name="marital_status" id="marital_status" value="unmarried">
                                        <label class="form-check-label" for="marital_status">No</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Occupation</label>
                                    <input type="text" class="form-control occupation" name="occupation"
                                        id="occupation">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Nationality</label>
                                    <input type="text" class="form-control nationality" name="nationality"
                                        id="nationality">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Present Address</label>
                                    <input type="text" class="form-control present_address" name="present_address"
                                        id="present_address">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Permanent Address</label>
                                    <input type="text" class="form-control permanent_address" name="permanent_address"
                                        id="permanent_address">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-md"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--View_Modal_Button -->
    <div class="modal fade" id="viewEmp_Modal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="viewModalLabel">Employee Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="view_emp_id" id="view_emp_id">
                    <div id="viewEmp_ModalData" style="text-transform: capitalize;">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--Update Modal -->
    <div class="modal fade" id="updateEmp_Modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="updateModalLabel">Edit Employee Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="edit_form_data">
                        <div class="modal-body mb-2">
                            <input type="hidden" id="update_emp_id" name="update_emp_id">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="error-message">

                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control name" name="edit_name" id="edit_name">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" name="edit_email" id="edit_email">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control phone" name="edit_phone" id="edit_phone">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="">Gender</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender"
                                            value="male">
                                        <label class="form-check-label" for="male">male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender"
                                            value="female">
                                        <label class="form-check-label" for="female">female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender"
                                            value="transgender">
                                        <label class="form-check-label" for="transgender">transgender</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="">Date Of Birth</label>
                                    <input type="date" class="form-control birth_date" name="edit_birth_date"
                                        id="edit_birth_date">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="">Marital Status</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input marital_status" type="radio"
                                            name="edit_marital_status" id="edit_marital_status" value="married">
                                        <label class="form-check-label" for="marital_status">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input marital_status" type="radio"
                                            name="edit_marital_status" id="edit_marital_status" value="unmarried">
                                        <label class="form-check-label" for="marital_status">No</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Occupation</label>
                                    <input type="text" class="form-control occupation" name="edit_occupation"
                                        id="edit_occupation">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Nationality</label>
                                    <input type="text" class="form-control nationality" name="edit_nationality"
                                        id="edit_nationality">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Present Address</label>
                                    <input type="text" class="form-control present_address" name="edit_present_address"
                                        id="edit_present_address">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="">Permanent Address</label>
                                    <input type="text" class="form-control permanent_address"
                                        name="edit_permanent_address" id="edit_permanent_address">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Data View -->
    <div class="container-fluid mt-2 mb-2">
        <div class="card">


            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h2 class="mb-0 custom-center">Employee Information</h2>
                    </div>
                    <div class="col-md-6 col-12 custom-align">
                        <button type="button" id="insertEmp" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addModal" title="Add"><i class='fa fa-plus'></i>
                            New Employee
                        </button>
                    </div>

                </div>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped" id="emp_table">
                    <thead>
                        <tr class="text-center" style="text-transform: capitalize;">
                            <th scope="col">serial Numner</th>
                            <th scope="col">Full Name</th>
                            <!-- <th scope="col">Email</th> -->
                            <th scope="col">Phone Number</th>
                            <!-- <th scope="col">Gender</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">Martial Status</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">Present Address</th>
                            <th scope="col">Permanent Address</th> -->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="tableBody text-center" style="text-transform: capitalize;" id="emp_data">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- ======================== JS LINKS =========================  -->

    <!-- Data Table cdn -->
    <!-- Only Include jquery once -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>

    <!-- popper js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <!-- bootstrap js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <!-- SweetAlert cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../Assets/PageJs/employee.js"></script>

</body>

</html>

<style>
@media screen and (max-width: 768px) {
    .custom-center {
        text-align: center !important;
    }

    .custom-align {
        text-align: center;
    }
}

@media screen and (min-width: 768px) {
    .custom-align {
        text-align: end;
    }
}
</style>