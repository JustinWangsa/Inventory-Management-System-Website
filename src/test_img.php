<?php
    include('connect.php');
    if(isset($_POST['submit'])){
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'image/'.$file_name;

        // $query = mysqli_query($con, "insert into items(product_image) values ('$file_name')");

        if(move_uploaded_file($tempname, $folder)){
                $query = mysqli_query($con, "INSERT INTO items (
                    product_code,
                    product_remarks,
                    product_quantity,
                    product_image
                ) VALUES (
                    'ex',
                    'ex',
                    1,
                    '$file_name'
                )");
            echo "<h2>File Upload Successfully<h2>";
        }else{
            echo "<h2>File NOT Uploaded<h2>";
        }
}
?>

<!----
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <br/><br/>
        <button type="submit" name="submit">submit</button>
    </form>
    <div>

        <?php
            $res = mysqli_query($con, "select * from items");
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <img src = "image/<?php echo $row["product_image"]; ?>" />
        <?php } ?>
        
</div>
</body>
</html>