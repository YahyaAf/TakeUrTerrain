<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsPitch | Premium Sports Court Reservation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        .hero-pattern {
            background-image: url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
        }
        
        .gradient-overlay {
            background: linear-gradient(to right, rgba(6, 182, 212, 0.9), rgba(6, 182, 212, 0.7), rgba(6, 182, 212, 0.5));
        }
        
        .custom-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .sport-card:hover .sport-overlay {
            opacity: 1;
        }
        
        .court-card:hover {
            transform: translateY(-10px);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .time-slot:hover {
            background-color: #06b6d4;
            color: white;
            transform: scale(1.05);
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #06b6d4, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .loader {
            border-top-color: #06b6d4;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }
        
        @-webkit-keyframes spinner {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spinner {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">
    <div class="w-64 bg-white shadow-md flex-shrink-0">
        @include('frontOffice.layouts.header')
    </div>

    <div>
        @yield('content')    
    </div>

    <div>
        @include('frontOffice.layouts.footer')
    </div>
    
</body>
</html>
    