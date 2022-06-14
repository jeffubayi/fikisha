@extends('layouts.app')

@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Enter Name</label>
            <input type="text" id="name"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="john doe" name="name" value="{{ old('name') }}" />

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Enter Email</label>
            <input type="email" id="email"
                class="shadow-sm bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="name@gmail.com" name="email" value="{{ old('email') }}" />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Enter
                Password</label>
            <input type="password" id="password"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                name="password" value="{{ old('password') }}" />

            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm
                password</label>
            <input type="password_confirmation" id="repeat-password"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                name="password_confirmation" value="{{ old('password_confirmation') }}" />

            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Register
            new account</button>
        <div class="flex items-start mt-2">
            <label for="terms" class="ml-2 text-sm font-medium text-gray-900 ">Already have an account?<a href="/login"
                    class="text-blue-600   m-2">Login</a></label>

        </div>
    </form>
@endsection
