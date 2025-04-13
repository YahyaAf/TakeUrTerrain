@extends('frontOffice.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-12 bg-white shadow-lg rounded-xl p-8 mb-5">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Modifier mon profil</h2>

    @if(session('success'))
        <div class="mb-6 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500">
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo de profil</label>
            <input type="file" name="photo" id="photo" accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-cyan-50 file:text-cyan-700
                          hover:file:bg-cyan-100">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Facultatif"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-cyan-500 focus:border-cyan-500">
        </div>

        <div class="pt-4 text-center">
            <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-lg text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
