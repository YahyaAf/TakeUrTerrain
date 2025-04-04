@extends('frontOffice.layouts.app')
@section('content')
{{-- style="background-image: url('img/1338700.png'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;" --}}
<section class="bg-gradient-to-br from-blue-50 via-white to-green-50 min-h-screen flex items-center justify-center p-6">
    <div class="container mx-auto mt-20">
        <div class="grid md:grid-cols-2 bg-white shadow-2xl rounded-2xl overflow-hidden max-w-4xl mx-auto">
            <div class="hidden md:block bg-cover bg-center" style="background-image: url('/api/placeholder/600/800')">
                <div class="h-full bg-black bg-opacity-40 flex items-center justify-center p-12">
                    <div class="text-white text-center">
                        <h2 class="text-4xl font-bold mb-4">Contactez-nous</h2>
                        <p class="text-xl mb-6">Nous sommes à votre écoute</p>
                        <div class="flex justify-center space-x-4">
                            <i class="fas fa-envelope text-5xl text-green-400"></i>
                            <i class="fas fa-comments text-5xl text-blue-400"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="p-8 md:p-12 flex flex-col justify-center">
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Contactez-nous</h1>
                    <p class="text-gray-600">Envoyez-nous votre message</p>
                </div>

                <form method="POST" action="" class="space-y-6">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Oups !</strong>
                            <ul class="mt-2 list-disc pl-6">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user mr-2 text-blue-500"></i>Nom Complet
                        </label>
                        <input 
                            name="name"
                            value="{{ old('name') }}" 
                            type="text" 
                            required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.01]"
                            placeholder="Votre nom et prénom"
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-blue-500"></i>Adresse Email
                        </label>
                        <input 
                            name="email"
                            value="{{ old('email') }}" 
                            type="email" 
                            required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.01]"
                            placeholder="vous@exemple.com"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-comment mr-2 text-blue-500"></i>Message
                        </label>
                        <textarea 
                            name="message"
                            required 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.01]"
                            placeholder="Votre message ici..."
                            rows="4"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div>
                        <button 
                            type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]"
                        >
                            Envoyer
                        </button>
                    </div>
                </form>                
            </div>
        </div>
        
        <div class="text-center mt-6 text-gray-500">
            <p class="text-sm">© 2024 Terrain Reservation. Tous droits réservés.</p>
        </div>
    </div>
</section>
@endsection