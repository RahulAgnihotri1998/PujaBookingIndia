<style>
    #sidebarCollapse{
        display:none;
    }
    #sidebar {
            min-width: 250px;
            max-width: 250px;
          background: #005a5c;
            color: #fff;
            transition: all 0.3s;
        }
</style>
<nav id="sidebar">
            <div class="sidebar-header">
            <a href="/"><img src="../img/logo-interior-designers.png" alt="" width="200" height="60"></a>
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a style="color:#000;" href="add-category.php">Add new category</a>
                        </li>
                        <li>
                            <a style="color:#000;" href="categories.php">Categories</a>
                        </li>
                   
                        <!-- <li>
                            <a href="#">Home 3</a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li>
                    <a href="#">About</a>
                </li> -->
                <li class="">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Posts</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li>
                            <a style="color:#000;" href="posts.php">Add new</a>
                        </li>
                        <li>
                            <a style="color:#000;" href="all-posts.php">All Posts</a>
                        </li>
                        <!-- <li>
                            <a href="#">Home 3</a>
                        </li> -->
                    </ul>
                </li>
                <li>
                            <a  href="imagegallary.php"> Gallery</a>
                        </li>
               
              
                <!-- <li>
                    <a href="#">Users</a>
                </li>
                <li>
                    <a href="add-user.php">Add User</a>
                </li> -->
                <li>
                    <a href="logout.php">Logout</a>
                </li>
              
            </ul>

            <!-- <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul> -->
        </nav>