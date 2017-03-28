<?php

session_start();
?>
<!DOCTYPE html>
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
        
        <style>
            div.container {
                width: 100%;
                border: 1px solid black;
            }
            
            header, footer {
                padding: 1em;
                color: white;
                background-color: black;
                clear: left;
                text-align: center;
            }
            
            aside {
                float: left;
                max-width: 340px;
                margin: 0;
                padding: 1em;
            }
            
            aside ul {
                list-style-type: none;
                padding: 0;
            }
               
            aside ul a {
                text-decoration: none;
            }
            
            .line {
                margin-left: 10px;
                border-left: 1px solid black;
                padding: 1em;
                overflow: hidden;
            }
        </style>
        
    </head>
    <body>
        <div class="container">
            <!--Header for the Main Page-->
            <header>
                <h1>  Online Shopping </h1>
            </header>
            
            <!--Commands on the side -->
            <form action = "main.php" method = "GET">
                <aside>
                    <ul>
                        <div class ="together">Get All Items By Max Price(Value Must be Entered If Submit Clicked Or Error Thrown)</div> <input type = "number" name = "max"  />
                    </ul>
                        <input class = "button" type="submit" name="price">
                    <ul>
                        <div class ="together">Get All Products From Character</div><select name="characters">
                            <option value="Tracer" type = "text">Tracer</option>
                            <option value="Widomaker" type = "text">Widomaker</option>
                            <option value="Bastion" type = "text">Bastion</option>
                            <option value="Orisa" type = "text">Orisa</option>
                        </select>
                    </ul>
                        <input class = "button" type="submit" name="character">
                    <ul>
                        <div class ="together">Get All Product From Category</div><select name="products">
                            <option value="Clothing" type = "text">Clothing</option>
                            <option value="Figurine" type = "text">Figurine</option>
                            <option value="Replica" type = "text">Replica</option>
                            <option value="Accesories" type = "text">Accesories</option>
                        </select>
                    </ul>
                        <input class = "button" type="submit" name="product"></br>
                    <h3> Choose How To Sort The Data Selected </h3>
                    <ul>
                        Sort Descending By Price<input type="radio"  value = "1" name= "sortPrice"/><br/>
                        Sort Ascending By Price<input type="radio"  value = "2" name= "sortPrice"/><br/>
                        Do not sort<input type="radio"  value = "3" name= "sortPrice"/><br/>
                    </ul>
                </aside>
            </form>
            
            <!--Beginnging of div-->
            <div class="line">
                <!--Cart buttom-->
                <div align = "right">
                   <a class = "button" href = "cart.php?go=false">Cart</a>
                </div>
                
                
                <!--Printing the tables depending on what you click-->
                <?php
                if(isset($_GET['price'])){
                    getPrice($_GET['sortPrice'],$_GET['max']);
                }
                else if(isset($_GET['character']))
                    getCharacter($_GET['characters'],$_GET['sortPrice']);
                else if(isset($_GET['product']))
                    getCategory($_GET['products'],$_GET['sortPrice']);
                else                
                    getNothing();
                ?>
            </div>
            <!--End of the div-->
            
        </div>
    </body>
</html>
<?php
    
    //When user startes up the page 
    function getNothing(){
        echo"
        <div class = \"hide\">
        <body>
        <table class = 'table-fill'>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Add To Cart</th>
            </tr>
        </thead>
        <tbody>
        </div>";
        for($i = 0; $i < 10;$i++){
            echo "
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>";            
        }
    }