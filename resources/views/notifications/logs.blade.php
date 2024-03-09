@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="mb-4 text-center">
        <h1 class="text-2xl font-semibold text-white">Sent Notifications History</h1>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User
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
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $log->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $log->user->name }}
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
                    <td colspan="6" class="px-6 py-4 text-center">
                        No notifications sent.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
