@include('partials.header')
<div class="min-h-screen">
    <x-sidebar />
    {{ $slot }}
</div>
@if (session('success'))
    <div class="fixed z-50 flex items-center max-w-xs w-full bg-emerald-700 text-white px-6 py-4 rounded-lg shadow-lg font-semibold animate-notif left-1/2 bottom-8 transform"
        role="alert" id="success-alert">
        <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="flex-1 text-left">{{ session('success') }}</span>
    </div>
@endif
@include('partials.footer')
