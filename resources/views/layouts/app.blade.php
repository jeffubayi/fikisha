<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/css/app.css" rel="stylesheet">
    <title>Fikisha | Sign up</title>
</head>
<style>
    .login_img_section {
        background: linear-gradient(rgba(2, 2, 2, .7), rgba(0, 0, 0, .7)), url(https://www.jambocargo.com/wp-content/uploads/2020/03/Cargo-F.jpg) ;
    }
</style>

<body class="mb-4 bg-gray-100">
    <div class="h-screen flex">
        <div class="hidden lg:flex w-full lg:w-1/2 login_img_section
            justify-around items-center">
            <div
                class=" 
                    bg-black 
                    opacity-20 
                    inset-0 
                    z-0">

            </div>
           
        </div>
        <div class="flex w-full lg:w-1/2 justify-center items-center bg-white space-y-8">
          
            <main class="py-4">
                <div class="text-center mb-3">
                    <img class="mx-auto w-48" src="https://media-exp2.licdn.com/dms/image/C4D0BAQGO7wXxE3uhcQ/company-logo_200_200/0/1604929667023?e=1663200000&v=beta&t=5M33jxLZSYcG4IlWgieYqttnInzEAlRd03orioeGCxg"
                        alt="logo" />
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    
</body>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</html>
