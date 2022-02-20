<?php
function getSqlInfo($sql)
{ //connect to database
  include('config/db_connect.php');
  //write query for all pizzas
  // $sql = 'SELECT * FROM categories ORDER BY categories_id';
  // make query & get result
  $result = mysqli_query($conn, $sql);
  //fetch the resulting rows as an array
  $infos = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);

  return $infos;
  // print_r($categories);
  // explode(',', $pizzas[0]['ingredients']);
}


$categories = getSqlInfo('SELECT * FROM categories ORDER BY categories_id');

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>forum</title>
  <style>
    .dropbtn {
      background-color: #3498DB;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover,
    .dropbtn:focus {
      background-color: #2980B9;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
      float: left;
      margin: 0 20px;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #ddd
    }

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {
      display: block;
    }

    .back {
      float: right;
    }
  </style>
  <script>
    function myCategory() {
      document.getElementById("myDropdown1").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

    function myTopic() {
      document.getElementById("myDropdown2").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

    function myFun1(categorys_type, ca_id) {
      var elem = document.getElementById("myButton1");
      elem.innerHTML = categorys_type;
      jump(ca_id);
    }

    function myFun2(topic_type, to_id) {
      var elem = document.getElementById("myButton2");
      elem.innerHTML = topic_type;
      console.log(topic_type);
      console.log(to_id);
      var button2 = document.getElementById("button2");
      button2.innerHTML = '';
      var post2 = document.createElement('a');
      post2.id = 'post2';
      post2.href = 'post.php?q=' + to_id;
      post2.innerText = topic_type + ' Posts';
      button2.appendChild(post2);
    }


    function jump(ca_id) {
      if (ca_id.length == 0) {
        document.getElementById("myButton2").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "topic.php?q=" + ca_id, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let topicMap = JSON.parse(this.responseText);
            document.getElementById("myButton2").innerHTML = 'Topic';
            var myDropdown2 = document.getElementById('myDropdown2');
            myDropdown2.innerHTML = '';
            var arr = Object.values(topicMap);
            for (i = 0; i < arr.length; i++) {
              var info = arr[i];
              var haskell = document.createElement('p');
              haskell.id = 'haskell';
              haskell.setAttribute("onclick", "myFun2(" + "'" + info.topic + "'," + info.topics_id + ");");
              haskell.innerText = topicMap[i].topic;
              myDropdown2.appendChild(haskell);


            }
          }

        }
      }
    }
  </script>
</head>

<body>

  <div class="dropdown">
    <button onclick="myCategory()" class="dropbtn" id="myButton1">Category</button>
    <div id="myDropdown1" class="dropdown-content">
      <?php foreach ($categories as $category) : ?>
        <p onclick="myFun1('<?php echo htmlspecialchars($category['type']); ?>',<?php echo htmlspecialchars($category['categories_id']); ?>)"><?php echo htmlspecialchars($category['type']); ?></p>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="dropdown">
    <button onclick="myTopic()" class="dropbtn" id="myButton2">Topic</button>
    <div id="myDropdown2" class="dropdown-content">
    </div>
  </div>
  <div class="dropdown"><button id="button2" class="dropbtn">Posts</button></div>
  <div>
    <button class="dropbtn"><a href="addTopic.php" class="dropbtn">Add Topic</a></button>
  </div>
  <div>
    <a href="index.php" class="back">Back to Homepage</a>
  </div>
  <div class="">
    <?php
    $sql = "SELECT * FROM `reply`";
    if ($ans = $conn->query($sql)) {
      if ($ans->num_rows < 0) {
        echo "No record exist in reply table";
      } else {
    ?>
        <table id="reply">
          <div class="table_header">
            <div>Reply To this Topic</div>
            <div><a href="addReply.php" class="btn btn-primary">Add Reply</a></div>
          </div>
          <tr>
            <th>TOPICID</th>
            <th>ReplyText</th>
          </tr>
          <?php
          while ($row = $ans->fetch_array()) {
          ?>
            <tr>
              <td><?php echo $row['topics_id'] ?></td>
              <td><?php echo $row['replyText'] ?></td>

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
</body>

</html>