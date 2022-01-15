<?php
include "inc/header.php";
?>

<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>All RESULT
                </h1>

                <div class="all-post">
                    <?php
                    
                    if (isset($_POST['findsearch'])) {
                       
                        $the_search = $_POST['search'];
                        
                        $sql                = "SELECT * FROM post WHERE title LIKE '%$the_search%' ";
                        $all_search_content = mysqli_query($db, $sql);

                        $result = mysqli_num_rows($all_search_content);
                        if ($result == 0 ) {
                            echo "Opss!! nothing found";
                        } else {
                            while ($row = mysqli_fetch_assoc($all_search_content)) {
                                $post_id        = $row['post_id'];
                                $title          = $row['title'];
                                $thumbnail      = $row['thumbnail'];
                                $description    = $row['description'];
                                $category_id    = $row['category_id'];
                                $postDate       = $row['postDate'];
                                $author_id      = $row['author_id'];
                                $first25words   = implode(' ', array_slice(str_word_count($description, 1), 0, 25)); ?>
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
                                $sql     = "SELECT * FROM category WHERE c_id ='$category_id'";
                                $all_cat = mysqli_query($db, $sql);
                                while ($row = mysqli_fetch_assoc($all_cat)) {
                                    $c_id   = $row['c_id'];
                                    $c_name = $row['c_name'];
                                }
        
                                echo $c_name; ?>
                            </span> || posted by - <?php 
                            
                            $sql      = "SELECT * FROM users WHERE id ='$author_id'";
                            $all_cat  = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_assoc($all_cat)) {
                                $_id   = $row['id'];
                                $name  = $row['name'];
                            }

                            echo $name;
                            ?> ||


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
