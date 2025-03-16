@extends('backOffice.layouts.app')

@section('content')
<div class="bg-gray-50 py-8 px-6 rounded-lg shadow-sm max-w-3xl mx-auto mt-6">
    <div class="mb-6">
        <a href="{{ route('permissions.index') }}" class="text-blue-500 hover:text-blue-600 flex items-center mb-4 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Permissions
        </a>
        <h1 class="text-2xl font-bold text-gray-800">
            <span class="text-blue-500">#</span> Edit Permission
        </h1>
        <p class="text-gray-600 mt-1">Modify existing permission details</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Permission Name</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="text" name="name" id="name" class="pl-10 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" 
                        value="{{ $permission->name }}" required>
                </div>
                <p class="mt-2 text-sm text-gray-500">Use a specific naming format like "action-resource" (e.g., view-users, create-posts)</p>
                
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <a href="{{ route('permissions.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <div class="flex space-x-3">
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this permission?')" 
                            class="bg-red-50 text-red-600 py-2 px-4 border border-red-200 rounded-md shadow-sm text-sm font-medium hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Delete
                        </button>
                    </form>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg flex items-center transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Update Permission
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Usage Information Card -->
    <div class="mt-6 bg-yellow-50 border border-yellow-100 rounded-lg p-4">
        <h3 class="text-sm font-medium text-yellow-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Important Note
        </h3>
        <p class="mt-2 text-sm text-yellow-700">
            Changing a permission name may affect existing role assignments and access controls.
            Make sure to update any roles that use this permission if you modify its name.
        </p>
    </div>
</div>
@endsection