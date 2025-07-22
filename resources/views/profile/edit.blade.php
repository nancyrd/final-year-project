@extends('layouts.app')

@section('content')
<div class="bg-white py-16 min-h-screen">
    <div class="max-w-xl mx-auto p-8 shadow-md border rounded-lg">
        <div class="text-center">
            <img src="/path-to-your-profile-icon.png" alt="Profile Icon" class="w-24 h-24 mx-auto mb-4">
            <h2 class="text-3xl font-bold text-purple-700 mb-8">Profile Settings</h2>
        </div>
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="mb-4">
                <label class="block text-purple-700 font-semibold">Name :</label>
                <input name="name" value="{{ old('name', auth()->user()->name) }}"
                    class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <div class="mb-4">
                <label class="block text-purple-700 font-semibold">Email :</label>
                <input name="email" type="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <div class="mb-4">
                <label class="block text-purple-700 font-semibold">Old password :</label>
                <input name="current_password" type="password"
                    class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <div class="mb-6">
                <label class="block text-purple-700 font-semibold">New password :</label>
                <input name="password" type="password"
                    class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" />
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg font-semibold">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
