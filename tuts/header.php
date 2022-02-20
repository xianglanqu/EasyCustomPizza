<?php
session_start();

if ($_SERVER['QUERY_STRING'] == 'noname') {

    unset($_SESSION['name']);
}
$name = $_SESSION['name'] ?? 'Guest';
//get cookie
$gender = $_COOKIE['gender'] ?? 'Unknown';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xianglan Pizza</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand {
            background: #cbb09c !important;
        }

        .brand-text {
            color: #cbb09c !important;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }

        .pizza {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }

        .container a:nth-child(2) {
            margin-left: 250px;
            color: brown;
            border: 2px solid brown;
        }
    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Xianglan Pizza</a>
            <a href="forum.php" class="brand-logo ">Forum</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text"> Hello <?php echo htmlspecialchars($name); ?></li>
                <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>
</body>