<?php
include('config/db_connect.php');
$title = $email = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');
if (isset($_POST['submit'])) {
    //  echo htmlspecialchars($_POST['email']);
    //echo htmlspecialchars($_POST['title']);
    //echo htmlspecialchars($_POST['ingredients']);
    //}
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br />';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email must be a valid email address';
        }
    }
    if (empty($_POST['title'])) {
        $errors['title'] = 'An title is required <br />';
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $title)) {
            $errors['title'] = 'Titlel must be letters and spaces only';
        }
    }
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'At least one ingredients is required <br />';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
    }
    if (array_filter($errors)) {
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
        $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email',
        '$ingredients')";
        if (mysqli_query($conn, $sql)) {
            header('Location:index.php');
        } else {
            echo ' query error:' . mysqli_error($conn);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('tuts/header.php'); ?>
<!-- AJAX PHP  start -->

<head>
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "pizzaname.php?q=" + str, true);
                xmlhttp.send();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
            }
        }
    </script>
</head>
<form action="">
    <label for="fname">Pizza Title name:</label>
    <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
    <p>Hint: <span id="txtHint"></span></p>
</form>
<!-- AJAX PHP end -->
<section class="container grey-text">
    <h4 class="center">（（（ DIY A PIZZA ）））</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label>Pizza Title:</label>
        <input type="text" name="title" value="<?php echo $title ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>
        <label>Ingredients:</label>
        <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="Add to cart" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<!-- OOP PHP  start -->
<section class="container grey-text">
    <?php
    class Pizza
    {
        public $name;
        public $Ingredients;
        public function __construct($name, $Ingredients)
        {
            $this->name = $name;
            $this->Ingredients = $Ingredients;
        }
        public function info()
        {
            echo "The Pizza is {$this->name} and the Ingredients are {$this->Ingredients}.";
        }
    }
    class Meatlover extends Pizza
    {
        public function alone()
        {
            echo "Attention Please!  The chef recommend===>>>>>";
        }
    }

    $Meatlover = new Meatlover("Meatlover", "sausage & meat");
    $Meatlover->alone();
    $Meatlover->info();
    ?>
    <!-- OOP PHP  end -->
    <?php include('tuts/footer.php'); ?>
</section>


</html>