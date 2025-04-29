<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Suspended</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f87171 0%, #ef4444 50%, #dc2626 100%);
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .float {
            animation: float 6s ease-in-out infinite;
        }
        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-3xl w-full">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="gradient-bg px-8 py-12 text-white text-center relative">
                <div class="absolute top-4 right-4">
                    <i class="fas fa-exclamation-triangle text-2xl"></i>
                </div>
                <div class="mb-8 relative">
                    <div class="float absolute -top-16 left-1/2 transform -translate-x-1/2">
                        <i class="fas fa-ban text-9xl opacity-10"></i>
                    </div>
                    <i class="fas fa-lock text-7xl"></i>
                </div>
                <h1 class="text-4xl font-bold mb-4">Account Suspended</h1>
                <p class="text-xl max-w-lg mx-auto opacity-90">Your account has been temporarily suspended due to a violation of our community guidelines.</p>
            </div>
            
            <div class="px-8 py-10">
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">
                                This decision is effective immediately and will remain in place until further notice.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-info-circle mr-2 text-red-500"></i>
                            Why was my account suspended?
                        </h2>
                        <p class="mt-2 text-gray-600">
                            Your account has been suspended for violating our community guidelines. This may include inappropriate behavior, sharing prohibited content, or multiple reports from other users.
                        </p>
                    </div>
                    
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-arrow-up mr-2 text-red-500"></i>
                            What can I do now?
                        </h2>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-6 w-6 rounded-full bg-red-100 text-red-600">
                                        <span class="text-xs font-medium">1</span>
                                    </div>
                                </div>
                                <p class="ml-3 text-gray-600">Review our community guidelines to understand the violation.</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-6 w-6 rounded-full bg-red-100 text-red-600">
                                        <span class="text-xs font-medium">2</span>
                                    </div>
                                </div>
                                <p class="ml-3 text-gray-600">Contact our admin team by email to discuss your account status.</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-6 w-6 rounded-full bg-red-100 text-red-600">
                                        <span class="text-xs font-medium">3</span>
                                    </div>
                                </div>
                                <p class="ml-3 text-gray-600">Wait for our team to review your case (usually within 48 hours).</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="mt-10 bg-gray-50 rounded-xl p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-envelope mr-2 text-red-500"></i>
                        Contact Admin
                    </h2>
                    <p class="text-gray-600 mb-4">
                        If you believe this suspension was made in error, please contact our admin team:
                    </p>
                    <div class="flex items-center p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                        <i class="fas fa-envelope-open-text text-2xl text-red-500 mr-4"></i>
                        <div>
                            <p class="font-medium text-gray-800">Email our support team</p>
                            <a href="mailto:admin@yourcompany.com" class="text-red-600 hover:text-red-700 font-medium">
                                yahyaclarke0@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="text-sm text-gray-500">
                        &copy; 2025 Your Company. All rights reserved.
                    </div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Contact</span>
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Help Center</span>
                            <i class="fas fa-question-circle"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Community Guidelines</span>
                            <i class="fas fa-shield-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-lightbulb text-yellow-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Need immediate assistance?</h3>
                    <p class="text-gray-600">
                        If your issue is urgent, you can contact our emergency support line at 
                        <span class="text-red-600 font-medium">+212 94285418</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>