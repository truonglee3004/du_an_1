<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


    <footer class="bg-white mt-5">
        <!-- Flex Container -->
        <div class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0">
            <!-- Logo and social links container -->
            <div class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start">
                <div class="mx-auto my-6 text-center text-black md:hidden">
                    Copyright &copy; 2022, All Rights Reserved
                </div>
                <!-- Logo -->
                <div>
                    <img src="./img/logo.png" class="h-8" alt="">
                </div>
            </div>
            <!-- List Container -->
            <div class="flex justify-around space-x-32 font-normal">
                <div class="flex flex-col space-y-3 text-black uppercase">
                    <a href="#" class="hover:text-orange-500 hover:no-underline">Home</a>
                    <a href="#" class="hover:text-orange-500 hover:no-underline">Products</a>
                    <a href="#" class="hover:text-orange-500 hover:no-underline">about</a>
                    <a href="#" class="hover:text-orange-500 hover:no-underline">contact</a>
                </div>
                <div class="flex flex-col space-y-3 text-black uppercase">
                    <a href="#" class="hover:text-orange-500 hover:no-underline">Careers</a>
                    <a href="#" class="hover:text-orange-500 hover:no-underline">Community</a>
                    <a href="#" class="hover:text-orange-500 hover:no-underline">Privacy Policy</a>
                </div>
            </div>

            <!-- Input Container -->
            <div class="flex flex-col justify-between">
                <form>
                    <div class="flex space-x-3">
                        <input type="text" class="flex-1 px-4 rounded-full border-2 border-orange-500 focus:outline-none" placeholder="Updated in your inbox" />
                        <button class="px-6 py-2 text-black rounded-full bg-orange-500 hover:text-white outline-4 focus:outline-none">
                            Go
                        </button>
                    </div>
                </form>
                <div class="hidden text-black md:block">
                    Copyright &copy; 2022, All Rights Reserved
                </div>

            </div>
        </div>
    </footer>
</body>

</html>