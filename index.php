<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order Form</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
        }

        header,
        main,
        footer {
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        fieldset {
            margin-bottom: 20px;
            padding: 10px;
            border: 3px solid #20a6ce;
        }

        legend {
            font-weight: bold;
        }

        label {
            display: block;
            margin: 5px 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group img {
            display: block;
            margin: 10px 0;
            max-width: 100%;
        }

        .processing-message {
            display: none; 
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Order Your Pizza Here</h1>
</header>

<main>
    <?php
    // Procesamiento de formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar datos del formulario
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $num_pizzas = $_POST['num_pizzas'];
        $size = $_POST['size'];
        $shape = $_POST['shape'];
        $crust = $_POST['crust'];
        $toppings = isset($_POST['toppings']) ? $_POST['toppings'] : [];
        $special_instructions = $_POST['special_instructions'];
        $delivery_option = $_POST['delivery_option'];

        // Mostrar mensaje de procesamiento
        echo '<div id="processingMessage" class="processing-message">';
        echo '<img src="processing.gif" alt="Processing Image">';
        echo "<p>We are processing your pizza order, $name. It will be ready in approximately 30 minutes.</p>";
        echo '</div>';
    }
    ?>

    <form id="pizzaForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="showProcessingMessage(event)">
       
        <fieldset>
            <legend>Personal Information</legend>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
        </fieldset>

       
        <fieldset>
            <legend>Pizza Order</legend>
            <div class="form-group">
                <img src="pizza.jpg" alt="A delicious pizza">
            </div>
            <div class="form-group">
                <label for="num_pizzas">Number of Pizzas:</label>
                <input type="number" id="num_pizzas" name="num_pizzas" min="1" max="10" required>
            </div>
            <div class="form-group">
                <label for="size">Size (number of slices):</label>
                <select id="size" name="size">
                    <option value="4">4 slices</option>
                    <option value="6">6 slices</option>
                    <option value="8">8 slices</option>
                    <option value="12">12 slices</option>
                </select>
            </div>
            <div class="form-group">
                <label>Shape:</label>
                <label><input type="radio" name="shape" value="round" checked> Round</label>
                <label><input type="radio" name="shape" value="square"> Square</label>
            </div>
            <div class="form-group">
                <label>Crust Type:</label>
                <label><input type="radio" name="crust" value="thin" checked> Thin Crust</label>
                <label><input type="radio" name="crust" value="deep"> Deep Dish</label>
                <label><input type="radio" name="crust" value="stuffed"> Stuffed Crust</label>
            </div>
            <div class="form-group">
                <label>Toppings:</label>
                <label><input type="checkbox" name="toppings[]" value="pepperoni"> Pepperoni</label>
                <label><input type="checkbox" name="toppings[]" value="mushrooms"> Mushrooms</label>
                <label><input type="checkbox" name="toppings[]" value="onions"> Onions</label>
                <label><input type="checkbox" name="toppings[]" value="pineapple"> Pineapple</label>
                <label><input type="checkbox" name="toppings[]" value="ham"> Ham</label>
                <label><input type="checkbox" name="toppings[]" value="sausage"> Sausage</label>
                <label><input type="checkbox" name="toppings[]" value="bacon"> Bacon</label>
                <label><input type="checkbox" name="toppings[]" value="extra_cheese"> Extra Cheese</label>
            </div>
            <div class="form-group">
                <label for="special_instructions">Special Instructions:</label>
                <textarea id="special_instructions" name="special_instructions" rows="4" cols="50"></textarea>
            </div>
        </fieldset>

        
        <fieldset>
            <legend>Delivery Options</legend>
            <div class="form-group">
                <label for="delivery_option">Delivery Option:</label>
                <select id="delivery_option" name="delivery_option">
                    <option value="takeout">Takeout</option>
                    <option value="delivery">Delivery</option>
                    <option value="eat_in">Eat-in</option>
                </select>
            </div>
        </fieldset>

        
        <div class="form-group">
            <button type="submit">Submit Order</button>
            <button type="reset">Reset Form</button>
        </div>
    </form>

    
    <div id="processingMessage" class="processing-message">
        <img src="processing.gif" alt="Processing Image">
        <p>We are processing your pizza order.</p>
    </div>
</main>

<footer>
    <p>&copy; 2024 Pizza Place HTML assignment Alexis Mora. All rights reserved.</p>
</footer>

<script>
    function showProcessingMessage(event) {
        event.preventDefault(); 
        document.getElementById('pizzaForm').style.display = 'none'; 
        document.getElementById('processingMessage').style.display = 'block'; 
    }
</script>

</body>
</html>
