@extends('layouts.master')

@section('content')
    <div class="container-fluid px-8">
        <div class=" py-3 flex justify-between ">
            @include('layouts.partials.alert')
            <a href="{{ route('orders.create') }}">
                <button type="submit"
                    class="w-full text-white bg-blue-600  hover:bg-iamber-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add
                    New Order</button>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-md  sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Customer Contact
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fleet 
                        </th>

                        <th scope="col" class="px-6 py-3">
                             Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                @foreach ($orders as $order)
                    <tbody>
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4">
                                {{ $order->id }}
                            </td>
                            <form action="{{ route('orders.update') }}" method="POST">
                                @csrf
                                <td class="px-6 py-4 font-medium ">

                                    <select id="countries" name="order_customer"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}"
                                                {{ $order->order_customer == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->customer_email }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="px-6 py-4">
                                    <select id="countries" name="order_fleet"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                      
                                        @foreach ($fleets as $fleet)
                                            <option value="{{ $fleet->id }}"
                                                {{ $order->order_fleet == $fleet->id ? 'selected' : '' }}>
                                                {{ $fleet->fleet_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="px-6 py-4">
                                    <select id="countries" name="order_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        <option value="{{ $order->order_status }}"
                                            class="selected px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                            {{ $order->order_status }}</option>
                                        <option value='pending'>Pending</option>
                                        <option value='loading'>Loading</option>
                                        <option value='dispatched'>Dispatched</option>
                                        <option value='delivered'>Delivered</option>

                                    </select>

                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('orders.edit', $order->id) }}"
                                        class="font-medium text-blue-600 ">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('orders.delete', $fleet->id) }}"
                                        class="font-medium text-red-600 ">Delete</a>
                                </td>
                            </form>
                        </tr>

                    </tbody>
                @endforeach

            </table>
            <div class="col-xl-12 col-sm-12">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
