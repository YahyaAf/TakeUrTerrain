@extends('backOffice.layouts.app')
@section('content')
{{-- Stats Card Element --}}
<div class="p-6">
    <div class="bg-white rounded-lg shadow p-4">
        <div class="flex justify-between">
            <div>
                <h3 class="text-sm text-gray-500">{{ $title ?? 'Stats Title' }}</h3>
                <p class="text-2xl font-semibold">${{ $value ?? '0' }}</p>
            </div>
            <div class="w-12 h-12 bg-{{ $color ?? 'blue' }}-100 rounded-lg flex items-center justify-center">
                <svg class="w-8 h-8 text-{{ $color ?? 'blue' }}-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    {!! $icon ?? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18" />' !!}
                </svg>
            </div>
        </div>
    </div>

    {{-- Chart Card Element --}}
    <div class="bg-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-medium">{{ $chartTitle ?? 'Chart Title' }}</h2>
            <a href="{{ $chartLink ?? '#' }}" class="text-sm text-blue-500">Show All</a>
        </div>
        <canvas id="{{ $chartId ?? 'chart' }}" height="{{ $height ?? '240' }}"></canvas>
    </div>

    {{-- Status Badge Element --}}
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $statusColor ?? 'green' }}-100 text-{{ $statusColor ?? 'green' }}-800">
        {{ $status ?? 'Active' }}
    </span>

    {{-- Action Button Element --}}
    <a href="{{ $actionLink ?? '#' }}" class="bg-{{ $actionColor ?? 'blue' }}-500 text-white px-3 py-1 rounded text-xs">
        {{ $actionText ?? 'Action' }}
    </a>

    {{-- DataTable Element --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-medium">{{ $tableTitle ?? 'Data Table' }}</h2>
            <a href="{{ $tableLink ?? '#' }}" class="text-sm text-blue-500">Show All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        @if($showCheckbox ?? true)
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                        </th>
                        @endif
                        
                        @foreach($headers ?? ['Column 1', 'Column 2', 'Column 3'] as $header)
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $header }}
                        </th>
                        @endforeach
                        
                        @if($showActions ?? true)
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($rows ?? [] as $row)
                    <tr>
                        @if($showCheckbox ?? true)
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                        </td>
                        @endif
                        
                        @foreach($row as $cell)
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $cell }}
                        </td>
                        @endforeach
                        
                        @if($showActions ?? true)
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded text-xs">Detail</a>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ count($headers ?? ['Column 1', 'Column 2', 'Column 3']) + ($showCheckbox ?? true) + ($showActions ?? true) }}" class="px-6 py-4 text-center text-sm text-gray-500">
                            No data available
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Search Box Element --}}
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input type="text" name="{{ $searchName ?? 'search' }}" id="{{ $searchId ?? 'search' }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="{{ $searchPlaceholder ?? 'Search' }}">
    </div>

    {{-- Filter Dropdown Element --}}
    <div class="relative inline-block text-left">
        <div>
            <button type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="{{ $dropdownId ?? 'dropdown-button' }}" aria-expanded="true" aria-haspopup="true">
                {{ $dropdownLabel ?? 'Filter' }}
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="{{ $dropdownId ?? 'dropdown-button' }}" tabindex="-1" id="{{ $dropdownMenuId ?? 'dropdown-menu' }}" style="display: none;">
            <div class="py-1" role="none">
                @foreach($dropdownItems ?? ['All', 'Active', 'Inactive'] as $item)
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1">{{ $item }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Pagination Element --}}
    <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
        <div class="hidden sm:block">
            <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">{{ $paginationStart ?? '1' }}</span>
                to
                <span class="font-medium">{{ $paginationEnd ?? '10' }}</span>
                of
                <span class="font-medium">{{ $paginationTotal ?? '20' }}</span>
                results
            </p>
        </div>
        <div class="flex-1 flex justify-between sm:justify-end">
            <a href="{{ $prevPageUrl ?? '#' }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Previous
            </a>
            <a href="{{ $nextPageUrl ?? '#' }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Next
            </a>
        </div>
    </nav>

    {{-- Empty State Element --}}
    <div class="text-center py-12 px-4">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">{{ $emptyTitle ?? 'No Data' }}</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $emptyDescription ?? 'Get started by creating a new record.' }}</p>
        <div class="mt-6">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                {{ $emptyButtonText ?? 'New Record' }}
            </button>
        </div>
    </div>

    {{-- Alert Element --}}
    <div class="rounded-md bg-{{ $alertColor ?? 'blue' }}-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-{{ $alertColor ?? 'blue' }}-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-{{ $alertColor ?? 'blue' }}-800">{{ $alertTitle ?? 'Information' }}</h3>
                <div class="mt-2 text-sm text-{{ $alertColor ?? 'blue' }}-700">
                    <p>{{ $alertMessage ?? 'This is an alert message.' }}</p>
                </div>
                @if($alertAction ?? false)
                <div class="mt-4">
                    <div class="-mx-2 -my-1.5 flex">
                        <button type="button" class="bg-{{ $alertColor ?? 'blue' }}-50 px-2 py-1.5 rounded-md text-{{ $alertColor ?? 'blue' }}-800 hover:bg-{{ $alertColor ?? 'blue' }}-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{ $alertColor ?? 'blue' }}-500">
                            {{ $alertActionText ?? 'View' }}
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal Element --}}
    <div class="fixed z-10 inset-0 overflow-y-auto" style="display: none;" id="{{ $modalId ?? 'modal' }}">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-{{ $modalIconColor ?? 'blue' }}-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-{{ $modalIconColor ?? 'blue' }}-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                {!! $modalIcon ?? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />' !!}
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ $modalTitle ?? 'Modal Title' }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ $modalContent ?? 'Modal content goes here.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-{{ $modalPrimaryColor ?? 'blue' }}-600 text-base font-medium text-white hover:bg-{{ $modalPrimaryColor ?? 'blue' }}-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{ $modalPrimaryColor ?? 'blue' }}-500 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ $modalPrimaryText ?? 'Confirm' }}
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ $modalSecondaryText ?? 'Cancel' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection