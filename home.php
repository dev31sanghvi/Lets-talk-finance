<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./home.css" />
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
    ?>

    <!-- component -->
    <div class="min-h-screen bg-white">

        <style>
            @media only screen and (min-width: 768px) {
                .parent:hover .child {
                    opacity: 1;
                    height: auto;
                    overflow: none;
                    transform: translateY(0);
                }

                .child {
                    opacity: 0;
                    height: 0;
                    overflow: hidden;
                    transform: translateY(-10%);
                }
            }
        </style>

        <nav class="flex px-4 border-b md:shadow-lg items-center relative">
            <div class="text-lg font-bold md:py-0 py-4">
                Let<span style="color: rgb(55, 55, 250);">'</span>s Talk <span
                    style="color: rgb(55, 55, 250);">Finance</span>
            </div>
            <ul class="md:px-2 ml-auto font-semibold md:flex md:space-x-2 absolute md:relative top-full left-0 right-0">
                <li>
                    <a href="#" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="./forums.php" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                        <span>Live Chat</span>
                    </a>
                </li>
                <li class="relative parent">
                    <a href="#" class="flex justify-between md:inline-flex p-4 items-center hover:bg-gray-50 space-x-2">
                        <span>Service</span>
                    </a>

                </li>
                <li>
                    <a href="./landing.html#about" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                        <span>About us</span>
                    </a>
                </li>
                <li>
                    <?php
                    $log = mysqli_query($conn, "SELECT uid FROM session WHERE token=$token");
                    if (mysqli_num_rows($log) > 0) {
                        $data = mysqli_fetch_assoc($log);
                        $id = $data['uid'];
                        $log = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
                        if (mysqli_num_rows($log) > 0) {
                            $data = mysqli_fetch_assoc($log);
                            echo "<span id='greet' class='flex md:inline-flex p-4 items-center hover:bg-gray-50'>" . "Hi,&nbsp;" . "<span style='color: #1E40AF; font-weight: semibold'>" . $data['fname'] . "</span>" . "</span>";
                        } else {
                            header('location: /Hackathon%202023/login.php');
                        }
                    } else {
                        header('location: /Hackathon%202023/login.php');
                    }
                    ?>
                </li>
                <li>
                    <a href="/Hackathon%202023/logout.php" class="flex md:inline-flex p-4 items-center hover:bg-gray-50">
                        <span>Logout</span>
                    </a>
                </li>
                <!-- <li class="relative">
                    <div class="dropdown inline-block relative">
                        <button class="font-semibold py-2 px-4 inline-flex items-center" id="acc-btn">
                            <span class="mr-1 mt-2">Account</span>
                            <svg class="fill-current h-4 w-4 mt-2" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 14l-5-5 1.41-1.41L10 11.17l3.59-3.58L15 9l-5 5z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu hidden absolute" id="logout-menu">
                            <li><a href="/Hackathon%202023/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </nav>
        <div>
            <video class="w-full" loop autoplay muted>
                <source src="./assets/home_video.mp4" type="video/mp4" />
            </video>
        </div>
    </div>
    <h3 id="blog" class="text-5xl flex justify-center mt-10 underline  mb-16">Sections</h3>

    <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <div class="w-96 px-4 md:w-1/2 xl:w-1/5 block">
                <div class="relative mb-12">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://d3f7q2msm2165u.cloudfront.net/aaa-content/user/aaa/images/tables/curriculumUnits/2/unit-saving-icon.svg"
                            alt="portfolio" class="w-full" />
                    </div>
                    <div class="relative z-10 mx-7 -mt-20 rounded-lg py-9 px-3 text-center shadow-lg">
                        <h3 class="mb-4 mt-10 text-xl font-bold text-dark">Savings</h3>
                        <a href="https://www.investopedia.com/terms/s/savings.asp#:~:text=Key%20Takeaways%201%20Savings%20is%20the%20amount%20of,rates%20of%20return%20as%20a%20result.%20More%20items"
                            class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-blue-800 hover:text-white">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 xl:w-1/5 block">
                <div class="relative mb-12">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://d3f7q2msm2165u.cloudfront.net/aaa-content/user/aaa/images/tables/curriculumUnits/5/unit-pfc-icon.svg"
                            alt="portfolio" class="w-full" />
                    </div>
                    <div class="relative z-10 mx-7 -mt-20 rounded-lg py-9 px-3 text-center shadow-lg">
                        <h3 class="mb-4 mt-10 text-xl font-bold text-dark">
                            Student Loans
                        </h3>
                        <a href="https://www.wsj.com/articles/the-wsj-guide-to-student-loans-navigating-the-myths-and-misunderstandings-about-college-debt-11647557853"
                            class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-blue-800 hover:text-white">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 xl:w-1/5 block">
                <div class="relative mb-12">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://d3f7q2msm2165u.cloudfront.net/aaa-content/user/aaa/images/tables/curriculumUnits/10/unit-taxes-icon.svg"
                            alt="portfolio" class="w-full" />
                    </div>
                    <div class="relative z-10 mx-7 -mt-20 rounded-lg py-9 px-3 text-center shadow-lg">
                        <h3 class="mb-4 mt-10 text-xl font-bold text-dark">Tax</h3>
                        <a href="https://groww.in/p/tax"
                            class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-blue-800 hover:text-white">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 xl:w-1/5 block">
                <div class="relative mb-12">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://d3f7q2msm2165u.cloudfront.net/aaa-content/user/aaa/images/tables/curriculumUnits/3/unit-credit-icon.svg"
                            alt="portfolio" class="w-full" />
                    </div>
                    <div class="relative z-10 mx-7 -mt-20 rounded-lg py-9 px-3 text-center shadow-lg">
                        <h3 class="mb-4 mt-10 text-xl font-bold text-dark">
                            Credit cards
                        </h3>
                        <a href="https://www.investopedia.com/terms/c/creditcard.asp"
                            class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-blue-800 hover:text-white">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 xl:w-1/5 block">
                <div class="relative mb-12">
                    <div class="overflow-hidden rounded-lg">
                        <img src="https://d3f7q2msm2165u.cloudfront.net/aaa-content/user/aaa/images/tables/curriculumUnits/7/unit-investing-icon.svg"
                            alt="portfolio" class="w-full" />
                    </div>
                    <div class="relative z-10 mx-7 -mt-20 rounded-lg py-9 px-3 text-center shadow-lg">
                        <h3 class="mb-4 mt-10 text-xl font-bold text-dark">Investing</h3>
                        <a href="https://www.finra.org/investors/investing/investing-basics"
                            class="inline-block rounded-md border py-3 px-7 text-sm font-semibold text-body-color transition hover:border-primary hover:bg-blue-800 hover:text-white">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--categories section-->


    <h3 id="blog" class="text-5xl flex justify-center mt-10 underline mb-10">Blogs</h3>
    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-5">
        <!--Card 1-->
        <div class="rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">API</div>
                <p class="text-gray-700 text-base">
                    An application programming interface (API) is a set of routines, protocols, and tools for building
                    software
                    applications that essentially allows multiple systems or applications to ‘speak’ to one another.
                    This allows
                    customisation of applications, depending on the needs of the user and can streamline day-to-day
                    processes.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2 relative h-32 w-32">
                <a href="/Hackathon%202023/api.html">
                    <span
                        class="absolute bottom-0 left-0 h-5 w-full ml-5 hover:mr-2 hover:text-base hover:font-bold hover:text-blue-800 duration-300 ease-in-out">Learn
                        More</span>
                </a>
            </div>
        </div>
        <!--Card 2-->
        <div class="rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Big Data</div>
                <p class="text-gray-700 text-base">
                    Big Data refers to structured and unstructured data that is too large or too complex to be processed
                    by a
                    traditional data management application. Financial services use Big Data to better understand their
                    customers’
                    behaviour using predictive data analytics. You will typically find Big Data implemented for
                    sentiment
                    analysis, fraud detection, fraud prevention and personalising customer interaction.

                </p>
            </div>
            <div class="px-6 pt-4 pb-2 relative h-32 w-32">
                <a href="/Hackathon%202023/bigdata.html">
                    <span
                        class="absolute bottom-0 left-0 h-16 w-full ml-5 hover:mr-2 hover:text-base hover:font-bold hover:text-blue-800 duration-300 ease-in-out">Learn
                        More</span>
                </a>
            </div>
        </div>

        <!--Card 3-->
        <div class="rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Blockchain</div>
                <p class="text-gray-700 text-base">
                    Blockchain is essentially a secure digital record of transactions. Each block contains data around
                    an
                    individual transaction such as date, time, amount and is designed to be difficult to alter.
                    Blockchain is
                    structured so that individual blocks, are linked together in a single list, called a chain. They are
                    popularly
                    used in cryptocurrencies such as bitcoin.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2 relative h-32 w-32">
                <a href="/Hackathon%202023/blockchain.html">
                    <span
                        class="absolute bottom-0 left-0 h-10 w-full ml-5 hover:mr-2 hover:text-base hover:font-bold hover:text-blue-800 duration-300 ease-in-out">Learn
                        More</span>
                </a>
            </div>
        </div>

        <!--card 4-->
        <div class="rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Crowdfunding</div>
                <p class="text-gray-700 text-base">
                    Crowdfunding occurs when an individual or company submit a request, generally via the internet, for
                    monetary
                    donations from the general public. The money raised then goes towards funding a project or venture.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2 relative h-32 w-32 mt-[80px]">
                <a href="/Hackathon%202023/crowdfunding.html">
                    <span
                        class="absolute bottom-0 left-0 h-12 w-full ml-5 hover:mr-2 hover:text-base hover:font-bold hover:text-blue-800 duration-300 ease-in-out">Learn
                        More</span>
                </a>
            </div>
        </div>

        <!--card 5-->
        <div class="rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">FinTech</div>
                <p class="text-gray-700 text-base">
                    FinTech, short for Financial Technology, is the word used to describe the emerging industry that
                    aims to
                    modernise, improve and automate the delivery of financial services. Through the use of modern
                    software and
                    infrastructure, FinTech solutions aim to compete with traditional methods to deliver financial
                    solutions.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2 relative h-32 w-32">
                <a href="/Hackathon%202023/fintech.html">
                    <span
                        class="absolute bottom-0 left-0 w-full ml-5 h-4 hover:mr-2 hover:text-base hover:font-bold hover:text-blue-800 duration-300 ease-in-out">Learn
                        More</span>
                </a>
            </div>
        </div>
    </div>



    <!-- Blogs -->
    <!-- ====== FAQ Section Start -->
    <section x-data="
    {
      openFaq1: false, 
      openFaq2: false, 
      openFaq3: false, 
      openFaq4: false, 
      openFaq5: false, 
      openFaq6: false
    }
  " class="relative z-20 overflow-hidden bg-white pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="container mx-auto">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[520px] text-center lg:mb-20">
                        <span class="mb-2 block text-lg font-semibold text-blue-800 text-2xl">
                            FAQ
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px]">
                            Any Questions? Look Here
                        </h2>
                    </div>
                </div>
            </div>

            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4 lg:w-1/2">

                    <div
                        class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-4 sm:p-8 lg:px-6 xl:px-8">
                        <button class="faq-btn flex w-full text-left" @click="openFaq2 = !openFaq2">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-lg font-semibold text-black">
                                    How are we going to measure success?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq2" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                I prefer to look at success measurement in about a three-year time frame and define the
                                parameters we
                                will be looking at.
                                Whatever it is must be something that can be controlled by the advisor. For example, it
                                could be an
                                increase in net worth or
                                maybe a reduction in liabilities
                            </p>
                        </div>
                    </div>
                    <div
                        class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-4 sm:p-8 lg:px-6 xl:px-8">
                        <button class="faq-btn flex w-full text-left" @click="openFaq3 = !openFaq3">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-lg font-semibold text-black">
                                    How can I get in touch with you?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq3" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                Our platform provides you a specific section of getting in touch with us and also you
                                can subscribe to
                                our newsletter
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div
                        class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-4 sm:p-8 lg:px-6 xl:px-8">
                        <button class="faq-btn flex w-full text-left" @click="openFaq4 = !openFaq4">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-lg font-semibold text-black">
                                    Why you should choose us?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq4" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                We as a team developed a platform where you can get bunch of FinTech information related
                                to varieties of
                                topics
                            </p>
                        </div>
                    </div>

                    <div
                        class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-4 sm:p-8 lg:px-6 xl:px-8">
                        <button class="faq-btn flex w-full text-left" @click="openFaq6 = !openFaq6">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="icon fill-current">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-lg font-semibold text-black">
                                    How Accurate/up-to-date is your data?
                                </h4>
                            </div>
                        </button>
                        <div x-show="openFaq6" class="faq-content pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                We collect lots and lots of information and filter them so that it will be easy for our
                                users
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 right-0 z-[-1]">
            <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                    d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
                    fill="url(#paint0_linear)" />
                <defs>
                    <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3056D3" stop-opacity="0.36" />
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </section>
    <!-- ====== FAQ Section End -->


    <!--newsletter starts-->

    <body>
        <section class="bg-white">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-md sm:text-center">
                    <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-blue-500 sm:text-4xl dark:text-black">
                        Sign up for our newsletter
                    </h2>
                    <p class="mx-auto mb-8 max-w-2xl font-light text-gray-700 md:mb-12 sm:text-xl ">
                        Stay up to date with the roadmap progress, announcements and
                        exclusive discounts feel free to sign up with your email.
                    </p>
                    <form action="#">
                        <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                            <div class="relative w-full">
                                <label for="email"
                                    class="hidden mb-2 text-sm font-medium text-white-900 dark:text-black">Email
                                    address</label>
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-white-500 dark:text-white-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                                <input
                                    class="block p-3 pl-10 w-full text-sm text-black bg-white-50 rounded-lg border border-white-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400"
                                    placeholder="Enter your email" type="email" id="email" required="" />
                            </div>
                            <div>
                                <button type="submit"
                                    class="py-3 px-5 w-full text-sm font-medium text-center text-white  rounded-lg border cursor-pointer bg-blue-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 ">
                                    Subscribe
                                </button>
                            </div>
                        </div>
                        <div
                            class="mx-auto max-w-screen-sm text-sm text-left text-white-500 newsletter-form-footer dark:text-white-300">
                            We care about the protection of your data.
                            <a href="#"
                                class="font-medium text-primary-600 dark:text-primary-500 hover:underline text-blue-500">Read
                                our
                                Privacy Policy </a>.
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
    <!--newsletter ends-->
    <!-- Footer -->
    <hr class="border border-gray-500 mx-20">
    <div class="max-w-3xl mx-auto">
        <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6">
            <span class="text-md text-gray-800 sm:text-center">© 2023 All Rights Reserved to <span
                    class="underline text-black font-semibold">Tag-N-Code</span></span>
            </span>
            <ul class="flex flex-wrap items-center mt-3 sm:mt-0">
                <li>
                    <a href="#" class="mr-4 text-md text-gray-800 hover:underline md:mr-6">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 text-md text-gray-800 hover:underline md:mr-6">Privacy
                        Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 text-md text-gray-800 hover:underline md:mr-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="text-md text-gray-800 hover:underline">Contact</a>
                </li>
            </ul>
        </footer>
    </div>
    <!-- Footer -->
    <script>
        const button = document.getElementById('acc-btn');
        const menu = document.getElementById('logout-menu');

        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });

            Alpine.data('accordion', (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
        })
    </script>
</body>

</html>