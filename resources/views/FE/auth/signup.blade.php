@extends('FE.layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-green-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-green-800">
                Sign Up
            </h2>
            <p class="mt-2 text-center text-sm text-green-600">
                Already have an account?
                <a href="{{ route('auth.signin') }}" class="font-medium text-green-700 hover:text-green-500">
                    Sign In
                </a>
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" method="POST" action="{{ route('auth.signup') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full p-2 border rounded-lg @error('name') border-red-500 @enderror" placeholder="Name">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full p-2 border rounded-lg @error('email') border-red-500 @enderror" placeholder="Email">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" required
                        class="w-full p-2 border  rounded-lg @error('password') border-red-500 @enderror" placeholder="Password">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Confirm Password">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-green-700 text-white py-2 px-4 rounded-lg hover:bg-green-800 transition">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
