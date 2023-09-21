<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <?php
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

    global $fname, $lname, $email, $password, $dob, $mobile, $gender, $country;
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dob = date('Y-m-d', strtotime($_POST['dob']));
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];

        $sql = "INSERT INTO users (fname, lname, email, password, dob, mobile, gender, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssiss", $fname, $lname, $email, $password, $dob, $mobile, $gender, $country);
        if ($stmt->execute()) {
            echo "<script> alert('Account Created! Kindly Log in.'); </script>";
            echo "<script> window.location='login.php'; </script>";
            header('location: /Hackathon%202023/login.php');
        } else {
            echo "<script> alert('Internal server error occured!') </script>";
            echo "<script> window.location='signup.php'; </script>";
            header('location: /Hackathon%202023/signup.php');

        }
        $stmt->close();
        $conn->close();
    }
    ?>
    <div class="bg-no-repeat bg-cover bg-center relative" style="
        background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);
      ">
        <div class="absolute bg-gradient-to-b from-green-500 to-green-400 opacity-60 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex-col flex self-center p-10 sm:max-w-5xl xl:max-w-xl z-10">
                <div class="self-start hidden lg:flex flex-col text-white">
                    <img src="" class="mb-3" />
                    <h1 class="mb-3 font-bold text-8xl pr-20">Let's Talk Finance</h1>
                    <p class="pr-3"></p>
                </div>
            </div>

            <form class="flex justify-center self-center z-10" method="post">
                <div class="p-12 bg-white mx-auto rounded-2xl">
                    <div class="mb-4">
                        <h3 class="font-semibold text-2xl text-gray-800">Sign Up</h3>
                        <p class="text-gray-500">Enter your details to create an account</p>
                    </div>
                    <div class="space-y-5">
                        <div class="space-y-1">
                            <label class="text-sm mr-2 font-medium text-gray-700 tracking-wide">Name</label><br>
                            <input
                                class="w-0.8 mr-3.5 text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="" placeholder="First Name" name="fname" required />
                            <!-- <label class="text-sm font-medium text-gray-700 tracking-wide">Last Name</label> -->
                            <input
                                class="w-0.8 text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="" placeholder="Last Name" name="lname" />
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-medium text-gray-700 tracking-wide">Email</label>
                            <input
                                class="w-full text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="" placeholder="mail@gmail.com" name="email" required/>
                        </div>
                        <div class="space-y-1">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                Password
                            </label>
                            <input
                                class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="password" placeholder="Enter your password" name="password" required/>
                        </div>
                        <div class="space-y-1">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                Date of Birth
                            </label>
                            <input
                                class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="date" name="dob" required/>
                        </div>
                        <div class="space-y-1">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                Mobile
                            </label>
                            <input
                                class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="tel" name="mobile" placeholder="Here goes your number" pattern="[0-9]{10}" required/>
                        </div>
                        <div class="space-y-1">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                Gender
                            </label>
                            <input class="w-1/12 ml-5" type="radio" name="gender" value="M" required/>
                            <label for="" class="mr-8 opacity-80">Male</label>
                            <input class="w-1/12" type="radio" name="gender" value="F" required/>
                            <label for="" class="opacity-80">Female</label>
                        </div>
                        <div class="space-y-1">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide" for="country">
                                Country
                            </label>
                            <select name="country"
                                class="w-full content-center text-base px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-400" required>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="Egypt">Egypt</option>
                                <option value="UAE">UAE</option>
                                <option value="Germany">Germany</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-sm">
                                Existing User?
                                <a href="/Hackathon%202023/login.php" class="text-green-400 hover:text-green-500">
                                    Log in!
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center justify-between"></div>
                        <div>
                            <button type="submit" name="submit"
                                class="w-full flex justify-center bg-green-400 hover:bg-green-500 text-gray-100 p-3 rounded-full tracking-wide font-semibold shadow-lg cursor-pointer transition ease-in duration-500">
                                Sign in
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>