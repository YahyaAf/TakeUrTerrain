@extends('frontOffice.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-16 mb-10">
    <div class="relative bg-black shadow-2xl rounded-2xl overflow-hidden border border-gray-800">
        <div class="absolute -top-16 -right-16 w-64 h-64 bg-gradient-to-br from-purple-600 to-pink-500 rounded-full blur-2xl opacity-10"></div>
        <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-gradient-to-tr from-blue-400 to-cyan-500 rounded-full blur-2xl opacity-10"></div>
        
        <div class="absolute top-0 right-0 w-32 h-32 opacity-20">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#4ADE80" d="M44.3,-76.7C58.4,-70.6,71.7,-60.9,79.9,-47.7C88.1,-34.4,91.4,-17.2,90.4,-0.6C89.4,16,84.2,32,74.7,44.7C65.2,57.3,51.4,66.7,37.2,71.4C22.9,76.2,8.2,76.3,-6.7,75.1C-21.6,73.8,-36.8,71.2,-48.9,63.5C-60.9,55.8,-69.9,43,-76.1,28.9C-82.4,14.8,-86,0.3,-83.9,-13.3C-81.7,-26.9,-73.9,-39.5,-63.6,-49.8C-53.2,-60.1,-40.4,-68,-27.1,-72.3C-13.9,-76.5,-0.3,-77.1,13.8,-78.4C27.9,-79.6,56,-94.6,69.1,-88.7C82.2,-82.8,80.5,-56.1,78.1,-39.7C75.7,-23.3,72.7,-17.2,69.2,-11.6C65.8,-6,62,-0.9,57.5,2.6C53,6,48,7.8,46.4,11.7C44.8,15.5,46.5,21.4,43.9,24.2C41.3,27.1,34.3,26.8,28.2,25.6C22.1,24.4,16.9,22.2,13.7,27.8C10.4,33.4,9.2,46.9,4.8,52.3C0.5,57.8,-7,55.2,-13.2,52.6C-19.5,50,-24.6,47.2,-31.9,44.3C-39.3,41.4,-48.9,38.3,-53.1,32C-57.3,25.7,-56.2,16.2,-59.6,5.9C-63,-4.4,-70.9,-15.5,-70.2,-24.8C-69.5,-34.1,-60.2,-41.6,-50.5,-46.9C-40.8,-52.3,-30.7,-55.5,-21.1,-64.6C-11.6,-73.7,-2.3,-88.8,7.7,-91.2C17.7,-93.6,36.5,-83.2,44.3,-76.7Z" transform="translate(100 100)" />
            </svg>
        </div>
        
        <div class="relative h-20 bg-gradient-to-r from-gray-900 to-black border-b border-gray-800">
            <div class="absolute inset-0 bg-grid-white/[0.05]"></div>
            <div class="absolute bottom-0 left-0 right-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-20 transform translate-y-px">
                    <path fill="#000000" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
                </svg>
            </div>
            <div class="absolute top-0 left-0 w-1/3 h-1 bg-gradient-to-r from-purple-500 to-pink-500"></div>
        </div>

        <div class="px-8 py-6 pt-0 text-gray-200">
            <div class="flex items-center mb-10 relative">
                <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-500">Modifier mon profil</h2>
                <div class="ml-4 flex-grow h-0.5 bg-gradient-to-r from-cyan-500 via-blue-500 to-transparent relative overflow-hidden">
                    <div class="absolute inset-0 w-1/3 h-full bg-white opacity-30 animate-pulse"></div>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-gradient-to-r from-cyan-900/40 to-blue-900/40 border-l-4 border-cyan-500 rounded-r-lg text-cyan-300 text-sm relative overflow-hidden">
                    <div class="absolute inset-0 bg-grid-white/[0.03]"></div>
                    <div class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')
                
                <div class="flex justify-center mb-8">
                    <div class="relative group">
                        <div class="absolute -inset-0.5 rounded-full bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 opacity-30 blur group-hover:opacity-100 transition duration-1000 group-hover:duration-300 animate-gradient-xy"></div>
                        
                        <div class="relative w-32 h-32 rounded-full border-2 border-gray-800 shadow-lg overflow-hidden bg-gray-900 transition-all duration-300 group-hover:border-gray-700">
                            <img id="avatar-preview" src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/default-avatar.png') }}" 
                                alt="Profile" class="w-full h-full object-cover">
                                
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-cyan-500/10 to-transparent h-full w-full opacity-0 group-hover:opacity-100 animate-scanline pointer-events-none"></div>
                        </div>
                        
                        <label for="photo" class="absolute inset-0 flex items-center justify-center cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                            <div class="w-full h-full bg-black bg-opacity-70 flex items-center justify-center rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </label>
                        <input type="file" name="photo" id="photo" accept="image/*" class="hidden" onchange="previewImage(this)">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-6 gap-8">
                    <div class="md:col-span-3 relative">
                        <div class="group">
                            <div class="relative z-0">
                                <input type="text" name="name" id="name" 
                                      value="{{ old('name', Auth::user()->name) }}" required
                                      class="block w-full px-0 pt-5 pb-2.5 text-sm text-gray-200 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-500 peer" 
                                      placeholder=" " />
                                <label for="name" 
                                      class="absolute text-sm text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] peer-focus:text-cyan-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                      Nom complet
                                </label>
                            </div>
                            <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-cyan-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                        </div>
                    </div>
                    
                    <div class="md:col-span-3 relative">
                        <div class="group">
                            <div class="relative z-0">
                                <input type="email" name="email" id="email" 
                                      value="{{ old('email', Auth::user()->email) }}" required
                                      class="block w-full px-0 pt-5 pb-2.5 text-sm text-gray-200 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-cyan-500 peer" 
                                      placeholder=" " />
                                <label for="email" 
                                      class="absolute text-sm text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] peer-focus:text-cyan-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                      Adresse e-mail
                                </label>
                            </div>
                            <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-cyan-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                        </div>
                    </div>
                    
                    <div class="md:col-span-3 md:col-start-2 relative">
                        <div class="group">
                            <div class="relative z-0">
                                <input type="password" name="password" id="password" 
                                      class="block w-full px-0 pt-5 pb-2.5 text-sm text-gray-200 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-purple-500 peer" 
                                      placeholder=" " />
                                <label for="password" 
                                      class="absolute text-sm text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] peer-focus:text-purple-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                      Nouveau mot de passe
                                </label>
                            </div>
                            <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-purple-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                        </div>
                        <div class="absolute -right-4 -bottom-4 w-8 h-8 border-r-2 border-b-2 border-purple-500/30 rounded-br-lg"></div>
                    </div>
                    
                    <div class="md:col-span-3 relative">
                        <div class="group">
                            <div class="relative z-0">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                      class="block w-full px-0 pt-5 pb-2.5 text-sm text-gray-200 bg-transparent border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-purple-500 peer" 
                                      placeholder=" " />
                                <label for="password_confirmation" 
                                      class="absolute text-sm text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] peer-focus:text-purple-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
                                      Confirmer le mot de passe
                                </label>
                            </div>
                            <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-purple-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                        </div>
                        <div class="absolute -left-4 -bottom-4 w-8 h-8 border-l-2 border-b-2 border-purple-500/30 rounded-bl-lg"></div>
                    </div>
                </div>

                <div class="pt-10">
                    <button type="submit" class="group relative w-full py-4 px-6 bg-black border border-gray-800 text-gray-200 font-medium rounded-lg overflow-hidden">
                        <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 opacity-0 group-hover:opacity-100 group-hover:blur-sm"></span>
                        <span class="absolute inset-0 w-full h-full bg-black opacity-0 group-hover:opacity-80"></span>
                        
                        <span class="relative flex items-center justify-center">
                            <span class="absolute top-0 left-0 w-2 h-2 border-t border-l border-cyan-500"></span>
                            <span class="absolute top-0 right-0 w-2 h-2 border-t border-r border-purple-500"></span>
                            <span class="absolute bottom-0 left-0 w-2 h-2 border-b border-l border-cyan-500"></span>
                            <span class="absolute bottom-0 right-0 w-2 h-2 border-b border-r border-purple-500"></span>
                            <span class="mr-2 group-hover:text-cyan-400 transition-colors duration-300">Mettre à jour</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition-all duration-300 group-hover:text-cyan-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
@keyframes gradient-xy {
  0%, 100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}

@keyframes scanline {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(100%);
  }
}

.animate-gradient-xy {
  animation: gradient-xy 15s ease infinite;
  background-size: 400% 400%;
}

.animate-scanline {
  animation: scanline 2s linear infinite;
}

.bg-grid-white {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23FFFFFF' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('avatar-preview').setAttribute('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection