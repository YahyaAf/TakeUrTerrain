@extends('backOffice.layouts.app')

@section('content')
<div class="bg-gray-50 py-8 px-6 rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <span class="text-blue-500">#</span> Permissions Management
        </h1>
        <a href="{{ route('permissions.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition-all duration-200 transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Permission
        </a>
    </div>

    <!-- Search and filter bar -->
    <div class="mb-6 flex justify-between items-center">
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
            <input type="text" class="py-2 pl-10 pr-4 block w-64 rounded-md bg-white border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Search permissions...">
        </div>
        <div class="flex space-x-2">
            <button class="bg-white hover:bg-gray-50 text-gray-600 px-3 py-2 rounded-md border border-gray-200 flex items-center text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter
            </button>
            <button class="bg-white hover:bg-gray-50 text-gray-600 px-3 py-2 rounded-md border border-gray-200 flex items-center text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Latest
            </button>
        </div>
    </div>

    <!-- Permissions table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="grid grid-cols-12 bg-gray-50 border-b border-gray-100 py-4 px-6">
            <div class="col-span-5 font-medium text-gray-700">Name</div>
            <div class="col-span-5 font-medium text-gray-700">Module</div>
            <div class="col-span-2 font-medium text-gray-700 text-right">Actions</div>
        </div>

        @foreach ($permissions as $permission)
        <div class="grid grid-cols-12 py-4 px-6 border-b border-gray-100 hover:bg-blue-50 transition-colors duration-150">
            <div class="col-span-5 flex items-center">
                <div class="h-8 w-8 rounded-md bg-blue-100 text-blue-500 flex items-center justify-center mr-3">
                    @php
                        $firstLetter = substr($permission->name, 0, 1);
                    @endphp
                    <span class="font-medium">{{ strtoupper($firstLetter) }}</span>
                </div>
                <div>
                    <p class="font-medium text-gray-800">{{ $permission->name }}</p>
                </div>
            </div>
            <div class="col-span-5 flex items-center text-gray-500">
                @php
                    $parts = explode('-', $permission->name);
                    $module = isset($parts[1]) ? ucfirst($parts[1]) : 'System';
                @endphp
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $module }}
                </span>
            </div>
            <div class="col-span-2 flex justify-end items-center space-x-2">
                <a href="{{ route('permissions.edit', $permission->id) }}" class="p-2 bg-amber-100 text-amber-600 rounded-md hover:bg-amber-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this permission?')" class="p-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    
</div>
@endsection