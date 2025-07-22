<flux:sidebar sticky stashable class="shadow-xl bg-zinc-50 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse py-2" wire:navigate>
        <x-app-logo />
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.group :heading="__('Pages')" class="grid">
            <flux:navlist.item icon="squares-2x2" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                wire:navigate>{{ __('Dashboard') }}
            </flux:navlist.item>
            <flux:navlist.item icon="user-group" :href="route('users')" :current="request()->routeIs('users')"
                wire:navigate>{{ __('Users Account') }}
            </flux:navlist.item>

            <flux:navlist.group heading="Client Registration" expandable expanded="false">
                <flux:navlist.item href="#">Individual</flux:navlist.item>
                <flux:navlist.item href="#">Non-Individual</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist.group>
    </flux:navlist>

    <flux:spacer />

    <!-- Desktop User Menu -->
    <flux:dropdown position="bottom" align="start">
        <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
            icon-trailing="chevron-up-down" />
        <flux:menu class="w-[220px]">
            <flux:menu.radio.group>
                <div class="p-0 text-sm font-normal">
                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                            <span
                                class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-slate-50 dark:text-dark">
                                {{ auth()->user()->initials() }}
                            </span>
                        </span>

                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                </div>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <flux:menu.radio.group>
                <flux:menu.item :href="route('profile')" :current="request()->routeIs('profile')" icon="cog"
                    wire:navigate>{{ __('Settings') }}
                </flux:menu.item>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                    class="w-full cursor-pointer">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>

<!-- Mobile User Menu -->
<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
</flux:header>

{{ $slot }}

{{-- <aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-2xl"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 flex flex-col bg-zinc-50 dark:bg-zinc-800">
        <x-app-logo />
        <ul class="space-y-2 flex-1">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-3 py-2 rounded hover:bg-emerald-600 hover:text-white transition"
                    wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>
                    {{ __('Dashboard') }}
                </a>
            </li>
            <li>
                <a href="{{ route('users') }}"
                    class="flex items-center px-3 py-2 rounded hover:bg-emerald-600 hover:text-white transition"
                    wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    {{ __('Users') }}
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full px-3 py-2 rounded hover:bg-emerald-600 hover:text-white transition cursor-pointer"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <span class="flex-1 text-left rtl:text-right whitespace-nowrap">Client Registration</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-10.5 group hover:bg-emerald-600 hover:text-white dark:text-white dark:hover:bg-emerald-700">Products</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-10.5 group hover:bg-emerald-600 hover:text-white dark:text-white dark:hover:bg-emerald-700">Billing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-10.5 group hover:bg-emerald-600 hover:text-white dark:text-white dark:hover:bg-emerald-700">Invoice</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"
                    class="flex items-center px-3 py-2 rounded hover:bg-emerald-600 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    {{ __('Pages') }}
                </a>
            </li>
        </ul>
        <div class="mt-auto">
            <div class="relative" x-data="{ open: false }">
                <button
                    class="flex items-center w-full px-3 py-2 rounded transition hover:bg-emerald-600 hover:text-white focus:outline-none cursor-pointer"
                    id="profileMenuButton" type="button" @click="open = !open" :aria-expanded="open"
                    aria-haspopup="true">
                    <span class="relative flex h-9 w-9 shrink-0 overflow-hidden rounded-lg mr-2">
                        <span
                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-600 dark:text-white">
                            {{ auth()->user()->initials() }}
                        </span>
                    </span>
                    <span class="flex-1 text-left">
                        <span class="block text-sm font-semibold">{{ auth()->user()->name ?? 'User' }}</span>
                        <span class="block text-xs">{{ auth()->user()->email ?? 'test@email.com' }}</span>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" x-transition
                    class="w-full absolute left-0 bottom-15 bg-white dark:bg-neutral-700 shadow-xl rounded-lg z-50"
                    style="display: none;">
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-4 py-3 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-500 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name ?? 'User' }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email ?? 'test@email.com' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-gray-200 dark:border-slate-700 my-1"></div>
                    <div>
                        <a href="{{ route('settings.profile') }}"
                            class="flex items-center px-4 py-3 text-sm hover:bg-emerald-600 dark:hover:bg-emerald-600 hover:text-white hover:rounded-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                            </svg>
                            {{ __('Settings') }}
                        </a>
                    </div>
                    <div class="border-gray-200 dark:border-slate-700 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-4 py-3 text-sm text-left hover:bg-emerald-600 dark:hover:bg-emerald-600 hover:text-white hover:rounded-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</aside> --}}
