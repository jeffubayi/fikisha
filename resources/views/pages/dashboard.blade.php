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
        <p class="font-semibold text-md  text-gray-600">{{ $mytime->format('Y-m-d') }}</p>
        <div
            class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5 grid gap-6 md:grid-cols-2 lg:grid-cols-4 mb-5">
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
            <div class="bg-white p-3 rounded-xl shadow-xl flex items-center justify-between mt-4">
                <div class="flex space-x-6 items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/854/854878.png" class="w-auto h-12" />
                    <div>
                        <p class="font-semibold text-base">{{ $availableFleetCount }}</p>
                        <p class="font-semibold text-xs text-gray-400">Fleets on-transit </p>
                    </div>
                </div>

                <div class="flex space-x-2 items-center">
                    <div class="bg-yellow-200 rounded-md p-2 flex items-center">
                        <p class="text-yellow-600 font-semibold text-xs">track</p>
                    </div>
                </div>
            </div>

            <!-- End Card List -->
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-1">
            <div class="w-full overflow-hidden rounded-lg shadow-xl">
                <div class="w-full overflow-x-auto">
                    <div class="p-3 bg-white w-full ">
                        <h5 class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Recent orders</h5>
                    </div>
                    <table class="w-full whitespace-no-wrap bg-white p-3 rounded-xl shadow-xl">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-white border-b ">
                                <th class="px-4 py-3">Customers</th>
                                <th class="px-4 py-3">Fleet</th>
                                <th class="px-4 py-3">Status</th>
                                <th  class="px-4 py-3 invisible lg:visible">Delivery Date</th>
                                <th   class="px-4 py-3 invisible lg:visible "></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y ">
                            @foreach ($orders as $order)
                                <tr class="text-gray-700 ">
                                    <td class="px-4 py-3">

                                        <div class="flex items-center text-sm ">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?k=20&m=1223671392&s=612x612&w=0&h=lGpj2vWAI3WUT1JeJWm1PRoHT3V15_1pdcTn2szdwQ0="
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
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
                                        @if ($order->order_status == "pending")
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full ">
                                                {{ $order->order_status }}
                                            </span>
                                        @elseif($order->order_status == "loading")
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full ">
                                                {{ $order->order_status }}
                                            </span>
                                        @elseif($order->order_status == "delivered")
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full ">
                                                {{ $order->order_status }}
                                            </span>
                                            @elseif($order->order_status == "dispatched")
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full ">
                                                {{ $order->order_status }}
                                            </span>
                                        @endif

                                    </td>
                                    <td  class="px-4 py-3 text-sm invisible lg:visible">
                                        {{ $order->order_date }}
                                    </td>
                                    <td class="px-6 py-4 text-right invisible lg:visible ">
                                        <a href="{{ route('orders.edit', $order->id) }}"
                                            class="text-blue-600  bg-white    rounded-lg text-sm w-full sm:w-auto px-2 py-2 text-center">edit</a>
                                    </td>
                                </tr>
                            @endforeach

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
    </div>
@endsection
