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
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small
                            class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                            All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                    class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                    class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Categories</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basics">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="add-category.html">Add A Category</a></li>
                            <li class="nav-item"> <a class="nav-link" href="manage-categories.html">Manage Categories</a></li>

                        </ul>
                    </div>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title"> category-list</span>
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
                       
            </ul>
        </nav>
        <style>
            #image-preview {
                position: relative;
            }

            .img-fluid {
                height: 100px;
                width: 100px;
            }


            .preview-container {
                position: relative;
                display: inline-block;
            }

            .preview-container img {
                display: block;
                max-width: 100%;
                height: auto;
            }

            .preview-container .close-btn {
                background-color: #ff0000;
                color: #ffffff;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                text-align: center;
                line-height: 18px;
                cursor: pointer;
                font-size: 18px;
            }

            .close-btn {
                background-color: #ff0000;
                color: #ffffff;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                text-align: center;
                line-height: 18px;
                cursor: pointer;
                font-size: 18px;
            }

            .cke_notification {
                display: none !important;
                /* Hide the notification */
            }
        </style>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Puja Category</h4>
                                <p class="card-description">
                                    <!-- Basic form layout -->
                                </p>
                                <form id="brandForm" class="forms-sample">
                                    <!-- Existing fields -->
                                    <div class="form-group">
                                        <label for="exampleInputTitle">Title</label>
                                        <input type="text" class="form-control" id="exampleInputTitle"
                                            oninput="generateUrlAndMetaTitle()" placeholder="Title" required>
                                        <div id="titleError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputURL">URL</label>
                                        <input type="text" class="form-control" onchange="convertTourl()"
                                            id="exampleInputURL" placeholder="URL" required>
                                        <div id="urlError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputStatus">Status</label>
                                        <select class="form-control" id="exampleInputStatus" required>
                                            <option value="">Select Status</option>
                                            <option value="active">Published</option>
                                           
                                            <option value="Inactive">Archived</option>
                                        </select>
                                        <div id="statusError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputLongDescription">Description</label>
                                        <textarea class="form-control" id="editor1" placeholder="Description"
                                            required></textarea>
                                        <div id="descriptionError" class="error-message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputLongDescription">Long Description</label>
                                        <textarea class="form-control" id="editor2"
                                            placeholder="Long Description"></textarea>
                                        <div id="longDescriptionError" class="error-message"></div>
                                    </div>
                                    <!-- Brand Logo Upload -->
                                    <div class="form-group">
                                        <label for="logo">Brand Logo Upload</label>
                                        <input type="file" name="logo" id="logo" class="file-upload-default"
                                            accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Logo">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button"
                                                    id="logoUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="logoPreview" class="mt-2"></div>
                                    </div>

                                    <!-- Featured Image Upload -->
                                    <div class="form-group">
                                        <label for="featuredImage">Featured Image Upload</label>
                                        <input type="file" name="featuredImage" id="featuredImage"
                                            class="file-upload-default" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Featured Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button"
                                                    id="featuredImageUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="featuredImagePreview" class="mt-2"></div>
                                    </div>

                                    <!-- Description Image Upload -->
                                    <div class="form-group">
                                        <label for="descriptionImage">Description Image Upload</label>
                                        <input type="file" name="descriptionImage" id="descriptionImage"
                                            class="file-upload-default" accept=".png, .jpg, .jpeg, .webp">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Description Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button"
                                                    id="descriptionImageUpload">Upload</button>
                                            </span>
                                        </div>
                                        <div id="descriptionImagePreview" class="mt-2"></div>
                                    </div>


                                    <div>
                                        <button type="submit" class="btn btn-primary mr-2 mb-4">Submit</button>
                                        <button type="button" class="btn btn-light mb-4"
                                            id="cancelButton">Cancel</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>




                </div>
            </div>

            <script>

                CKEDITOR.replace('editor2');
                function generateUrlAndMetaTitle() {
                    // Get the course name input field and its value
                    const courseNameInput = document.getElementById("exampleInputTitle");
                    const courseName = courseNameInput.value.trim();

                    // Remove special characters and convert spaces to hyphens
                    const formattedName = courseName
                        .toLowerCase() // Convert to lowercase
                        .replace(/[^a-zA-Z0-9\s-]/g, "") // Remove special characters except hyphen and spaces
                        .replace(/\s+/g, "-"); // Convert spaces to hyphens

                    // Replace consecutive hyphens with a single hyphen
                    const finalFormattedName = formattedName.replace(/-+/g, "-");

                    // Remove hyphens at the beginning and end
                    const trimmedName = finalFormattedName.replace(/^-+|-+$/g, "");

                    // Set the course URL input field
                    const courseUrlInput = document.getElementById("exampleInputURL");
                    courseUrlInput.value = trimmedName;
                }

                function convertTourl() {
                    var slugElement = document.getElementById("exampleInputURL");
                    var inputValue = slugElement.value;

                    // Remove leading and trailing spaces and hyphens
                    inputValue = inputValue.replace(/^[ -]+|[ -]+$/g, '');

                    // Replace consecutive spaces and hyphens with a single hyphen
                    inputValue = inputValue.replace(/[ -]+/g, '-');

                    // Replace underscores (_) with hyphens (-)
                    inputValue = inputValue.replace(/_/g, '-');

                    // Convert to lowercase, remove special characters except hyphens, and trim leading/trailing hyphens
                    var sanitizedValue = inputValue.toLowerCase().replace(/[^\w-]+/g, '').trim();

                    slugElement.value = sanitizedValue;
                }
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var brandForm = document.getElementById('brandForm');
                    var titleInput = document.getElementById('exampleInputTitle');
                    var urlInput = document.getElementById('exampleInputURL');
                    var descriptionInput = document.getElementById('editor1');
                    var longDescriptionInput = document.getElementById('editor2');
                    var cancelButton = document.getElementById('cancelButton');
                    var titleError = document.getElementById('titleError');
                    var urlError = document.getElementById('urlError');
                    var descriptionError = document.getElementById('descriptionError');
                    var longDescriptionError = document.getElementById('longDescriptionError');
                    var statusInput = document.getElementById('exampleInputStatus');
                    var logoInput = document.getElementById('logo');
                    var featuredImageInput = document.getElementById('featuredImage');
                    var descriptionImageInput = document.getElementById('descriptionImage');
                    var logoPreviewContainer = document.getElementById('logoPreview');
                    var featuredImagePreviewContainer = document.getElementById('featuredImagePreview');
                    var descriptionImagePreviewContainer = document.getElementById('descriptionImagePreview');

                    // Handle status input change
                    statusInput.addEventListener('change', function () {
                        var status = statusInput.value;
                        console.log('Status:', status);
                    });

                    // Handle file upload button clicks
                    document.getElementById('logoUpload').addEventListener('click', function () {
                        logoInput.click(); // Trigger click event on logo file input
                    });

                    document.getElementById('featuredImageUpload').addEventListener('click', function () {
                        featuredImageInput.click(); // Trigger click event on featured image file input
                    });

                    document.getElementById('descriptionImageUpload').addEventListener('click', function () {
                        descriptionImageInput.click(); // Trigger click event on description image file input
                    });

                    // Handle form submission
                    brandForm.addEventListener('submit', function (event) {
                        event.preventDefault(); // Prevent default form submission

                        // Clear previous error messages
                        titleError.textContent = '';
                        urlError.textContent = '';
                        descriptionError.textContent = '';
                        longDescriptionError.textContent = '';

                        // Validate form fields
                        if (!titleInput.value.trim()) {
                            titleError.textContent = 'Title is required';
                            return;
                        }

                        if (!urlInput.value.trim()) {
                            urlError.textContent = 'URL is required';
                            return;
                        }

                        if (!descriptionInput.value.trim()) {
                            descriptionError.textContent = 'Description is required';
                            return;
                        }

                        if (!longDescriptionInput.value.trim()) {
                            longDescriptionError.textContent = 'Long Description is required';
                            return;
                        }

                        // Create a new FormData object
                        var formData = new FormData();
                        formData.append('title', titleInput.value);

                        formData.append('url', urlInput.value);
                        formData.append('description', descriptionInput.value);
                        formData.append('status', statusInput.value);
                        formData.append('longDescription', CKEDITOR.instances['editor2'].getData());

                        // Append the files
                        formData.append('logo', logoInput.files[0] || null);
                        formData.append('featuredImage', featuredImageInput.files[0] || null);
                        formData.append('descriptionImage', descriptionImageInput.files[0] || null);

                        // Create an XMLHttpRequest object
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', './codes/brand-process.php');
                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    Swal.fire({
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'Ok, got it!'
                                    }).then(function () {
                                        window.location.href = 'index.php';
                                    });
                                } else {
                                    Swal.fire({
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'Ok, got it!'
                                    });
                                }
                            } else {
                                Swal.fire({
                                    text: 'Error: ' + xhr.statusText,
                                    icon: 'error',
                                    confirmButtonText: 'Ok, got it!'
                                });
                            }
                        };
                        xhr.onerror = function () {
                            Swal.fire({
                                text: 'Request failed',
                                icon: 'error',
                                confirmButtonText: 'Ok, got it!'
                            });
                        };
                        xhr.send(formData);
                    });

                    // Handle cancel button click
                    cancelButton.addEventListener('click', function () {
                        window.location.href = 'index.php'; // Example redirect
                    });

                    // Preview for logo upload
                    logoInput.addEventListener('change', function () {
                        previewImage(this, logoPreviewContainer);
                    });

                    // Preview for featured image upload
                    featuredImageInput.addEventListener('change', function () {
                        previewImage(this, featuredImagePreviewContainer);
                    });

                    // Preview for description image upload
                    descriptionImageInput.addEventListener('change', function () {
                        previewImage(this, descriptionImagePreviewContainer);
                    });

                    // Function to handle image preview
                    function previewImage(input, previewContainer) {
                        const file = input.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function () {
                                const img = document.createElement('img');
                                img.src = reader.result;
                                img.className = 'img-fluid';
                                const closeBtn = document.createElement('span');
                                closeBtn.className = 'close-btn';
                                closeBtn.innerHTML = '&times;';
                                closeBtn.addEventListener('click', function () {
                                    previewContainer.innerHTML = '';
                                    input.value = '';
                                });
                                previewContainer.innerHTML = '';
                                previewContainer.appendChild(img);
                                previewContainer.appendChild(closeBtn);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            previewContainer.innerHTML = '';
                        }
                    }
                });

            </script>

            <?php include('inc/footer.php') ?>