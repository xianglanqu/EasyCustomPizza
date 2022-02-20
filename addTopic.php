<?php
include('config/db_connect.php');
$categories_id_error = '';
$topic_error = '';
$topics_id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM `topics` WHERE topics_id ='$topics_id'";
if ($res = $conn->query($sql)) {
    if ($res->num_rows > 0) {
        while ($row = $res->fetch_array()) {
            $topics_id = $row['topics_id'];
            $categories_id = $row['categories_id'];
            $topic = $row['topic'];
        }
    }
}
if (isset($_POST['submit'])) {
    if ($categories_id_error == '' && $topic_error == '') {
        $categories_id = $_POST['categories_id'];
        $topic = $_POST['topic'];
        // $sql = "UPDATE `topics` SET `categories_id` = '$categories_id', `topic` = '$topic' WHERE `topics`.`topics_id` = $topics_id";
        $sql = "INSERT INTO topics(categories_id,topic)values($categories_id,'$topic')";
        if ($conn->query($sql) === true) {
            header('location:forum.php');
        } else {
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();

        // Close connection
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addTopic</title>
</head>

<body>
    <div class="container">
        <h1 style="background-color: #FF7663">Add Topic</h1>
        <form action="addTopic.php?id=<?php echo $topics_id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h2>Please enter categoryID</h2>
                <h4>Pizza Hut -->categoryID:1</h4>
                <h4>Domino -->categoryID:2</h4>
                <h4>Xianglan Pizza -->categoryID:3</h4>
                <label for="categories_id">CategoryID</label>
                <input type="text" id="categories_id" aria-describedby="error" placeholder="Enter categoryID" name="categories_id" value="<?php if (isset($categories_id)) {
                                                                                                                                                echo $categories_id;
                                                                                                                                            } ?>">
                <small id="error"><?php if (isset($categories_id_error)) {
                                        echo $categories_id_error;
                                    } ?></small>
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <input type="text" class="form-control" id="topic" aria-describedby="error" placeholder="Enter your topic" name="topic" value="<?php if (isset($topic)) {
                                                                                                                                                    echo $topic;
                                                                                                                                                } ?>">
                <small id="error"><?php if (isset($topic_error)) {
                                        echo $topic_error;
                                    } ?></small>
            </div>

            <button type="submit" name="submit">Submit</button>
            <button><a href="forum.php">Back to Forum</a></button>
        </form>
    </div>
</body>

</html>