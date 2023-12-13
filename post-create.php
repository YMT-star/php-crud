<?php 
    session_start(); 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    .container {
        padding: 50px;
    }
    </style>
</head>

<body>
    <!-- INSERT INTO table_name(column1,column2,column3,...)VALUES(value1,value2,value3,...) -->
    <?php
        require "connect.php";
        $titleError = "";
        $descError = "";
        $title = "";
        $desc = "";
        if(isset($_POST['create_post_btn'])){
            $title = $_POST['title'];
            $desc = $_POST['description'];
            // $title = isset($_POST['title']) ? $_POST['title'] : '';
            // $desc = isset($_POST['description']) ? $_POST['description'] : '';
            if(empty($title)){
                $titleError = "The title field is required";
            }
            if(empty($desc)){
                $descError = "The description field is required";
            }
            if(!empty($title) && !empty($desc)){
                mysqli_query($db, "INSERT INTO posts(title,description) VALUES('$title','$desc')");
                $_SESSION["successMsg"] = "A post create successfully";
                header('location:index.php');
            }
           
            
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="card-title">Post Create Form</h2>
                            </div>

                            <div class="col-md-6  ">
                                <a href="index.php" class="btn btn-primary float-end ">
                                    << Back</a>
                            </div>
                        </div>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="form-group py-2">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control <?php if($titleError != ""): ?>
                                    is-invalid <?php endif ?>" placeholder="Enter post Title"
                                    value="<?php echo $title; ?>">
                                <span class="text-danger "><?php echo $titleError; ?><?php echo $titleError; ?></span>

                            </div>
                            <div class="form-group pb-2">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control <?php if($descError != ""): ?>
                                    is-invalid <?php endif ?>"
                                    placeholder="Description..."><?php echo $desc; ?></textarea>
                                <span class="text-danger "><?php echo $descError; ?></span>
                            </div>

                            <div class="card-footer">
                                <button name="create_post_btn" type="submit" class="btn btn-primary ">Create</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>