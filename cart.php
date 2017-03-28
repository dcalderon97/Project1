<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
            // When the user clicks on <div>, open the popup
            function myFunction($val) 
            {
                var popup = document.getElementById($val);
                popup.classList.toggle("show");
            }

        </script>
    </head>
    <body>
<?php
session_start();
if (empty($_SESSION['cart']))
{
    echo "Cart is Empty";
}
else
{
    if($_GET['go'] == true)
    {
        $wherein = implode(',',$_SESSION['cart']);
         echo"
                <body>
                <table class = 'table-fill'>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
             
                    </tr>
                </thead>
                <tbody>";
                $servername = getenv('IP');
                $dbPort = 3306;
                $database = "Overwatch";
                $username = getenv('C9_USER');
                $password = "";
                $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
                $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql ="SELECT Product.*
                        FROM Product
                        WHERE Product.productId IN ($wherein)
                        ";
                $stmt = $dbConn->prepare($sql);
                $stmt->execute ();
                $val = 0;
                while ($row = $stmt->fetch())  
                {
                        echo "
                        <tr>
                            <td>
                                <div class = \"popup\" onclick = \"myFunction($val)\">
                                 ".$row['productName']."
                                <span class=\"popuptext\" id=$val>".$row['desc']."</span>
                                </div>
                            </td>
                                <td>"."$".$row['price']."</td>
                        </tr>";
                        $val = $val+1;
                }
    }