<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory</title>
    </head>
    
    <body>
        <!-- silahkan diganti 
        <div class="navbar">            
            
            <input type="text" placeholder="Search..">
            <a href="#Log Out"> Log Out</a>

        </div>
        -->

        <div class="inventory_table">

            <table>

                <tr class="information">
                    <th scope="col">Image</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Code</th>
                    <th scope="col">Quantity</th>
                </tr>


                <body>

                    <?php
                        $conn = new mysqli('localhost', 
                                           'root', 
                                           '', 
                                           'inventory');
                    ?>

                </body>
                
                

            </table>

        </div>

        
    </body>

</html>