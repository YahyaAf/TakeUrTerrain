@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Gestion des Utilisateurs</h1>

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 bg-gray-100">ID</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 bg-gray-100">Nom</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 bg-gray-100">Email</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 bg-gray-100">Statut</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 bg-gray-100">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Utilisateur 1 -->
            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-700">1</td>
                <td class="px-6 py-4 text-sm text-gray-700">John Doe</td>
                <td class="px-6 py-4 text-sm text-gray-700">john.doe@example.com</td>
                <td class="px-6 py-4 text-sm">
                    <span class="px-3 py-1 inline-block text-sm font-medium rounded-full bg-green-100 text-green-700">
                        Accepted
                    </span>
                </td>
                <td class="px-6 py-4 text-sm">
                    <div class="flex space-x-3">
                        <!-- Ban Button -->
                        <button onclick="confirmAction('#')" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-user-slash"></i>
                        </button>

                        <!-- Accept Button -->
                        <button onclick="confirmAction('#')" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-check-circle"></i>
                        </button>

                        <!-- Refuse Button -->
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-times-circle"></i>
                        </button>

                        <!-- Delete Button -->
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <!-- Utilisateur 2 -->
            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-700">2</td>
                <td class="px-6 py-4 text-sm text-gray-700">Jane Smith</td>
                <td class="px-6 py-4 text-sm text-gray-700">jane.smith@example.com</td>
                <td class="px-6 py-4 text-sm">
                    <span class="px-3 py-1 inline-block text-sm font-medium rounded-full bg-red-100 text-red-700">
                        Refused
                    </span>
                </td>
                <td class="px-6 py-4 text-sm">
                    <div class="flex space-x-3">
                        <button onclick="confirmAction('#')" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-check-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <!-- Utilisateur 3 -->
            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-700">3</td>
                <td class="px-6 py-4 text-sm text-gray-700">Samuel Lee</td>
                <td class="px-6 py-4 text-sm text-gray-700">samuel.lee@example.com</td>
                <td class="px-6 py-4 text-sm">
                    <span class="px-3 py-1 inline-block text-sm font-medium rounded-full bg-green-100 text-green-700">
                        Accepted
                    </span>
                </td>
                <td class="px-6 py-4 text-sm">
                    <div class="flex space-x-3">
                        <button onclick="confirmAction('#')" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-check-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <!-- Utilisateur 4 -->
            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-700">4</td>
                <td class="px-6 py-4 text-sm text-gray-700">Emily Davis</td>
                <td class="px-6 py-4 text-sm text-gray-700">emily.davis@example.com</td>
                <td class="px-6 py-4 text-sm">
                    <span class="px-3 py-1 inline-block text-sm font-medium rounded-full bg-red-100 text-red-700">
                        Refused
                    </span>
                </td>
                <td class="px-6 py-4 text-sm">
                    <div class="flex space-x-3">
                        <button onclick="confirmAction('#')" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-check-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>

            <!-- Utilisateur 5 -->
            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-700">5</td>
                <td class="px-6 py-4 text-sm text-gray-700">Michael Brown</td>
                <td class="px-6 py-4 text-sm text-gray-700">michael.brown@example.com</td>
                <td class="px-6 py-4 text-sm">
                    <span class="px-3 py-1 inline-block text-sm font-medium rounded-full bg-green-100 text-green-700">
                        Accepted
                    </span>
                </td>
                <td class="px-6 py-4 text-sm">
                    <div class="flex space-x-3">
                        <button onclick="confirmAction('#')" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-user-slash"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-check-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-times-circle"></i>
                        </button>
                        <button onclick="confirmAction('#')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<script>
    function confirmAction(url) {
        if (confirm("Êtes-vous sûr de vouloir effectuer cette action ?")) {
            window.location.href = url;
        }
    }
</script>

@endsection
