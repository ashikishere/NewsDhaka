<?php
include "inc/header.php";
?>

<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>All <?php
                if (isset($_GET['category'])) {
                    $the_cat_id = $_GET['category'];
                    $sql = "SELECT * FROM category WHERE c_id = '$the_cat_id'";
                    $cat_name = mysqli_query($db, $sql);

                    while ($row = mysqli_fetch_assoc($cat_name)) {
                        $c_id = $row['c_id'];
                        $c_name = $row['c_name'];
                    }
                    echo $c_name;
                }
                
                
                ?> Post Here
                </h1>

                <div class="all-post">
                    <?php
                    
                    if (isset($_GET['category'])) {
                        $the_cat_id = $_GET['category'];
                        $sql = "SELECT * FROM post WHERE category_id = '$the_cat_id'";
                        $all_post_cat = mysqli_query($db, $sql);

                        $the_post_number = mysqli_num_rows($all_post_cat);
                        if ($the_post_number == 0 || $the_post_number < 0) {
                            echo "Opss!! no post found";
                        } else {
                            while ($row = mysqli_fetch_assoc($all_post_cat)) {
                                $post_id = $row['post_id'];
                                $title = $row['title'];
                                $thumbnail = $row['thumbnail'];
                                $description = $row['description'];
                                $category_id = $row['category_id'];
                                $postDate = $row['postDate'];
                                $first25words = implode(' ', array_slice(str_word_count($description, 1), 0, 25)); ?>
                    <div class="single-post">
                        <img src="admin/assets/images/post/<?php echo $thumbnail; ?>"
                            alt="" class="post-img">
                        <a href="single.php?post=<?php echo $post_id; ?>"
                            class="title-name">
                            <h3><?php echo $title; ?>
                            </h3>
                        </a>
                        <p><?php echo $first25words; ?>
                            ........
                            <br>
                            <a href="single.php?post=<?php echo $post_id; ?>"
                                class="btn btn-primary">READ MORE</a>
                        </p>
                        <p>category- <span class="badge bg-success"><?php
                                $sql = "SELECT * FROM category WHERE c_id ='$category_id'";
                                $all_cat = mysqli_query($db, $sql);
                                while ($row = mysqli_fetch_assoc($all_cat)) {
                                    $c_id = $row['c_id'];
                                    $c_name = $row['c_name'];
                                }
        
                                echo $c_name; ?>
                            </span> || posted by - Ashik ||


                            <span>Publish

                                Date:<?php echo $postDate; ?>
                            </span>
                        </p>

                    </div>

                    <?php
                            }
                        }
                    }
                    
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                include "inc/sideber.php";
                ?>
            </div>
        </div>
    </div>

</section>

<?php
include "inc/footer.php";
