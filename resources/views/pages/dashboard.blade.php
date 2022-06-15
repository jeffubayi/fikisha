@php
use App\Models\Customer;

$mytime = Carbon\Carbon::now();

@endphp

@extends('layouts.master')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="px-6 pt-6 2xl:container">
        <p class="font-semibold text-md  text-gray-600">{{ $mytime->format('D M Y ') }}</p>
        <div
            class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5 grid gap-6 md:grid-cols-2 lg:grid-cols-3 mb-5">
            <!-- Start Card List -->
            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1478/1478570.png" class="w-auto h-12" />
                    <div>
                        <p class="font-semibold text-base">{{ $customerCount }}</p>
                        <p class="font-semibold text-xs text-gray-400">Total Customers</p>
                    </div>
                </div>
            </div>


            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4662/4662009.png" class="w-auto h-12" />
                    <div>
                        <p class="font-semibold text-base">{{ $fleetCount }}</p>
                        <p class="font-semibold text-xs text-gray-400">Total Fleet</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1524/1524855.png" class="w-auto h-12" />
                    <div>
                        <p class="font-semibold text-base"> {{ $orderCount }}</p>
                        <p class="font-semibold text-xs text-gray-400">Total Orders</p>
                    </div>
                </div>

            </div>

            <!-- End Card List -->
        </div>

        <div class="grid grid-cols-3 gap-4">
            <!-- Start Card List -->
            <div class="  col-span-2 ">


                <div class=" sm:col-span-12 md:col-span-5  overflow-hidden rounded-lg shadow-xl">
                    <div class="w-full overflow-x-auto">
                        <div class="p-3 bg-white w-full ">
                            <h5 class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Recent orders
                            </h5>
                        </div>
                        <table class="w-full whitespace-no-wrap bg-white p-3 rounded-xl shadow-xl">

                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-white border-b ">
                                    <th class="px-4 py-3">Customers</th>
                                    <th class="px-4 py-3">Fleet</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 invisible lg:visible "></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y ">
                                @unless(count($orders) == 0)
                                    @foreach ($orders as $order)
                                        <tr class="text-gray-700 ">
                                            <td class="px-2 py-2">

                                                <div class="flex items-center text-sm ">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?k=20&m=1223671392&s=612x612&w=0&h=lGpj2vWAI3WUT1JeJWm1PRoHT3V15_1pdcTn2szdwQ0="
                                                            alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true">
                                                        </div>
                                                    </div>

                                                    @foreach ($customers as $customer)
                                                        @if ($order->order_customer == $customer->id)
                                                            <div>
                                                                <p class="font-semibold">{{ $customer->customer_name }}</p>
                                                                <p class="text-xs text-gray-600 ">
                                                                    {{ $customer->customer_email }}
                                                                </p>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>

                                            </td>
                                            <td class="px-1 py-2 text-sm">
                                                <select id="countries" readonly="read" name="order_fleet"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                                                    @foreach ($fleets as $fleet)
                                                        <option value="{{ $fleet->id }}"
                                                            {{ $order->order_fleet == $fleet->id ? 'selected' : '' }}>
                                                            {{ $fleet->fleet_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                @if ($order->order_status == 'pending')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full ">
                                                        {{ $order->order_status }}
                                                    </span>
                                                @elseif($order->order_status == 'loading')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full ">
                                                        {{ $order->order_status }}
                                                    </span>
                                                @elseif($order->order_status == 'delivered')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                                                        {{ $order->order_status }}
                                                    </span>
                                                @elseif($order->order_status == 'dispatched')
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full ">
                                                        {{ $order->order_status }}
                                                    </span>
                                                @endif

                                            </td>
                                            <td class="px-4 py-3 text-right invisible lg:visible ">
                                                <a href="{{ route('orders.edit', $order->id) }}"
                                                    class="text-blue-600  bg-white    rounded-lg text-sm w-full sm:w-auto px-2 py-2 text-center">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <img src="https://cdn-icons-png.flaticon.com/512/1001/1001044.png"
                                        class="w-auto h-20 flex justify-center p-5" alt="no data" />
                                @endunless
                            </tbody>

                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-blue-500 uppercase border-t  bg-white sm:grid-cols-9 ">
                        <span class="flex items-center col-span-3">
                            View All
                        </span>
                        <span class="col-span-2"></span>

                    </div>



                </div>



            </div>


            <div class="  ">
                <div class="p-4 max-w-sm bg-white rounded-lg border shadow-md sm:p-6 ">
                    <h5 class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase"> Order status
                    </h5>
                    <ul class="my-4 space-y-3">

                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-base font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-100 group hover:shadow ">
                                <img src="https://cdn-icons-png.flaticon.com/512/2643/2643990.png" class=" h-6 " />
                                <span class="flex-1 ml-3 whitespace-nowrap text-sm">Total Loading</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-800 bg-gray-200 rounded ">{{ $loadingCount }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-base font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-100 group hover:shadow  ">

                                <img src="https://cdn-icons-png.flaticon.com/512/7256/7256192.png" class=" h-6 " />
                                <span class="flex-1 ml-3 whitespace-nowrap text-sm">Total Pending</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-800 bg-gray-200 rounded ">{{ $pendingCount }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-base font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-100 group hover:shadow ">
                                <img src="https://cdn-icons-png.flaticon.com/512/3142/3142292.png" class=" h-6 " />
                                <span class="flex-1 ml-3 whitespace-nowrap text-sm ">Total Dispatched</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-800 bg-gray-200 rounded ">{{ $dispatchedCount }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-3 text-base font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-100 group hover:shadow ">
                                <img src="https://cdn-icons-png.flaticon.com/512/4396/4396937.png" class=" h-6 " />
                                <span class="flex-1 ml-3 whitespace-nowrap text-sm ">Total Delivered</span>
                                <span
                                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-800 bg-gray-200 rounded ">{{ $deliveredCount }}</span>
                            </a>
                        </li>



                </div>
                <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                    <div class="flex space-x-6 items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" class="w-auto h-12" />
                        <div>
                            <h5 class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase"> Fleets
                                on-transit
                            </h5>
                            <p class="font-semibold text-base">{{ $availableFleetCount }}</p>
                        </div>
                    </div>

                    <div class="flex space-x-2 items-center">
                        <div class="bg-yellow-200 rounded-md p-2 flex items-center">
                            <p class="text-yellow-600 font-semibold text-xs">track</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>
@endsection
