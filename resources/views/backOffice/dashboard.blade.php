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
    <div class="my-10 mx-auto max-w-4xl bg-white rounded-xl shadow-lg p-6 border border-blue-200">
        <h2 class="text-2xl font-bold text-blue-700 mb-2">Espace Administrateur</h2>
        <p class="text-gray-600">
            Bienvenue dans votre interface d'administration. Ici, vous pouvez gérer les utilisateurs, les contenus, et suivre les actions importantes.
        </p>
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

@endsection