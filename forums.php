<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forums - Let's Talk finance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    if (!isset($_COOKIE["token"])) {
        header('location: /Hackathon%202023/login.php');
    }
    $token = $_COOKIE["token"];

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli(
        $servername,
        $username,
        $password
    );
    if ($conn->connect_error) {
        die("Connection failed: "
            . $conn->connect_error);
    }
    $sql = "use finance";
    $result = ($conn->query($sql));

    $log = mysqli_query($conn, "SELECT uid FROM session WHERE token=$token");
    if (mysqli_num_rows($log) > 0) {
        $data = mysqli_fetch_assoc($log);
        $myuid = $data['uid'];
        $log = mysqli_query($conn, "SELECT * FROM users WHERE id=$myuid");
        if (mysqli_num_rows($log) > 0) {
            $data = mysqli_fetch_assoc($log);
            echo "<h1>Hello, " . $data['fname'] . " " . $data['lname'] . "</h1><br>";
        } else {
            header('location: /Hackathon%202023/login.php');
        }
    } else {
        header('location: /Hackathon%202023/login.php');
    }
    ?>
    <div id="messages">
        <div class="px-10 flex flex-col justify-between">
            <div class="flex flex-col mt-5" style="overscroll-none">

                <?php
                $logforum = mysqli_query($conn, "select * from (SELECT * FROM forum order by time desc LIMIT 20) as r order by time asc");
                while ($row = $logforum->fetch_assoc()) {
                    $id = $row['uid'];
                    if ($id == $myuid) {
                        echo '<div class="flex justify-end"><div class="mb-2 bg-red-100 text-xl rounded-md p-3 pl-5"><div class="text-blue-800">';
                    } else {
                        echo '<div class="flex justify-start"><div class="mb-2 bg-green-100 text-xl rounded-md p-3 pl-5"><div class="text-red-800">';
                    }
                    $userlog = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
                    if (mysqli_num_rows($userlog) > 0) {
                        $userdata = mysqli_fetch_assoc($userlog);
                        if ($userdata['fname'])
                            echo $userdata['fname'] . " " . $userdata['lname'] . "</div> " . $row["content"] . "</div></div>";
                    } else {
                        echo "Deleted User</div> " . $row["content"] . "</div></div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        
        function ref() {
            $('#messages').load(document.URL + ' #messages');
            document.getElementById("message").focus();
        }
        $(window).load(function(){document.getElementById("message").focus();});
        setInterval("ref()", 500);
    </script>
    <?php
    if (isset($_POST['submit'])) {
        $message = $_POST['message'];
        if (strlen($message) != 0) {
            $sql = "insert into forum (uid,content) values ('$myuid', '$message');";
            if (!mysqli_query($conn, $sql)) {
                echo '<script> alert("Message cannot be sent")';
            }
        }
        echo "<script>ref();</script>";
    }
    ?>
    <form class="sticky w-full flex bottom-0 px-2 bg-white" action="#error-check" id="error-check" method="post">
        <input class="w-5/6 my-2 px-4 border-2 bg-transparent h-12" type="text" id="message" placeholder="Enter Message"
            autofocus="autofocus" name="message" />
        <button type="submit" name="submit" class="w-1/6 my-2 border-2 bg-blue-800 text-white font-bold rounded-md">
            Send
        </button>
    </form>
</body>
</html>