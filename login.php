<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #image {
            margin-top: 10px;
            box-shadow: 5px 5px 5px 5px gray;
            width: 60px;
            ;
            padding: 20px;
            font-weight: 400;
            padding-bottom: 0px;
            height: 40px;
            user-select: none;
            text-decoration: line-through;
            font-style: italic;
            font-size: x-large;
            border: blue 2px solid;
            margin-left: 100px;

        }

        #user-input {
            box-shadow: 5px 5px 5px 5px gray;
            width: auto;
            margin-right: 10px;
            padding: 10px;
            padding-bottom: 0px;
            height: 40px;
            border: red 0px solid;
        }

        input {
            border: 1px black solid;
        }

        .inline {
            display: inline-block;
        }
    </style>
</head>

<body class="bg-gray-200" onload="generate()">
    <?php
    // ob_start();
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
    global $email, $password, $remember_me;

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $log = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password'");
        if (strlen($email) == 0) {
            echo '<script> alert("Please provide an Email"); </script>';
        } elseif (strlen($password) == 0) {
            echo '<script> alert("Please provide a Password"); </script>';
        } elseif (mysqli_num_rows($log) > 0) {
            $data = mysqli_fetch_assoc($log);
            $uid = $data['id'];
            do {
                $token = rand(-9223372036854775808, 9223372036854775807);
                $log = mysqli_query($conn, "SELECT * FROM session WHERE token='$token'");
            } while (0 /*mysqli_num_rows($log)<2*/);
            $sql = "insert into session (token,uid) values ('$token','$uid')";
            if ($conn->query($sql)) {
                setcookie("token", $token);
                header('location: /Hackathon%202023/home.php');
            } else {
                echo '<script> alert("an Internal Error occured"); </script>';
            }

        } else {
            echo '<script> alert("Email or Password incorrect"); </script>';
            echo '<script> window.location="login.php"; </script>';
        }
    }
    ?>
    <div class="bg-no-repeat bg-cover bg-center relative"
        style="
        background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);">
        <div class="absolute bg-gradient-to-b from-blue-500 to-blue-400 opacity-60 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex-col flex self-center p-10 sm:max-w-5xl xl:max-w-xl z-10">
                <div class="self-start hidden lg:flex flex-col text-white">
                    <h1 class="mb-3 font-bold text-8xl pr-20">Let's Talk Finance</h1>
                </div>
            </div>
            <form class="flex justify-center self-center z-10" method="post">
                <div class="p-12 bg-white mx-auto rounded-2xl">
                    <div class="mb-4">
                        <h3 class="font-semibold text-2xl text-gray-800">Sign In</h3>
                        <p class="text-gray-500">Please sign in to your account.</p>
                    </div>
                    <div class="space-y-5">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                            <input
                                class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400"
                                type="" placeholder="mail@gmail.com" name="email" />
                        </div>
                        <div class="space-y-2">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                Password
                            </label>
                            <input
                                class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400"
                                type="password" placeholder="Enter your password" name="password" />
                        </div>
                        <!-- <div class="space-y-2">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                Captcha Code
                            </label>
                            <input
                                class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-400"
                                type="text" placeholder="Enter captcha" id="sub" />
                        </div>
                        <div class="inline" onclick="generate()">
                            <i class="fas fa-sync"></i>
                        </div>
                        <p id="key"></p>
                        <div id="image" class="inline" selectable="False">
                        </div> -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox"
                                    class="h-4 w-4 bg-blue-700 focus:ring-blue-400 border-gray-300 rounded" />
                                <label for="remember_me" class="ml-2 block text-sm text-gray-800">
                                    Remember me
                                </label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="text-blue-400 hover:text-blue-700">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-sm">
                                New User?
                                <a href="/Hackathon%202023/signup.php" class="text-blue-400 hover:text-blue-700">
                                    Register Now!
                                </a>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="submit" onclick="printmsg()"
                                class="w-full flex justify-center bg-blue-400 hover:bg-blue-700 text-gray-100 p-3 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-300">
                                Sign in
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- 
    <script>
        var captcha;
        function generate() {
            document.getElementById("sub").value = "";
            captcha = document.getElementById("image");
            var uniquechar = "";

            const randomchar =
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for (let i = 1; i < 5; i++) {
                uniquechar += randomchar.charAt(
                    Math.random() * randomchar.length)
            }
            captcha.innerHTML = uniquechar;
        }

        function printmsg() {
            const usr_input = document
                .getElementById("submit").value;
                
            if (usr_input == captcha.innerHTML) {
                var s = document.getElementById("key")
                    .innerHTML = "Matched";
                generate();
            }
            else {
                var s = document.getElementById("key")
                    .innerHTML = "not Matched";
                generate();
            }
        }

    </script> -->
</body>

</html>