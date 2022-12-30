<?php
include("inc/db.php");
include("inc/auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("inc/menu.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include("inc/top.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Product list</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sel="SELECT products.*,categories.cat_name from products INNER JOIN categories on  product_cat=cat_id";
                            $rs=$con->query($sel);
                            while($row=$rs->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['cat_name']; ?></td>
                                
                                <td><?php echo $row['product_name']; ?></td>
                                
                                <td><?php echo $row['product_price']; ?></td>
                                
                                <td><img src="product_img/<?php echo $row['product_image'] ?>" style = "width:100px" alt="Unable to display the image"> </td>

                                <td><a href="del-product.php?id=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>

                                <td><a href="edit-product.php?pid=<?php echo $row['product_id']; ?>&cid=<?php echo $row['product_cat']; ?>" class="btn btn-primary">Edit</a></td>
                            </tr>

                            <?php } ?>
                            
                        </tbody>
                    </table>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include("inc/footer.php"); ?>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>