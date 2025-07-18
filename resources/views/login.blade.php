<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/evblogo.png" type="image/x-icon" />
    <title>Licensing Monitoring System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[url('../../public/images/Background-cis.jpg')] bg-no-repeat bg-cover bg-center backdrop-blur-lg text-white flex items-center justify-center min-h-screen">
    <div class="p-7 md:p-8 w-115 h-105 flex flex-col items-center justify-center">
        <img src="images/homelogo.png" alt="EVB Logo" class="w-70 mb-8">
        <form action="{{ route('login') }}" method="POST" class="w-full">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <div class="flex items-center mt-1">
                    <span class="size-5 ml-2 flex items-center absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </span>
                    <input required type="email" name="email" id="email"
                        class="p-2 pl-10 block w-full rounded-md border-1 border-slate-50 shadow-lg bg-transparent"
                        value="{{ old('email') }}" autocomplete="off" placeholder="Roundcube Email">
                </div>
            </div>
            <div class="mb-10">
                <label for="password" class="block text-sm font-medium">Password</label>
                <div class="flex items-center mt-1 relative">
                    <span class="size-5 ml-2 flex items-center absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                    </span>
                    <input required type="password" name="password" id="password"
                        class="p-2 pl-10 block w-full rounded-md border-1 border-slate-50 shadow-lg bg-transparent"
                        placeholder="Password">
                    <button type="button" id="togglePassword" class="absolute right-3 hidden" tabindex="-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
                <a href="#" class="text-sm float-right my-2 mb-10">Forgot password</a>
            </div>
            <button type="submit"
                class="w-full border-1 p-3 rounded-md text-white transition duration-400 hover:scale-105 cursor-pointer">Login</button>
        </form>
        @if (session('error'))
            <div class="fixed z-50 flex items-center max-w-xs w-full bg-rose-600 text-white px-6 py-4 rounded-lg shadow-lg font-semibold animate-notif left-1/2 bottom-8 transform"
                role="alert" id="error-alert">
                <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="flex-1 text-left">{{ session('error') }}</span>
            </div>
        @elseif (session('success'))
            <div class="fixed z-50 flex items-center max-w-xs w-full bg-emerald-700 text-white px-6 py-4 rounded-lg shadow-lg font-semibold animate-notif left-1/2 bottom-8 transform"
                role="alert" id="success-alert">
                <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="flex-1 text-left">{{ session('success') }}</span>
            </div>
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleButton = document.getElementById('togglePassword');

            toggleButton.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                if (type === 'text') {
                    this.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        `;
                } else {
                    this.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        `;
                }
            });

            passwordInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    toggleButton.classList.remove('hidden');
                } else {
                    toggleButton.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
