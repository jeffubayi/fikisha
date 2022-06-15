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
    <title>fikisha | manager your orders</title>
</head>

<body class="mb-4 bg-gray-100 dark:bg-grey-300">
    @auth
        <aside
            class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
            <div>


                <div class="mt-10 text-center">
                    <img src="data:image/png;base64,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"
                        alt="" class="w-6 h-6 m-auto rounded-full object-cover lg:w-28 lg:h-28">
                    <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ auth()->user()->name }}
                    </h5>
                    <span class="hidden text-gray-400 lg:block">{{ auth()->user()->email }}</span>

                </div>

                @include('layouts.partials.sidebar')


            </div>

            <form class="px-6 -mx-6 pt-4 flex justify-between items-center border-t" method="POST" action="/logout">
                @csrf
                <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>

                    <span class="group-hover:text-gray-700">Logout</span>


                </button>
            </form>
        </aside>
        <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">

            @include('layouts.partials.header')
            <main>
                @yield('content')
            </main>

        </div>

    @endauth

</body>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</html>
