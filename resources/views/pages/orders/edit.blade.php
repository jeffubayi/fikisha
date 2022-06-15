@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="breadcrumb">
            <div class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
            </div>
        </div>

        <div class="max-w-2xl mx-auto bg-white rounded-lg  p-16">
            <form action="{{ route('orders.update') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Customer</label>
                    <select id="countries" name="order_customer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $order->order_customer == $customer->id ? 'selected' : '' }}>
                                {{ $customer->customer_name }}</option>
                        @endforeach
                    </select>
                    @error('order_customer')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Fleet</label>
                    <select id="countries" name="order_fleet"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="{{ $order->order_fleet }}" selected>{{ $order->order_fleet }}
                        </option>
                        @foreach ($fleets as $fleet)
                            <option value="{{ $fleet->id }}" {{ $order->order_fleet == $fleet->id ? 'selected' : '' }}>
                                {{ $fleet->fleet_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('order_fleet')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div>
                        <label for="expense_title" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Status</label>
                        <select id="countries" name="order_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="{{ $order->order_status }}" selected>{{ $order->order_status }}</option>
                            <option value='pending'>Pending</option>
                            <option value='loading'>Loading</option>
                            <option value='dispatched'>Dispatched</option>
                            <option value='delivered'>Delivered</option>

                        </select>
                        @error('order_status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Delivery Date</label>
                        <input type="text" name="order_date" value="{{ $order->order_date }}" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @error('order_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white  bg-blue-600    hover:bg-blue-500  focus:ring-4 focus:outline-none focus:ring-cyan-500  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>

                <a href="/"
                    class="text-blue-600  bg-white     border border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-600  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</a>
            </form>
        </div>
    </div>
@endsection
