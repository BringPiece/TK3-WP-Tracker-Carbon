<!doctype html>
<html lang="en">

<head>
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.1/cdn.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

</head>

<body class="min-h-screen">
    <header class="bg-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="flex items-center space-x-2 justify-center">
                <div class="bg-green-100 p-3 rounded-3xl flex items-center">
                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.5153 8.2288L10.0153 1.15255C10.0116 1.14935 10.0082 1.1459 10.005 1.14223C9.72887 0.891109 9.36903 0.751953 8.99578 0.751953C8.62253 0.751953 8.2627 0.891109 7.98656 1.14223L7.97625 1.15255L0.484687 8.2288C0.331873 8.36932 0.209891 8.54003 0.126461 8.73013C0.0430305 8.92022 -3.15402e-05 9.12557 1.73323e-08 9.33317V18.0004C1.73323e-08 18.3982 0.158035 18.7797 0.43934 19.061C0.720644 19.3423 1.10218 19.5004 1.5 19.5004H6C6.39782 19.5004 6.77936 19.3423 7.06066 19.061C7.34196 18.7797 7.5 18.3982 7.5 18.0004V13.5004H10.5V18.0004C10.5 18.3982 10.658 18.7797 10.9393 19.061C11.2206 19.3423 11.6022 19.5004 12 19.5004H16.5C16.8978 19.5004 17.2794 19.3423 17.5607 19.061C17.842 18.7797 18 18.3982 18 18.0004V9.33317C18 9.12557 17.957 8.92022 17.8735 8.73013C17.7901 8.54003 17.6681 8.36932 17.5153 8.2288ZM16.5 18.0004H12V13.5004C12 13.1025 11.842 12.721 11.5607 12.4397C11.2794 12.1584 10.8978 12.0004 10.5 12.0004H7.5C7.10218 12.0004 6.72064 12.1584 6.43934 12.4397C6.15804 12.721 6 13.1025 6 13.5004V18.0004H1.5V9.33317L1.51031 9.3238L9 2.25036L16.4906 9.32192L16.5009 9.3313L16.5 18.0004Z"
                            fill="#064E3B" />
                    </svg>

                    <span class="text-[#064E3B] ml-4 text-lg font-semibold">EcoPath</span>
                </div>
            </div>

            <nav class="flex space-x-8 text-gray-700">
                <a href="#" class="hover:text-green-700">Home</a>
                <a href="#" class="hover:text-green-700">About Us</a>
                <a href="#" class="hover:text-green-700">Our Team</a>
            </nav>

            <div class="flex space-x-4">
                @if(session()->has('user_name'))
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="bg-green-700 text-white px-4 py-2 rounded-md">
                            Hello, {{ session('user_name') }}!
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-2">
                            <form method="POST" action="{{ route('auth.signout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/auth/signin"
                        class="border-2 border-green-700 text-green-700 px-4 py-2 bg-[#EBFDF5] rounded-md hover:bg-green-100 transition">
                        Log In
                    </a>
                    <a href="/auth/signup" class="bg-[#65A30D] text-white px-4 py-2 rounded-md transition">
                        Join Now
                    </a>
                @endif
            </div>

        </div>
    </header>
</body>

</html>