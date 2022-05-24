<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
                            <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
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
                    <h5 class="modal-title" id="viewModalLabel">Employee Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="view_emp_id" id="view_emp_id">
                    <div id="viewEmp_ModalData">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Data View -->
    <div class="container-fluid mt-2 mb-2">
        <div class="card">
            <div class="card-header">
                <h3>Employee Information</h3>
                <!-- Button trigger ADD Modal -->
                <button type="button" id="insertEmp" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">
                    Add New Employee
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="emp_table">
                    <thead>
                        <tr class="text-center m-2" style="text-transform:uppercase">
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">Martial Status</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">Present Address</th>
                            <th scope="col">Permanent Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="emp_data">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Bootstrap Scripts  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <!-- Data Table cdn -->
    <!-- Only Include jquery once -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    <script src="../Assets/PageJs/employee.js"></script>

</body>

</html>