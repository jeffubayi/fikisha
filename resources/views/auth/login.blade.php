@extends('layouts.app')

@section('content')
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  
                placeholder="
                name@company.com" required="" value="{{ old('email') }}" />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required="">
        </div>
      
        

        <button type="submit"
            class="w-full text-white bg-blue-600  hover:bg-iamber-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Login
            to your account</button>
        <div class="text-sm font-medium text-gray-500 ">
         
            Not registered? <a href="/register" class="text-blue-600 hover:underline ">Create account</a>
        </div>
        <div class="text-center ">

            <a href="/password/reset" class=" text-sm text-blue-600  hover:underline ">Forgot Password?</a>
        </div>
    </form>
@endsection
