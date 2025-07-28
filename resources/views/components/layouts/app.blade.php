@include('partials.header')
<x-sidebar :title="$title ?? null" />
<flux:main>
    {{ $slot }}
</flux:main>
@session('success')
<div class="fixed z-50 flex items-center max-w-xs w-full bg-green-100 dark:bg-green-800 text-green-500 dark:text-green-200 px-6 py-4 rounded-lg shadow-lg font-semibold right-6 bottom-6 transition-all duration-500"
    x-data="{ show: true }" x-show="show" x-init="setTimeout(() => { show = false }, 3000)" x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-x-20" x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-20" role="alert">
    <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
    </svg>
    <span class="flex-1 text-left text-sm font-normal">{{ $value }}</span>
</div>
@endsession('success')
@include('partials.footer')
