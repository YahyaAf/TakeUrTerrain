@extends('backOffice.layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Gestion des Rôles</h1>
        <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Ajouter un nouveau rôle</a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nom du Rôle</th>
                <th class="px-4 py-2 border">Description</th>
                <th class="px-4 py-2 border">Statut</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2 border">Admin</td>
                <td class="px-4 py-2 border">Accès complet au système</td>
                <td class="px-4 py-2 border">Actif</td>
                <td class="px-4 py-2 border">
                    <a href="#" class="text-blue-500">Modifier</a> |
                    <a href="#" class="text-red-500">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-2 border">Utilisateur</td>
                <td class="px-4 py-2 border">Accès limité aux fonctionnalités</td>
                <td class="px-4 py-2 border">Actif</td>
                <td class="px-4 py-2 border">
                    <a href="#" class="text-blue-500">Modifier</a> |
                    <a href="#" class="text-red-500">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-2 border">Modérateur</td>
                <td class="px-4 py-2 border">Modération du contenu</td>
                <td class="px-4 py-2 border">Inactif</td>
                <td class="px-4 py-2 border">
                    <a href="#" class="text-blue-500">Modifier</a> |
                    <a href="#" class="text-red-500">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-2 border">Support</td>
                <td class="px-4 py-2 border">Assistance aux utilisateurs</td>
                <td class="px-4 py-2 border">Actif</td>
                <td class="px-4 py-2 border">
                    <a href="#" class="text-blue-500">Modifier</a> |
                    <a href="#" class="text-red-500">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-2 border">Guest</td>
                <td class="px-4 py-2 border">Accès très limité</td>
                <td class="px-4 py-2 border">Inactif</td>
                <td class="px-4 py-2 border">
                    <a href="#" class="text-blue-500">Modifier</a> |
                    <a href="#" class="text-red-500">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
