<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terrain Reservation - Mot de Passe Oublié</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-green-50 min-h-screen flex items-center justify-center p-6">

    <noscript>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded absolute top-4 left-1/2 transform -translate-x-1/2">
            JavaScript est désactivé. Certaines fonctionnalités peuvent ne pas fonctionner.
        </div>
    </noscript>

    <div class="container mx-auto">
        <div class="grid md:grid-cols-2 bg-white shadow-2xl rounded-2xl overflow-hidden max-w-4xl mx-auto">
            <div class="hidden md:block bg-cover bg-center" style="background-image: url('/images/forgot-password-bg.jpg');">
                <div class="h-full bg-black bg-opacity-40 flex items-center justify-center p-12">
                    <div class="text-white text-center">
                        <h2 class="text-4xl font-bold mb-4">Terrain Reservation</h2>
                        <p class="text-xl mb-6">Récupérez l'accès à votre compte</p>
                        <div class="flex justify-center space-x-4">
                            <i class="fas fa-unlock-alt text-5xl text-green-400" aria-hidden="true"></i>
                            <i class="fas fa-key text-5xl text-blue-400" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="p-8 md:p-12 flex flex-col justify-center">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif
                
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Mot de Passe Oublié ?</h1>
                    <p class="text-gray-600">Réinitialisez votre mot de passe en toute sécurité</p>
                </div>

                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-blue-500"></i> Adresse Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.01]"
                            placeholder="vous@exemple.com"
                            aria-label="Entrez votre adresse email"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button 
                            type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]"
                        >
                            Envoyer le Lien de Réinitialisation
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Vous vous souvenez de votre mot de passe ? 
                            <a href="{{ route('auth.login') }}" class="font-medium text-blue-600 hover:text-blue-500">
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