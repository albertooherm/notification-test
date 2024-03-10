@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-4 text-center">
            <h1 class="text-2xl font-semibold text-white">Create Notification</h1>
        </div>

        @if (session('success'))
            <div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 2000)"
                class="mt-5 mb-10 p-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200 rounded-b text-green-900 dark:text-green-800 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zM9 15V9h2v6H9zm0-8V5h2v2H9z" />
                        </svg></div>
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

        @if (session('error'))
            <div x-data="{ open: true }" x-show="open" x-init="setTimeout(() => open = false, 2000)"
                class="mt-5 mb-10 p-4 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zM9 15V9h2v6H9zm0-8V5h2v2H9z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">Error</p>
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                    <div class="ml-auto pl-3">
                        <button @click="open = false" class="fill-current h-6 w-6 text-red-500">
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
                            <label for="category"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <select id="category" name="category" autocomplete="category-name"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-gray-700 text-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="Sports">Sports</option>
                                <option value="Finance">Finance</option>
                                <option value="Movies">Movies</option>
                            </select>
                        </div>

                        <div class="col-span-1">
                            <label for="message"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                            <textarea id="message" name="message" rows="4"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-600 bg-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out"
                                required></textarea>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Send Notification
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="mb-4 text-center">
            <h1 class="text-2xl font-semibold text-white">Sent Notifications History</h1>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            </div>
            <table id="notificationTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Message
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $log)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $log->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $log->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $log->user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $log->user->phone_number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $log->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $log->type }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $log->message }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $log->created_at->toFormattedDateString() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center">No notifications sent.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="flex flex-col items-center my-6">
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $logs->firstItem() }}</span> to
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $logs->lastItem() }}</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $logs->total() }}</span> Entries
                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    @if ($logs->onFirstPage())
                        <span
                            class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-400 bg-gray-300 rounded-l cursor-not-allowed">
                            Prev
                        </span>
                    @else
                        <a href="{{ $logs->previousPageUrl() }}" rel="prev"
                            class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Prev
                        </a>
                    @endif
                    @if ($logs->hasMorePages())
                        <a href="{{ $logs->nextPageUrl() }}" rel="next"
                            class="flex items-center justify-center px-4 h-10 text-base font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Next
                        </a>
                    @else
                        <span
                            class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-400 bg-gray-300 rounded-r cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
