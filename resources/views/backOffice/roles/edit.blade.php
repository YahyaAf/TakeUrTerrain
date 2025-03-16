@extends('backOffice.layouts.app')

@section('content')
<div class="bg-gray-50 py-8 px-6 rounded-lg shadow-sm max-w-3xl mx-auto mt-6">
    <div class="mb-6">
        <a href="{{ route('roles.index') }}" class="text-blue-500 hover:text-blue-600 flex items-center mb-4 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Roles
        </a>
        <h1 class="text-2xl font-bold text-gray-800">
            <span class="text-blue-500">#</span> Edit Role: {{ $role->name }}
        </h1>
        <p class="text-gray-600 mt-1">Update permissions and role details</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Role Name</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" name="name" id="name" class="pl-10 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md py-3" 
                           value="{{ $role->name }}" required>
                </div>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-3">Update Permissions</label>
                
                <!-- Search permissions -->
                <div class="mb-4 relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" id="permissionSearch" class="pl-10 focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md py-2" 
                            placeholder="Filter permissions..." onkeyup="filterPermissions()">
                </div>
                
                <!-- Select/deselect all -->
                <div class="flex justify-between items-center mb-3 px-2">
                    <div class="flex items-center">
                        <button type="button" onclick="toggleAllPermissions(true)" class="text-sm text-blue-600 hover:text-blue-800">Select All</button>
                        <span class="mx-2 text-gray-400">|</span>
                        <button type="button" onclick="toggleAllPermissions(false)" class="text-sm text-blue-600 hover:text-blue-800">Deselect All</button>
                    </div>
                    <span id="permissionCounter" class="text-sm text-gray-500">{{ count($role->permissions) }} selected</span>
                </div>
                
                <!-- Permissions grid -->
                <div class="border border-gray-200 rounded-lg max-h-64 overflow-y-auto p-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1" id="permissionsContainer">
                        @foreach ($permissions as $permission)
                        <div class="permission-item flex items-center p-2 hover:bg-gray-50 rounded">
                            <input type="checkbox" name="permissions[]" id="perm{{ $permission->id }}" value="{{ $permission->id }}" 
                                class="permission-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                @if($role->permissions->contains($permission->id)) checked @endif>
                            <label for="perm{{ $permission->id }}" class="ml-2 block text-sm text-gray-700 cursor-pointer permission-name">
                                {{ $permission->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                @error('permissions')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <a href="{{ route('roles.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg flex items-center transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Role
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
            Editing Best Practices
        </h3>
        <ul class="mt-2 text-sm text-blue-700 list-disc list-inside space-y-1">
            <li>Review permission changes carefully before saving</li>
            <li>Communicate changes to affected users</li>
            <li>Check for permission conflicts</li>
            <li>Consider creating a new role instead of modifying existing ones</li>
        </ul>
    </div>
</div>

<script>
    function updatePermissionCounter() {
        const selectedCount = document.querySelectorAll('.permission-checkbox:checked').length;
        document.getElementById('permissionCounter').textContent = selectedCount + ' selected';
    }
    
    document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', updatePermissionCounter);
    });
    
    updatePermissionCounter();
    
    function filterPermissions() {
        const searchTerm = document.getElementById('permissionSearch').value.toLowerCase();
        const permissions = document.querySelectorAll('.permission-item');
        
        permissions.forEach(item => {
            const permissionName = item.querySelector('.permission-name').textContent.toLowerCase();
            item.style.display = permissionName.includes(searchTerm) ? 'flex' : 'none';
        });
    }
    
    function toggleAllPermissions(checked) {
        const visibleCheckboxes = Array.from(document.querySelectorAll('.permission-item'))
            .filter(item => item.style.display !== 'none')
            .map(item => item.querySelector('.permission-checkbox'));
            
        visibleCheckboxes.forEach(checkbox => {
            checkbox.checked = checked;
        });
        
        updatePermissionCounter();
    }
</script>
@endsection