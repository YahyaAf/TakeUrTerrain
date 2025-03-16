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
            <span class="text-blue-500">#</span> Create New Permission
        </h1>
        <p class="text-gray-600 mt-1">Add a new permission to control access to system features</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Permission Name</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="text" name="name" id="name" class="pl-10 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" 
                           placeholder="e.g., create-users, edit-posts, etc." required>
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
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg flex items-center transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Create Permission
                </button>
            </div>
        </form>
    </div>
    
    <!-- Quick Help Card -->
    <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4">
        <h3 class="text-sm font-medium text-blue-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Permission Naming Tips
        </h3>
        <ul class="mt-2 text-sm text-blue-700 list-disc list-inside space-y-1">
            <li>Use the format "verb-resource" (e.g., create-users, view-posts)</li>
            <li>Keep names consistent across similar operations</li>
            <li>Use plurals for resource names (users, posts, reports)</li>
            <li>Common verbs: create, read, view, edit, update, delete, manage, list</li>
        </ul>
    </div>
</div>
@endsection