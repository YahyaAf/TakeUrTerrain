@extends('backOffice.layouts.app')

@section('content')
<div class="bg-gray-50 py-8 px-6 rounded-lg shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <span class="text-blue-500">#</span> Roles Management
        </h1>
        <a href="{{ route('roles.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition-all duration-200 transform hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Role
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
            <input type="text" class="py-2 pl-10 pr-4 block w-64 rounded-md bg-white border border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Search roles...">
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('permissions.index') }}" class="bg-white hover:bg-gray-50 text-gray-600 px-3 py-2 rounded-md border border-gray-200 flex items-center text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Manage Permissions
            </a>
        </div>
    </div>

    <!-- Roles table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="grid grid-cols-12 bg-gray-50 border-b border-gray-100 py-4 px-6">
            <div class="col-span-3 font-medium text-gray-700">Role Name</div>
            <div class="col-span-7 font-medium text-gray-700">Permissions</div>
            <div class="col-span-2 font-medium text-gray-700 text-right">Actions</div>
        </div>

        @foreach ($roles as $role)
        <div class="grid grid-cols-12 py-4 px-6 border-b border-gray-100 hover:bg-blue-50 transition-colors duration-150">
            <div class="col-span-3 flex items-center">
                <div class="h-8 w-8 rounded-md {{ $role->name === 'admin' ? 'bg-purple-100 text-purple-500' : 'bg-blue-100 text-blue-500' }} flex items-center justify-center mr-3">
                    @php
                        $firstLetter = substr($role->name, 0, 1);
                    @endphp
                    <span class="font-medium">{{ strtoupper($firstLetter) }}</span>
                </div>
                <div>
                    <p class="font-medium text-gray-800">{{ $role->name }}</p>
                    <p class="text-xs text-gray-500">{{ count($role->permissions) }} permissions</p>
                </div>
            </div>
            <div class="col-span-7 flex items-center flex-wrap gap-1">
                @foreach ($role->permissions as $index => $permission)
                    @if ($index < 5)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $permission->name }}
                        </span>
                    @elseif ($index === 5)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            +{{ count($role->permissions) - 5 }} more
                        </span>
                        @break
                    @endif
                @endforeach
                @if (count($role->permissions) === 0)
                    <span class="text-sm text-gray-500 italic">No permissions assigned</span>
                @endif
            </div>
            <div class="col-span-2 flex justify-end items-center space-x-2">
                <a href="{{ route('roles.edit', $role->id) }}" class="p-2 bg-amber-100 text-amber-600 rounded-md hover:bg-amber-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                @if ($role->name !== 'admin')
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this role?')" class="p-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Role Info Card -->
    <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4">
        <h3 class="text-sm font-bold text-blue-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Role Management Information
        </h3>
        <p class="mt-2 text-sm text-blue-700">
            Roles are collections of permissions that can be assigned to users. A user with a specific role will have access to all features 
            granted by the permissions assigned to that role.
        </p>
    </div>
</div>
@endsection