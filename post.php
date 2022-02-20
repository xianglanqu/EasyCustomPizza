<?php
include('config/db_connect.php');
if (isset($_GET['type'])) {
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    if ($type == 'delete') {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "DELETE FROM posts WHERE posts_id = '$id'";
        if ($conn->query($sql) === true) {
            echo "Record deleted successfully";
            header('location:post.php');
        } else {
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
    }
}

$qtype = $_REQUEST["q"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #posts {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        #posts td,
        #posts th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #posts tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #posts tr:hover {
            background-color: #ddd;
        }

        #posts th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: gray;
            color: white;
        }

        .table_header {
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: baseline;
        }

        .table_header div:first-child {
            flex-basis: 50%;
            font-size: 28px;

        }

        .table_header div:last-child {
            flex-basis: 50%;
            text-align: end;
        }

        .container {
            width: 1280px;
            margin: 20px auto;
        }

        #error {
            text-transform: capitalize;
            color: red;
        }

        li {
            list-style-type: none;
            font-size: 25px;

        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $sql = "SELECT * FROM `posts`  WHERE topics_id='$qtype'";
        if ($ans = $conn->query($sql)) {
            if ($ans->num_rows < 0) {
                echo "No record exist in posts table";
            } else {
        ?>
                <table id="posts">
                    <div class="table_header">
                        <div>Posts List</div>
                        <div><a href="forum.php">Back to Forum</a></div>
                    </div>
                    <tr>
                        <th>postID</th>
                        <th>topicID</th>
                        <th>postName</th>
                        <th>postText</th>
                        <th>Other Options</th>
                    </tr>
                    <?php
                    while ($row = $ans->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $row['posts_id'] ?></td>
                            <td><?php echo $row['topics_id'] ?></td>
                            <td><?php echo $row['postName'] ?></td>
                            <td><?php echo $row['postText'] ?></td>
                            <td>
                                <a href="?type=delete&id=<?php echo $row['posts_id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php  }
                    ?>
                </table>
        <?php
            }
        }
        $ans->free();
        $conn->close();

        ?>
    </div>
    <div class="container">
        <h2>Reply Below</h2>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <button>Reply</button>
        <ul></ul>
    </div>

    <script>
        var btn = document.querySelector('button');
        var text = document.querySelector('textarea');
        var ul = document.querySelector('ul');
        btn.onclick = function() {
            if (text.value == '') {
                alert('Please enter reply');
                return false;
            } else {
                var li = document.createElement('li');
                li.innerHTML = text.value;
                ul.appendChild(li);
            }
        }
    </script>
</body>

</html>