<ul class="space-y-2 tracking-wide mt-8">
    <li class="rounded-xl {{ Route::currentRouteName() == 'index' ? 'bg-blue-600' : '' }}">
        <a href="{{ route('index') }}"
            class="relative px-4 py-3 flex items-center space-x-4   {{ Route::currentRouteName() == 'index' ? 'text-white ' : ' text-gray-600' }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="-mr-1 font-medium">Dashboard</span>
        </a>
    </li>

    <ul class="space-y-2 tracking-wide mt-8">
        <li class="rounded-xl {{ Route::currentRouteName() == 'customer.index' ? 'bg-blue-600' : '' }}">
            <a href="{{ route('customer.index') }}"
                class="relative px-4 py-3 flex items-center space-x-4   {{ Route::currentRouteName() == 'customer.index' ? 'text-white ' : ' text-gray-600' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>

                <span
                    class="-mr-1 {{ Route::currentRouteName() == 'customer.index' ? 'font-medium' : 'font-small' }}">Customers</span>
            </a>
        </li>
        <ul class="space-y-2 tracking-wide mt-8">
            <li class="rounded-xl {{ Route::currentRouteName() == 'fleets.index' ? 'bg-blue-600' : '' }}">
                <a href="{{ route('fleets.index') }}"
                    class="relative px-4 py-3 flex items-center space-x-4   {{ Route::currentRouteName() == 'fleets.index' ? 'text-white ' : ' text-gray-600' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                    <span
                        class="-mr-1 {{ Route::currentRouteName() == 'fleets.index' ? 'font-medium' : 'font-small' }}">Fleet</span>
                </a>
            </li>
                <ul class="space-y-2 tracking-wide mt-8">
                    <li class="rounded-xl {{ Route::currentRouteName() == 'orders.index' ? 'bg-blue-600' : '' }}">
                        <a href="{{ route('orders.index') }}"
                            class="relative px-4 py-3 flex items-center space-x-4   {{ Route::currentRouteName() == 'orders.index' ? 'text-white ' : ' text-gray-600' }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            <span
                                class="-mr-1 {{ Route::currentRouteName() == 'orders.index' ? 'font-medium' : 'font-small' }}">Orders</span>
                        </a>
                    </li>
