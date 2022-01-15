<?php
include "header.php";
$login_author = $_SESSION['id'];

?>

<div class="page-heading">
    <h3>All Blog post</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <!-- <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Followers</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Save post</h6>
                                    <h6 class="font-extrabold mb-0">100</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- content start here -->
            <div class="row">
                <div class="col-lg-12">
                    <h2>Blog Management</h2>
                    <?php

                    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

                    if ($do == 'Manage') {
                        // echo "this is manage";
                    ?>
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>All Users Info</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <th>SL.</th>
                                    <th>Title</th>
                                    <th>Thumbnail</th>
                                    <th>Category</th>
                                    <th>Publish By</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $select_query = "SELECT * FROM post";
                                        $all_post     = mysqli_query($db, $select_query);
                                        $count        = 0;
                                        while ($row =  mysqli_fetch_assoc($all_post)) {
                                            $post_id     = $row['post_id'];
                                            $title       = $row['title'];
                                            $description =    $row['description'];
                                            $thumbnail   =    $row['thumbnail'];
                                            $category_id =   $row['category_id'];
                                            $author_id   =   $row['author_id'];
                                            $postDate    =   $row['postDate'];
                                            $count++;
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $count; ?>
                                        </td>
                                        <td>
                                            <?php echo $title; ?>
                                        </td>
                                        <td>
                                            <?php
                                                    if (empty($thumbnail)) {
                                                    ?>
                                            <img src="assets/images/post/default.jpg" alt="defaultimg"
                                                class="img-avater">
                                            <?php
                                                    } else {
                                                    ?>
                                            <img src="assets/images/post/<?php echo $thumbnail; ?>"
                                                alt="avaterimg" class="img-avater">
                                            <?php
                                                    }
                                                    ?>
                                        </td>

                                        <td>
                                            <?php
                                                    $sql     = "SELECT * FROM category WHERE c_id ='$category_id'";
                                                    $all_cat = mysqli_query($db, $sql);

                                                    while ($row = mysqli_fetch_assoc($all_cat)) {
                                                        $c_id   = $row['c_id'];
                                                        $c_name = $row['c_name'];
                                                    }

                                                    echo $c_name;


                                                    ?>
                                        </td>
                                        <td>
                                            <?php
                                                    $sql        = "SELECT * FROM users WHERE id ='$author_id'";
                                                    $all_author = mysqli_query($db, $sql);

                                                    while ($row = mysqli_fetch_assoc($all_author)) {
                                                        $id   = $row['id'];
                                                        $name = $row['name'];
                                                    }

                                                    echo $name;


                                                    ?>
                                        </td>
                                        <td>
                                            <?php echo $postDate; ?>
                                        </td>


                                        <td> <a href="" data-bs-toggle="modal"
                                                data-bs-target="#delete<?php echo $post_id ?>"><i
                                                    class="bi bi-trash cicon"></i></a>
                                            <a
                                                href="blog.php?do=Edit&id=<?php echo $post_id; ?>"><i
                                                    class="bi bi-pencil sicon "></i></a>

                                            <div class="modal fade"
                                                id="delete<?php echo $post_id ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure
                                                                Want To Delete This Post?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a href="blog.php?do=Delete&deletePost=<?php echo $post_id ?>"
                                                                class="btn btn-danger">yes</a>
                                                            <a href="" class="btn btn-primary"
                                                                data-bs-dismiss="modal">No</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                        ?>

                                </tbody>

                            </table>
                            <div class="col-md-12 col-lg-12">
                                <a href="blog.php?do=Add" class="btn btn-success btn-block">
                                    Add New Post
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    } else if ($do == 'Add') {
                        // echo "this is Add";
                    ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-titile">Add New Post</h3>
                        </div>
                        <div class="card-body">
                            <form action="blog.php?do=Insert" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">Post Titile</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category Name</label>
                                            <select name="category_id" class="form-control">
                                                <option selected disabled>Select Your Category✍️</option>
                                                <?php

                                                    $sql     = "SELECT * FROM category WHERE c_status=1 ";
                                                    $all_cat = mysqli_query($db, $sql);
                                                    while ($row = mysqli_fetch_assoc($all_cat)) {

                                                        $c_id    = $row['c_id'];
                                                        $c_name  = $row['c_name'];

                                                    ?>
                                                <option
                                                    value="<?php echo $c_id; ?>">
                                                    <?php echo $c_name; ?>
                                                </option>
                                                <?php
                                                    }
                                                    ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" cols="10" rows="5"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Post Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="publish" class="btn btn-primary"
                                                value="Publish Post">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    } else if ($do == "Insert") {
                        // echo "this is Insert";
                        if (isset($_POST['publish'])) {
                            $title          = mysqli_real_escape_string($db, $_POST['title']);
                            $description    = mysqli_real_escape_string($db, $_POST['description']);
                            $category_id    = $_POST['category_id'];
                            $thumbnail      = $_FILES['thumbnail']['name'];
                            $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
                            // $author_id      = 1;

                            #image file name chnage and move image to the folder

                            $rand_number = rand(0, 1000000);
                            $image_file  = $rand_number . $thumbnail;
                            move_uploaded_file($thumbnail_temp, "assets/images/post/" .  $image_file);

                            $insert_query = "INSERT INTO post(title,description,thumbnail,category_id,author_id, postDate) VALUES ('$title','$description','$image_file','$category_id','$login_author', now() )";
                            $add_post     = mysqli_query($db, $insert_query);
                            if ($add_post) {
                                header('Location: blog.php');
                            } else {
                                die("Post insert error!!" . mysqli_error($db));
                            }
                        }
                    } else if ($do == 'Edit') {
                        // echo "this is Edit";
                        $post_id         = $_GET['id'];
                        $post_edit_quray = "SELECT * FROM post WHERE post_id  ='$post_id'";
                        $edit_result     = mysqli_query($db, $post_edit_quray);
                        while ($row = mysqli_fetch_assoc($edit_result)) {
                            $post_id     = $row['post_id'];
                            $title       = $row['title'];
                            $description =    $row['description'];
                            $thumbnail   =    $row['thumbnail'];
                            $category_id =   $row['category_id'];
                            $author_id   =   $row['author_id'];
                            $postDate    =   $row['postDate'];

                        ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-titile">Edit Your Post Post</h3>
                        </div>
                        <div class="card-body">
                            <form action="blog.php?do=Update" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="title">Post Titile</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                autocomplete="off" required
                                                value="<?php echo $title; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category Name</label>
                                            <select name="category_id" class="form-control">
                                                <option disabled>Select Your Category✍️</option>
                                                <?php
                                                        $sql     = "SELECT * FROM category WHERE c_status=1 ";
                                                        $all_cat = mysqli_query($db, $sql);
                                                        while ($row = mysqli_fetch_assoc($all_cat)) {

                                                            $c_id    = $row['c_id'];
                                                            $c_name  = $row['c_name'];

                                                        ?>
                                                <option
                                                    value="<?php echo $c_id; ?>"
                                                    <?php if ($c_id == $category_id) {
                                                                                                        echo "selected";
                                                                                                    } ?>>
                                                    <?php echo $c_name; ?>
                                                </option>
                                                <?php
                                                        }
                                                        ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" cols="10" rows="5"
                                                class="form-control"><?php echo $description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Post Thumbnail</label>
                                            <?php

                                                    if (!empty($thumbnail)) {
                                                    ?>
                                            <img src="assets/images/post/<?php echo $thumbnail; ?>"
                                                alt="" style="width: 80px; height: 80px; margin-bottom:5px;"
                                                class="d-block">
                                            <?php
                                                    } else {
                                                    ?>
                                            <img src="assets/images/post/test.jpg" alt=""
                                                style="width: 80px; height: 80px; margin-bottom:5px;" class="d-block">
                                            <?php
                                                    }

                                                    ?>
                                            <input type="file" name="thumbnail" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="update"
                                                value="<?php echo $post_id ?>">
                                            <input type="submit" name="publish" class="btn btn-primary"
                                                value="Update Post">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php

                        }
                    } else if ($do == 'Update') {
                        // echo "this is update";
                        if (isset($_POST['update'])) {
                            # code...
                            $the_update_id  = $_POST['update'];
                            $title          = mysqli_real_escape_string($db, $_POST['title']);
                            $description    = mysqli_real_escape_string($db, $_POST['description']);
                            $category_id    = $_POST['category_id'];
                            $thumbnail      = $_FILES['thumbnail']['name'];
                            $thumbnail_temp = $_FILES['thumbnail']['tmp_name'];
                            $author_id      = 1;

                            //for image code
                            if (!empty($thumbnail)) {

                                //Delete images from folder and database

                                // $del_id = $_GET['deleteUser'];

                                // Delete images from folder and database
                                // $delete_img_query = "SELECT * FROM users WHERE id ='$del_id'";
                                // $del_img = mysqli_query($db, $delete_img_query);
                                // while ($row = mysqli_fetch_assoc($del_img)) {
                                //     $user_img = $row['image'];
                                // }
                                // unlink("assets/images/users/$user_img");


                                $rand_number = rand(0, 1000000);
                                $imageFile   = $rand_number . $thumbnail;
                                move_uploaded_file($profile_tmp, "assets/images/post/" . $imageFile);

                                $sql         = "UPDATE post SET title='$title',description ='$description',category_id='$category_id',author_id ='$author_id',thumbnail ='$imageFile' WHERE post_id ='$the_update_id' ";
                                $update_post = mysqli_query($db, $sql);
                                if ($update_post) {
                                    header("Location: blog.php?do=Manage");
                                } else {
                                    die("Update faild" . mysqli_error($db));
                                }
                            } else {
                                $sql         = "UPDATE post SET title='$title',description ='$description',category_id='$category_id',author_id ='$author_id' WHERE post_id ='$the_update_id' ";
                                $update_post = mysqli_query($db, $sql);
                                if ($update_post) {
                                    header("Location: blog.php?do=Manage");
                                } else {
                                    die("Update faild" . mysqli_error($db));
                                }
                            }
                        }
                    } else if ($do == 'Delete') {
                        // echo "this is Delete";
                        if (isset($_GET['deletePost'])) {
                            $del_id = $_GET['deletePost'];

                            //Delete images from folder and database
                            $delete_img_query = "SELECT * FROM post WHERE post_id ='$del_id'";
                            $del_thumbnail    = mysqli_query($db, $delete_img_query);
                            while ($row = mysqli_fetch_assoc($del_thumbnail)) {
                                $thumbnail = $row['thumbnail'];
                            }
                            echo $thumbnail;
                            unlink("assets/images/post/$thumbnail");

                            //Delete users from data base
                            $delete_query = "DELETE FROM post WHERE post_id  ='$del_id'";
                            $res          = mysqli_query($db, $delete_query);

                            if ($res) {
                                header('Location: blog.php?do=Manage');
                            } else {
                                die(" Delete Error!!" . mysqli_error($db));
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- content end here -->
        </div>
    </section>
</div>


<?php
include "footer.php";
