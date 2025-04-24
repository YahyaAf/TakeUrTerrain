@extends('backOffice.layouts.app')
@section('content')
@auth
@if(auth()->user()->hasRole('organisateur'))
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-500">Terrains créés</h3>
                    <p class="text-2xl font-semibold text-blue-700">{{ $terrainCount }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-500">Catégories</h3>
                    <p class="text-2xl font-semibold text-green-700">{{ $categorieCount }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zM13 5h6m0 0v6m0-6l-6 6" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-500">Tags</h3>
                    <p class="text-2xl font-semibold text-yellow-700">{{ $tagCount }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.105 0 2-.672 2-1.5S13.105 5 12 5s-2 .672-2 1.5S10.895 8 12 8zM12 10v10m0 0l3-3m-3 3l-3-3" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-500">Réservations</h3>
                    <p class="text-2xl font-semibold text-red-700">{{ $reservationCount }}</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a4 4 0 00-8 0v2m10 0v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9h12z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-medium">Worldwide Sales</h2>
            </div>
            <canvas id="worldwideSalesChart" height="240"></canvas>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-medium">Sales & Revenue</h2>
            </div>
            <canvas id="salesRevenueChart" height="240"></canvas>
        </div>
    </div>

@elseif(auth()->user()->hasRole('admin'))
    <div class="my-10 mx-auto max-w-6xl bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl shadow-xl p-8 border border-blue-100">
        <div class="flex items-center mb-6">
            <div class="bg-blue-600 rounded-lg p-3 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Espace Administrateur</h2>
                <p class="text-blue-600 font-medium">Tableau de bord de gestion</p>
            </div>
        </div>

        <p class="text-gray-600 mb-8 pl-2 border-l-4 border-blue-500 italic bg-blue-50 py-2 px-3 rounded">
            Bienvenue dans votre interface d'administration. Gérez efficacement les utilisateurs, les contenus et suivez les métriques importantes.
        </p>

        <div class="flex flex-col lg:flex-row gap-6">
            <div class="w-full lg:w-2/5">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all hover:scale-105 group">
                        <div class="bg-blue-600 h-2 w-full group-hover:h-3 transition-all"></div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-700">Terrains</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
                                </svg>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $terrainCount }}</p>
                            <div class="mt-2 h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="bg-blue-600 h-full rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all hover:scale-105 group">
                        <div class="bg-green-600 h-2 w-full group-hover:h-3 transition-all"></div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-700">Catégories</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $categorieCount }}</p>
                            <div class="mt-2 h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="bg-green-600 h-full rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all hover:scale-105 group">
                        <div class="bg-purple-600 h-2 w-full group-hover:h-3 transition-all"></div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-700">Tags</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $tagCount }}</p>
                            <div class="mt-2 h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="bg-purple-600 h-full rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all hover:scale-105 group">
                        <div class="bg-yellow-500 h-2 w-full group-hover:h-3 transition-all"></div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-700">Organisateurs</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $organisateur }}</p>
                            <div class="mt-2 h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="bg-yellow-500 h-full rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all hover:scale-105 group col-span-2">
                        <div class="bg-red-500 h-2 w-full group-hover:h-3 transition-all"></div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-700">Clients</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <p class="text-2xl font-bold text-gray-800">{{ $client }}</p>
                            <div class="mt-2 h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="bg-red-500 h-full rounded-full" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-3/5 bg-white rounded-xl shadow-lg p-6 border border-gray-100 flex flex-col justify-center">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Répartition des terrains par catégorie</h2>
                        <p class="text-gray-500 text-sm">Analyse visuelle de la distribution</p>
                    </div>
                    <div class="bg-blue-100 rounded-lg p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                </div>
                <div class="relative flex-grow flex items-center justify-center">
                    <canvas id="terrainsCategoryDoughnutChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="#" class="text-blue-600 hover:text-blue-800 flex items-center text-sm font-medium">
                Voir toutes les statistiques
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
@endif
@endauth

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const reservationCtx = document.getElementById('worldwideSalesChart').getContext('2d');
    const reservationsByMonth = @json($reservationsByMonth);
    new Chart(reservationCtx, {
        type: 'line',
        data: {
            labels: Object.keys(reservationsByMonth),
            datasets: [{
                label: 'Réservations',
                data: Object.values(reservationsByMonth),
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    const categoryCtx = document.getElementById('salesRevenueChart').getContext('2d');
    const terrainsByCategory = @json($terrainsByCategory);

    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(terrainsByCategory),
            datasets: [{
                label: 'Terrains par Catégorie',
                data: Object.values(terrainsByCategory),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });

</script>
<script>
    const terrainsCategoryCtx = document.getElementById('terrainsCategoryDoughnutChart').getContext('2d');
    const terrainsCategoryData = @json($terrainsByCategory);

    new Chart(terrainsCategoryCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(terrainsCategoryData),
            datasets: [{
                label: 'Terrains par Catégorie',
                data: Object.values(terrainsCategoryData),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            return `${label}: ${value}`;
                        }
                    }
                }
            }
        }
    });
</script>



@endsection