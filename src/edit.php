<?php
    include("connect.php");

    $id = "";
    $product_code = "";
    $product_remarks = "";
    $product_quantity = "";
    $product_image = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET["id"])){
            header("location: index.php");
        }
        $id = $_GET['id'];

        $sql = "SELECT * FROM items WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        if(!$row){
            header("location: index.php");
            exit();
        }

            $product_code = $row["product_code"] ?? '';
            $product_remarks = $row["product_remarks"] ?? '';
            $product_quantity = $row["product_quantity"] ?? '';
            $product_image = $row["product_image"] ?? '';

    }else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST["id"];
            $product_code = $_POST["code"];
            $product_remarks = $_POST["remarks"];
            $product_quantity = $_POST["quantity"];
            $product_image = $_POST["image"];

        do{
            $sql = "UPDATE items 
            SET product_code = '$product_code', 
                product_remarks = '$product_remarks', 
                product_quantity = '$product_quantity', 
                product_image = '$product_image' 
                WHERE id = $id";

            $result = mysqli_query($conn, $sql);
            if(!$result){
                break; // if invalid will terminate
            }

            header("location: index.php");
            exit();
        }while(false);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>Edit Page</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" value="<?php echo $product_code; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Remarks</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="remarks" value="<?php echo $product_remarks; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $product_quantity; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="image" value="<?php echo $product_image; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="index.php" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
