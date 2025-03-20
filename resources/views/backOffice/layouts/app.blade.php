<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <div class="w-64 bg-white shadow-md flex-shrink-0">
            @include('backOffice.layouts.sidebar')
        </div>

        <div class="flex-1 flex flex-col">
            <div class="bg-white shadow-sm">
                @include('backOffice.layouts.navbar')
            </div>
            
            <div class="p-4 flex-1 overflow-auto">
                @yield('content')     
            </div>
        </div>
    </div>
    
    <script>
        const worldwideSalesCtx = document.getElementById('worldwideSalesChart').getContext('2d');
        const worldwideSalesChart = new Chart(worldwideSalesCtx, {
            type: 'bar',
            data: {
                labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022'],
                datasets: [
                    {
                        label: 'USA',
                        data: [15, 30, 55, 65, 60, 80, 95],
                        backgroundColor: '#3B82F6',
                    },
                    {
                        label: 'UK',
                        data: [8, 35, 40, 60, 70, 55, 75],
                        backgroundColor: '#60A5FA',
                    },
                    {
                        label: 'AU',
                        data: [12, 25, 45, 55, 65, 70, 60],
                        backgroundColor: '#93C5FD',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const salesRevenueCtx = document.getElementById('salesRevenueChart').getContext('2d');
        const salesRevenueChart = new Chart(salesRevenueCtx, {
            type: 'line',
            data: {
                labels: ['2016', '2017', '2018', '2019', '2020', '2021', '2022'],
                datasets: [
                    {
                        label: 'Sales',
                        data: [90, 110, 120, 150, 170, 180, 220],
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        borderColor: '#3B82F6',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Revenue',
                        data: [100, 140, 180, 140, 160, 190, 210],
                        backgroundColor: 'rgba(96, 165, 250, 0.2)',
                        borderColor: '#60A5FA',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>