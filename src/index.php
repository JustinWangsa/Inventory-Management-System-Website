<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>


    <body>
        <!-- <form method="post" enctype=""></form> -->
        
        <!-- login page-->
        <div class="login">
            <!---login blm buat. JANGAN LUPA GANTI TABLE to LOGIN (tunggu ber buat user id ) -->
            <form class="login-form" action="./table.php" method="post">

                <div class="Username">

                    <div class="Username"> 
                        <label for="Username">Username:</label>
                        <input type="Username" id="Username" name="Username">
                    </div>

                    <div class="password"> 
                        <label for="password">password:</label>
                        <input type="password" id="password" name="password">
                    </div>

                    <button class="login_btn"> log in </button>
                
                </div>
            </form>

        </div>


    </body>
</html>