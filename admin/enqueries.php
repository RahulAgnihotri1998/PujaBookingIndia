<?php
session_start();

// Check if session variables exist
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    // Session variables exist, user is logged in
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];

    // You can use $user_id and $email in your code as needed
} else {
    // Session variables don't exist, user is not logged in
    // Redirect to login page or handle accordingly
    header("Location: login.php");
    exit; // Ensure script execution stops after redirection
}
include('inc/header.php') ?>




<style>
    .cke_notification {
        display: none !important;
        /* Hide the notification */
    }
</style>
<div class="container-scroller">

    <?php include('inc/nav.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                        aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                        aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                    aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                    id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">The total number of sessions</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->

                <!-- chat tab ends -->
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Category</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="add-brand.php">Add Puja Category</a></li>
                            <li class="nav-item"> <a class="nav-link" href="manage-brands.php">Manage Puja Category</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                        aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Products</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="add-products.php">Add A Product</a></li>
                            <li class="nav-item"><a class="nav-link" href="manage-products.php">Manage Products</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#blog-elements" aria-expanded="false"
                        aria-controls="blog-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Blog</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="blog-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="add-blog-category.php">Add a Category</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="all-blog-category-list.php"> Manage
                                    Category</a></li>
                            <li class="nav-item"><a class="nav-link" href="add-single-blog-post.php"> Add New Post</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="all-blog-post.php"> Manage Posts</a></li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                        aria-controls="charts">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Enqueries</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">

                            <li class="nav-item"> <a class="nav-link" href="enqueries.php">Manage Enqueries</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <style>
                                    table.dataTable {
                                        width: 100%;
                                    }
                                </style>


                                <h4 class="card-title">Manage Enqueries</h4>
                                <p class="card-description">
                                    <!-- Add class <code>.table-striped</code> -->
                                </p>


                                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <table
                                            class="enquirytable align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                            id="kt_table_users">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>


                                                    <th>Status</th>
                                                    <th></th>
                                                    <th>Product URL</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                <?php
                                                include('./codes/db.php');
                                                // Perform a query to fetch data from the property_requests table
                                                $query = "SELECT id, name, email, phone_number,status,page_url, created_at FROM enqueries ORDER BY id DESC";
                                                $result = $db->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <tr class="even">

                                                            <!-- Display data in table cells -->
                                                            <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                                            <td><?= $row['name'] ?></td>
                                                            <td><?= $row['phone_number'] ?></td>
                                                            <td><?= $row['email'] ?></td>

                                                            <td>
                                                                <select class="form-select form-control enqueries-status-select"
                                                                    name="enqueries_status"
                                                                    data-enqueries-id="<?php echo $row['id']; ?>">
                                                                    <option value="New" <?php echo ($row['status'] == 'New') ? 'selected' : ''; ?>>New</option>
                                                                    <option value="Qualified" <?php echo ($row['status'] == 'Qualified') ? 'selected' : ''; ?>>
                                                                        Qualified</option>
                                                                    <option value="Contacted" <?php echo ($row['status'] == 'Contacted') ? 'selected' : ''; ?>>
                                                                        Contacted</option>
                                                                    <option value="Converted" <?php echo ($row['status'] == 'Converted') ? 'selected' : ''; ?>>
                                                                        Converted</option>
                                                                    <option value="FollowUp" <?php echo ($row['status'] == 'FollowUp') ? 'selected' : ''; ?>>
                                                                        Follow Up</option>
                                                                </select>
                                                            </td>
                                                            <td></td>
                                                            <td><?= $row['page_url'] ?></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                    // Free result set
                                                    $result->free();
                                                } else {
                                                    // Handle the case where no data is found
                                                    echo "<tr><td colspan='5'>No data found</td></tr>";
                                                }

                                                // Close the database connection
                                                $db->close();
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- page-body-wrapper ends -->
            <script src="./js/datatables/datatables.bundle.js"></script>

            <script>
                "use strict";

                var KTUsersList = function () {
                    // Define shared variables
                    var table = document.getElementById('kt_table_users');
                    var datatable;
                    var toolbarBase;
                    var toolbarSelected;
                    var selectedCount;

                    // Private functions
                    var initUserTable = function () {
                        // Set date data order
                        const tableRows = table.querySelectorAll('tbody tr');

                        tableRows.forEach(row => {
                            const dateRow = row.querySelectorAll('td');
                            const lastLogin = dateRow[3].innerText.toLowerCase(); // Get last login time
                            let timeCount = 0;
                            let timeFormat = 'minutes';

                            // Determine date & time format -- add more formats when necessary
                            if (lastLogin.includes('yesterday')) {
                                timeCount = 1;
                                timeFormat = 'days';
                            } else if (lastLogin.includes('mins')) {
                                timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                                timeFormat = 'minutes';
                            } else if (lastLogin.includes('hours')) {
                                timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                                timeFormat = 'hours';
                            } else if (lastLogin.includes('days')) {
                                timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                                timeFormat = 'days';
                            } else if (lastLogin.includes('weeks')) {
                                timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                                timeFormat = 'weeks';
                            }

                            // Subtract date/time from today -- more info on moment datetime subtraction: https://momentjs.com/docs/#/durations/subtract/
                            const realDate = moment().subtract(timeCount, timeFormat).format();

                            // Insert real date to last login attribute
                            dateRow[3].setAttribute('data-order', realDate);

                            // Set real date for joined column
                            const joinedDate = moment(dateRow[5].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
                            dateRow[5].setAttribute('data-order', joinedDate);
                        });

                        // Init datatable --- more info on datatables: https://datatables.net/manual/
                        datatable = $(table).DataTable({
                            "info": false,
                            'order': [],
                            "pageLength": 10,
                            "lengthChange": false,
                            'columnDefs': [{
                                orderable: false,
                                targets: 0
                            }, // Disable ordering on column 0 (checkbox)
                            {
                                orderable: false,
                                targets: 6
                            }, // Disable ordering on column 6 (actions)                
                            ]
                        });

                        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                        datatable.on('draw', function () {
                            initToggleToolbar();
                            handleDeleteRows();
                            toggleToolbars();
                        });
                    }

                    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
                    var handleSearchDatatable = () => {
                        const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
                        filterSearch.addEventListener('keyup', function (e) {
                            datatable.search(e.target.value).draw();
                        });
                    }

                    // Filter Datatable
                    var handleFilterDatatable = () => {
                        // Select filter options
                        const filterForm = document.querySelector('[data-kt-user-table-filter="form"]');
                        const filterButton = filterForm.querySelector('[data-kt-user-table-filter="filter"]');
                        const selectOptions = filterForm.querySelectorAll('select');

                        // Filter datatable on submit
                        filterButton.addEventListener('click', function () {
                            var filterString = '';

                            // Get filter values
                            selectOptions.forEach((item, index) => {
                                if (item.value && item.value !== '') {
                                    if (index !== 0) {
                                        filterString += ' ';
                                    }

                                    // Build filter value options
                                    filterString += item.value;
                                }
                            });

                            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
                            datatable.search(filterString).draw();
                        });
                    }

                    // Reset Filter
                    var handleResetForm = () => {
                        // Select reset button
                        const resetButton = document.querySelector('[data-kt-user-table-filter="reset"]');

                        // Reset datatable
                        resetButton.addEventListener('click', function () {
                            // Select filter options
                            const filterForm = document.querySelector('[data-kt-user-table-filter="form"]');
                            const selectOptions = filterForm.querySelectorAll('select');

                            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
                            selectOptions.forEach(select => {
                                $(select).val('').trigger('change');
                            });

                            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                            datatable.search('').draw();
                        });
                    }


                    // Delete subscirption
                    // Delete subscription
                    var handleDeleteRows = () => {
                        // Select all delete buttons
                        const deleteButtons = table.querySelectorAll('[data-kt-users-table-filter="delete_row"]');

                        deleteButtons.forEach(d => {
                            // Delete button on click
                            d.addEventListener('click', function (e) {
                                e.preventDefault();

                                // Select parent row
                                const parent = e.target.closest('tr');

                                // Get user name
                                const userName = parent.querySelectorAll('td')[1].querySelectorAll('a')[1].innerText;

                                // Get the user ID from the data attribute
                                const userId = e.target.getAttribute('data-user-id');

                                // Show a confirmation dialog to delete the user
                                Swal.fire({
                                    text: "Are you sure you want to delete " + userName + "?",
                                    icon: "warning",
                                    showCancelButton: true,
                                    buttonsStyling: false,
                                    confirmButtonText: "Yes, delete!",
                                    cancelButtonText: "No, cancel",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-danger",
                                        cancelButton: "btn fw-bold btn-active-light-primary"
                                    }
                                }).then(function (result) {
                                    if (result.value) {
                                        // Send an AJAX request to delete the user
                                        // Show loading indication
                                        e.target.setAttribute('data-kt-indicator', 'on');
                                        // Disable the button to avoid multiple clicks
                                        e.target.disabled = true;

                                        // Send a fetch request to delete the user
                                        fetch('delete_employe.php?userId=' + userId, {
                                            method: 'DELETE',
                                        })
                                            .then(response => response.json())
                                            .then(data => {
                                                // Remove loading indication
                                                e.target.removeAttribute('data-kt-indicator');
                                                // Enable the button
                                                e.target.disabled = false;

                                                if (data.success) {
                                                    // Remove the current row from the table
                                                    datatable.row($(parent)).remove().draw();
                                                    // Detect checked checkboxes
                                                    toggleToolbars();
                                                    // Show a success message using SweetAlert
                                                    Swal.fire({
                                                        text: "User " + userName + " deleted successfully.",
                                                        icon: "success",
                                                        customClass: {
                                                            confirmButton: "btn fw-bold btn-primary"
                                                        }
                                                    });
                                                } else {
                                                    // Show an error message using SweetAlert
                                                    Swal.fire({
                                                        text: "User deletion failed.",
                                                        icon: "error",
                                                        customClass: {
                                                            confirmButton: "btn fw-bold btn-primary"
                                                        }
                                                    });
                                                }
                                            })
                                            .catch(error => {
                                                console.log("Error: " + error);
                                            });
                                    }
                                });
                            });
                        });
                    }






                    // Toggle toolbars
                    const toggleToolbars = () => {
                        // Select refreshed checkbox DOM elements 
                        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

                        // Detect checkboxes state & count
                        let checkedState = false;
                        let count = 0;

                        // Count checked boxes
                        allCheckboxes.forEach(c => {
                            if (c.checked) {
                                checkedState = true;
                                count++;
                            }
                        });

                        // Toggle toolbars
                        if (checkedState) {
                            selectedCount.innerHTML = count;
                            toolbarBase.classList.add('d-none');
                            toolbarSelected.classList.remove('d-none');
                        } else {
                            toolbarBase.classList.remove('d-none');
                            toolbarSelected.classList.add('d-none');
                        }
                    }

                    return {
                        // Public functions  
                        init: function () {
                            if (!table) {
                                return;
                            }

                            initUserTable();

                            handleSearchDatatable();
                            handleResetForm();
                            handleDeleteRows();
                            handleFilterDatatable();

                        }
                    }
                }();
            </script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script>
                var datatable;
                // Assuming you have a table element with an ID 'kt_ecommerce_enrolled_students_table'
                var table = document.getElementById('kt_table_users');

                var handleChangeStatus = () => {
                    // Select all status dropdowns
                    const statusDropdowns = table.querySelectorAll('[name="enqueries_status"]');

                    statusDropdowns.forEach(statusDropdown => {
                        // Status dropdown on change
                        statusDropdown.addEventListener('change', function () {
                            const studentId = $(this).closest('tr').find('[name="enqueries_status"]').data('enqueries-id');

                            const newUserStatus = this.value;

                            // SweetAlert2 pop up
                            Swal.fire({
                                text: `Are you sure you want to change the status to ${newUserStatus}?`,
                                icon: "warning",
                                showCancelButton: true,
                                buttonsStyling: false,
                                confirmButtonText: "Yes, change it!",
                                cancelButtonText: "No, cancel",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-success",
                                    cancelButton: "btn fw-bold btn-active-light-primary"
                                }
                            }).then(function (result) {
                                if (result.value) {
                                    // Make an Ajax request to update the status
                                    $.ajax({
                                        url: './codes/enquiery.php', // Update with the correct PHP file
                                        method: 'POST',
                                        data: {
                                            enqueries_id: studentId,
                                            newUserStatus: newUserStatus
                                        },
                                        success: function (response) {
                                            if (response.success) {
                                                Swal.fire({
                                                    text: `Status changed to ${newUserStatus} successfully!`,
                                                    icon: "success",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "Ok, got it!",
                                                    customClass: {
                                                        confirmButton: "btn fw-bold btn-primary",
                                                    }
                                                });
                                            } else {
                                                Swal.fire({
                                                    text: `Failed to change status to ${newUserStatus}.`,
                                                    icon: "error",
                                                    buttonsStyling: false,
                                                    confirmButtonText: "Ok, got it!",
                                                    customClass: {
                                                        confirmButton: "btn fw-bold btn-primary",
                                                    }
                                                });
                                            }
                                        },
                                        error: function () {
                                            Swal.fire({
                                                text: `An error occurred while changing the status to ${newUserStatus}.`,
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn fw-bold btn-primary",
                                                }
                                            });
                                        }
                                    });
                                } else {
                                    // Reset the dropdown to the previous status if the user cancels
                                    statusDropdown.value = statusDropdown.getAttribute('data-previous-value');
                                }
                            });
                        });
                    });
                }

                // Call the function to initialize the status change functionality
                handleChangeStatus();
            </script>

            <?php include('inc/footer.php') ?>