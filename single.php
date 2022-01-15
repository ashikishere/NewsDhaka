<?php
    include 'inc/header.php';
?>

<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php

                    if (isset($_GET['post'])) {
                        $the_post_id = $_GET['post'];

                        $sql         = "SELECT * FROM post WHERE post_id = '$the_post_id' ";
                        $single_post = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_assoc($single_post)) {
                            $post_id               = $row['post_id'];
                            $title                 = $row['title'];
                            $thumbnail             = $row['thumbnail'];
                            $description           = $row['description'];
                            $category_id           = $row['category_id'];
                            $postDate              = $row['postDate'];
                            ?>

                <div class="single-post">
                    <img src="admin/assets/images/post/<?php echo $thumbnail; ?>"
                        alt="" class="thumnails">
                    <p>category- <span class="badge bg-success"><?php
                           $sql      = "SELECT * FROM category WHERE c_id ='$category_id'";
                            $all_cat = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_assoc($all_cat)) {
                                $c_id = $row['c_id'];
                            }

                            echo $c_name; ?>
                        </span> || posted by - Ashik ||


                        <span>Publish

                            Date:<?php echo $postDate; ?>
                        </span>
                    </p>
                    <a href="single.php?post=<?php echo $post_id; ?>"
                        class="title-name">
                        <h3><?php echo $title; ?>
                        </h3>
                    </a>
                    <p><?php echo $description; ?>
                    </p>


                </div>

                <div class="all-comments">
                    <h4>Read All Comments</h4>

                    <?php 
                    
                    $sql          = "SELECT * FROM comments WHERE cmt_post_id ='$post_id' AND cmt_status =1 ORDER BY cmt_id ASC";
                    $show_comment = mysqli_query($db, $sql);

                    while($row = mysqli_fetch_assoc($show_comment)){
                        $cmt_id              = $row['cmt_id'];
                        $cmt_post_id         = $row['cmt_post_id'];
                        $cmt_name            = $row['cmt_name'];
                        $cmt_email           = $row['cmt_email'];
                        $cmt_msg             = $row['cmt_msg'];
                        $cmt_status          = $row['cmt_status'];
                        $cmt_date            = $row['cmt_date'];

                        ?>
                    <ul>
                        <li><?php echo $cmt_name; ?>
                        </li>
                        <li><?php echo $cmt_msg; ?>
                        </li>
                    </ul>
                    <?php
                    }     
                    ?>
                </div>
                <div class="comment-here">
                    <form action="" method="POST">
                        <h4>Leave a comment</h4>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="cmt_msg" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="comment_submit" class="btn btn-primary">
                        </div>
                    </form>
                    <?php 
                    
                    if (isset($_POST['comment_submit'])) {
                        $name     = mysqli_real_escape_string($db, $_POST['name']);
                        $email    = mysqli_real_escape_string($db, $_POST['email']);
                        $msg      = mysqli_real_escape_string($db, $_POST['cmt_msg']);
                        $cmt_post = mysqli_real_escape_string($db, $post_id);

                        $insert_query = "INSERT INTO comments(cmt_post_id,cmt_name,cmt_email,cmt_msg,cmt_status,cmt_date) VALUES('$cmt_post','$name','$email','$msg',0, now())";
                        $add_comment  = mysqli_query($db, $insert_query);  
                    }

                    ?>
                </div>
            </div>
            <?php
                        }
                    }

                ?>
            <div class="col-md-4">
                <?php
                    include 'inc/sideber.php';
                ?>
            </div>

        </div>
    </div>
    </div>

</section>

<?php
include 'inc/footer.php';
