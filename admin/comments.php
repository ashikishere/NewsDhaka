<?php
include "header.php";
$login_author = $_SESSION['id'];

?>

<div class="page-heading">

</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12 col-md-12">

            <!-- content start here -->
            <div class="row">
                <div class="col-lg-12">
                    <h2>Comments Management</h2>
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
                                    <th>post Title</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $select_query     = "SELECT * FROM comments ORDER BY cmt_id DESC";
                                        $all_comments     = mysqli_query($db, $select_query);
                                        $count            = 0;
                                        while ($row =  mysqli_fetch_assoc($all_comments)) {
                                            $cmt_id              = $row['cmt_id'];
                                            $cmt_post_id         = $row['cmt_post_id'];
                                            $cmt_name            = $row['cmt_name'];
                                            $cmt_email           = $row['cmt_email'];
                                            $cmt_msg             = $row['cmt_msg'];
                                            $cmt_status          = $row['cmt_status'];
                                            $cmt_date            = $row['cmt_date'];
                    
                                            $count++;
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $count; ?>
                                        </td>
                                        <td>
                                            <?php 
                                            
                                            $sql       = "SELECT * FROM post WHERE post_id ='$cmt_post_id'";
                                            $post_name = mysqli_query($db,$sql);
                                            while ($row =  mysqli_fetch_assoc($post_name)) {
                                                $post_id             = $row['post_id'];
                                                $title               = $row['title'];
                                            }
                                            echo $title;

                                            
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                           
                                           echo $cmt_name;
                                           ?>
                                        </td>
                                        <td>
                                            <?php 
                                           
                                           echo  $cmt_email;   

                                           ?>
                                        </td>
                                        <td>
                                            <?php echo $cmt_msg; ?>
                                        </td>
                                        <td>
                                            <?php 
                                           
                                           if ($cmt_status == 1) {
                                              echo '<span class="badge bg-success">Approved</span>';
                                           }else{
                                            echo '<span class="badge bg-danger">Draft</span>';
                                           }
                                           
                                           ?>
                                        </td>
                                        <td>
                                            <?php echo $cmt_date; ?>
                                        </td>
                                        <td> <a href="" data-bs-toggle="modal"
                                                data-bs-target="#delete<?php echo $cmt_id ?>"><i
                                                    class="bi bi-trash cicon"></i></a>
                                            <a
                                                href="comments.php?do=Edit&id=<?php echo $cmt_id; ?>"><i
                                                    class="bi bi-pencil sicon "></i></a>

                                            <div class="modal fade"
                                                id="delete<?php echo $cmt_id ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure
                                                                Want To Delete This comments?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a href="comments.php?do=Delete&deleteComment=<?php echo $cmt_id ?>"
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
                        </div>
                    </div>
                    <?php
                    }  else if ($do == 'Edit') {
                        // echo "this is Edit";
                        $cmt_edit_id         = $_GET['id'];
                        $cmt_edit_quray      = "SELECT * FROM comments WHERE cmt_id  ='$cmt_edit_id'";
                        $edit_result         = mysqli_query($db, $cmt_edit_quray);
                        while ($row = mysqli_fetch_assoc($edit_result)) {
                            $cmt_id              = $row['cmt_id'];
                            $cmt_post_id         = $row['cmt_post_id'];
                            $cmt_name            = $row['cmt_name'];
                            $cmt_email           = $row['cmt_email'];
                            $cmt_msg             = $row['cmt_msg'];
                            $cmt_status          = $row['cmt_status'];
                            $cmt_date            = $row['cmt_date'];

                        ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-titile">Edit Comments</h3>
                        </div>
                        <div class="card-body">
                            <form action="comments.php?do=Update" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="form-group">
                                            <label for="category_id">UPDATE Comments Status</label>
                                            <select name="cmt_status" class="form-control">
                                                <option value="1" <?php if($cmt_status == 1){echo "Selected";} ?>>Approved
                                                </option>
                                                <option value="0" <?php if($cmt_status == 0){echo "Selected";} ?>>Draft
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="updatecomments_id"
                                                value="<?php echo $cmt_id; ?>">
                                            <input type="submit" name="updatecomments" class="btn btn-primary"
                                                value="Update Comment">
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
                        if (isset($_POST['updatecomments'])) {
                            # code...
                            $updatecomments_id  = $_POST['updatecomments_id'];
                            $update_status      =  $_POST['cmt_status'];

                            $sql            = "UPDATE comments SET cmt_status='$update_status' WHERE cmt_id = '$updatecomments_id'";
                            $update_comment = mysqli_query($db ,$sql );

                             if ($update_comment) {
                                header('Location: comments.php?do=Manage');
                            } else {
                                die(" update Error!!" . mysqli_error($db));
                            }
                            
                        }
                    } else if ($do == 'Delete') {
                        // echo "this is Delete";
                        if (isset($_GET['deleteComment'])) {
                            $del_id = $_GET['deleteComment'];
                            //Delete users from data base
                            $delete_query = "DELETE FROM comments WHERE cmt_id  ='$del_id'";
                            $res          = mysqli_query($db, $delete_query);

                            if ($res) {
                                header('Location: comments.php?do=Manage');
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
