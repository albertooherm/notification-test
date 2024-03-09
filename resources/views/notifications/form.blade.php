@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-white">Create Notification</h1>
        <a href="{{ route('notification.logs') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
           View Notifications
        </a>
    </div>

    @if (session('success'))
    <div
        x-data="{ open: true }"
        x-show="open"
        x-init="setTimeout(() => open = false, 2000)"
        class="mt-5 mb-10 p-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200 rounded-b text-green-900 dark:text-green-800 px-4 py-3 shadow-md"
        role="alert"
    >
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zM9 15V9h2v6H9zm0-8V5h2v2H9z"/></svg></div>
            <div>
                <p class="font-bold">Success!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            <div class="ml-auto pl-3">
                <button @click="open = false" class="fill-current h-6 w-6 text-green-500">
                    <span class="sr-only">Close</span> ×
                </button>
            </div>
        </div>
    </div>
@endif


    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ url('/notification/send') }}" method="POST" class="overflow-hidden shadow rounded-lg">
            @csrf
            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="col-span-1">
                        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                        <select id="category" name="category" autocomplete="category-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-gray-700 text-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Sports">Sports</option>
                            <option value="Finance">Finance</option>
                            <option value="Movies">Movies</option>
                        </select>
                    </div>

                    <div class="col-span-1">
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out" required></textarea>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Send Notification
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
