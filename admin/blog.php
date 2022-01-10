<?php
include "header.php";

?>

<div class="page-heading">
    <h3>All Blog post</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="row">
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
            </div>
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
                                        $all_post = mysqli_query($db, $select_query);
                                        $count = 0;
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
                                            <img src="assets/images/post/<?php echo $thumbnail; ?>" alt="avaterimg"
                                                class="img-avater">
                                            <?php
                                                    }
                                                    ?>
                                        </td>

                                        <td>
                                            <?php
                                                    $sql = "SELECT * FROM category WHERE c_id ='$category_id'";
                                                    $all_cat = mysqli_query($db, $sql);

                                                    while ($row = mysqli_fetch_assoc($all_cat)) {
                                                        $c_id = $row['c_id'];
                                                        $c_name = $row['c_name'];
                                                    }

                                                    echo $c_name;


                                                    ?>
                                        </td>
                                        <td>
                                            <?php
                                                    $sql = "SELECT * FROM users WHERE id ='$author_id'";
                                                    $all_author = mysqli_query($db, $sql);

                                                    while ($row = mysqli_fetch_assoc($all_author)) {
                                                        $id = $row['id'];
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
                                            <a href="blog.php?do=Edit&id=<?php echo $post_id; ?>"><i
                                                    class="bi bi-pencil sicon "></i></a>

                                            <div class="modal fade" id="delete<?php echo $post_id ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        echo "this is Add";
                    } else if ($do == "Insert") {
                        echo "this is Insert";
                    } else if ($do == 'Edit') {
                        echo "this is Edit";
                    } else if ($do == 'Update') {
                        echo "this is update";
                    } else if ($do == 'Delete') {
                        echo "this is Delete";
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
?>