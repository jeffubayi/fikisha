<div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
    <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
        @if (Route::currentRouteName() == 'index')
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Dashboard</h5>
        @elseif (Route::currentRouteName() == 'fleets.index')
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Fleets</h5>
        @elseif (Route::currentRouteName() == 'customer.index')
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Customers</h5>
        @elseif (Route::currentRouteName() == 'orders')
            <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Orders</h5>
        @endif
        <button class="w-12 h-16 -mr-2 border-r lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div class="flex space-x-4">
            <!--search bar -->
            <div class="md:block">
                <form action="/" class="relative flex items-center text-gray-400 focus-within:text-cyan-400">
                    <button type="submit" class="absolute left-4 h-6 flex items-center pr-3 border-r border-gray-300">
                        <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 35.997 36.004">
                            <path id="Icon_awesome-search" data-name="search"
                                d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                            </path>
                        </svg>
                    </button>
                    <input type="search" name="tag" id="leadingIcon" placeholder="Search category"
                        class="w-full pl-14 pr-4 py-2.5 rounded-xl text-sm text-gray-600 outline-none border border-gray-300 focus:border-cyan-300 transition">
                </form>
            </div>

            <!--/search bar -->
            <button aria-label="search"
                class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200 md:hidden">
                <svg xmlns="http://ww50w3.org/2000/svg" class="w-4 mx-auto fill-current text-gray-600"
                    viewBox="0 0 35.997 36.004">
                    <path id="Icon_awesome-search" data-name="search"
                        d="M35.508,31.127l-7.01-7.01a1.686,1.686,0,0,0-1.2-.492H26.156a14.618,14.618,0,1,0-2.531,2.531V27.3a1.686,1.686,0,0,0,.492,1.2l7.01,7.01a1.681,1.681,0,0,0,2.384,0l1.99-1.99a1.7,1.7,0,0,0,.007-2.391Zm-20.883-7.5a9,9,0,1,1,9-9A8.995,8.995,0,0,1,14.625,23.625Z">
                    </path>
                </svg>
            </button>

            {{-- <button aria-label="chat"
                class="w-10 h-10 rounded-xl border bg-gray-100 focus:bg-gray-100 active:bg-gray-200">
                <a href="/setting">
                    <svg class="h-6 w-6 m-auto text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </a>
            </button> --}}
            <select id="depot"
                class="bg-gray-50 border h-10 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 w-30  ">
                <option selected>Depot</option>
                <option value="nairobi">Nairobi</option>
                <option value="mombasa">Mombasa</option>
            </select>
        </div>
    </div>
</div>
