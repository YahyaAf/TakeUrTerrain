<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terrain Reservation - Réinitialisation du Mot de Passe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-green-50 min-h-screen flex items-center justify-center p-6">
    <div class="container mx-auto">
        <div class="grid md:grid-cols-2 bg-white shadow-2xl rounded-2xl overflow-hidden max-w-4xl mx-auto">
            
            <div class="hidden md:block bg-cover bg-center" style="background-image: url('/api/placeholder/600/800')">
                <div class="h-full bg-black bg-opacity-40 flex items-center justify-center p-12">
                    <div class="text-white text-center">
                        <h2 class="text-4xl font-bold mb-4">Terrain Reservation</h2>
                        <p class="text-xl mb-6">Réinitialisez votre mot de passe en toute sécurité</p>
                        <div class="flex justify-center space-x-4">
                            <i class="fas fa-key text-5xl text-green-400"></i>
                            <i class="fas fa-lock text-5xl text-blue-400"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="p-8 md:p-12 flex flex-col justify-center">
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Réinitialiser le Mot de Passe</h1>
                    <p class="text-gray-600">Créez un nouveau mot de passe sécurisé</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-blue-500"></i>Adresse Email
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.01]"
                            placeholder="vous@exemple.com"
                            value="{{ $email ?? old('email') }}"
                            readonly
                        >
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>Nouveau Mot de Passe
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.01]"
                            placeholder="Créez un nouveau mot de passe"
                        >
                        @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>Confirmer le Mot de Passe
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.01]"
                            placeholder="Répétez le nouveau mot de passe"
                        >
                    </div>

                    <div>
                        <button 
                            type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]"
                        >
                            Réinitialiser le Mot de Passe
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Vous vous souvenez de votre mot de passe ? 
                            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                Connectez-vous
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-6 text-gray-500">
            <p class="text-sm">© 2024 Terrain Reservation. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
