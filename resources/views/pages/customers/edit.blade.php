@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="breadcrumb">
            <div class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
            </div>
        </div>
    
        <div class="max-w-2xl mx-auto bg-white rounded-lg  p-16">
            <form action="{{ route('customers.update') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Name</label>
                    <input type="text" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        value="{{ $customer->customer_name }}" name="customer_name">
                    @error('customer_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid gap-6 mb-6 lg:grid-cols-2">
                    <div>
                        <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Email</label>
                        <input type="text" name="customer_email" id="company" value="{{ $customer->customer_email }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @error('customer_email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Location</label>
                        <input type="text" name="customer_location" value="{{ $customer->customer_email }}" id="title"
                            value="{{ $customer->customer_location }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white  bg-blue-600    hover:bg-blue-500  focus:ring-4 focus:outline-none focus:ring-cyan-500  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>

                <a href="{{ route('customer.index') }}"
                    class="text-blue-600  bg-white     border border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-600  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cancel</a>
            </form>
        </div>

    </div>
@endsection
