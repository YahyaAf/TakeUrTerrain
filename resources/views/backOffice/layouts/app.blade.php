<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DASHMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        #map {
            width: 100%;
            height: 500px;  
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
</body>
</html>