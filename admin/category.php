<?php
include "header.php";

?>

<div class="page-heading">
    <h3>All Categories Information</h3>
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
    </section>
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Category</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" name="cat_name" class="form-control" placeholder="Category Name">
                            <textarea name="cat_desc" class="form-control my-3" rows="4"
                                placeholder="Category Description"></textarea>
                            <input type="submit" class="btn btn-md btn-success" value="Submit" name="submit_btn">
                        </div>
                    </form>


                    <?php 
        
        if(isset($_POST['submit_btn'])){
           $categ_name= $_POST['cat_name'];
           $categ_desc= $_POST['cat_desc'];
        //    echo $categ_name.' '.$categ_desc;

        $insert_query  = "INSERT INTO category (c_name,c_desc) VALUE ('$categ_name','$categ_desc')";
         $result = mysqli_query($db, $insert_query);

         if($result){
            header('Location: category.php');
         }else{
            die("Category insert error!!".mysqli_error($db));
         }

        }
        
        
        ?>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>All categories</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $query= "SELECT * FROM category";
                                $result= mysqli_query($db, $query);
                                $count = 0;
                                
                                while ($row =  mysqli_fetch_assoc($result)) {
                                  $cat_id  =$row['c_id'];
                                  $cat_name=  $row['c_name'];
                                  $cat_desc=  $row['c_desc'];
                                  $count++

                                //   echo $cat_id.' '.$cat_name.' '.$cat_desc.'<br>' ;
                                ?>
                                <tr>
                                    <td class="text-bold-500"><?php echo $count ?></td>
                                    <td class="text-bold-500"><?php echo $cat_name ?></td>
                                    <td class="text-bold-500"><?php echo $cat_desc ?></td>
                                    <td class="text-bold-500">
                                        <a href=""><i class="bi bi-trash cicon"></i></a>
                                        <a href=""><i class="bi bi-pencil sicon "></i></a>
                                    </td>
                                </tr>
                                <style>
                                .cicon:hover {
                                    color: red;
                                }

                                .sicon:hover {
                                    color: green;
                                }
                                </style>
                                <?php
                                }
   
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include "footer.php";
?>