<x-layouts.app :title="__('Settings')">
    <div class="h-full w-full">
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2 gap-2 px-2 sm:px-0">
            <div>
                <flux:heading size="xl" level="1">{{ __('Settings') }}</flux:heading>
                <flux:subheading size="lg" class="mb-6">
                    <flux:breadcrumbs class="mt-2">
                        <flux:breadcrumbs.item href="/">Home</flux:breadcrumbs.item>
                        <flux:breadcrumbs.item>{{ __('Settings') }}</flux:breadcrumbs.item>
                    </flux:breadcrumbs>
                </flux:subheading>
            </div>

            <div class="absolute right-2 top-2 sm:static sm:right-auto sm:top-auto flex-shrink-0 z-10"><x-theme />
            </div>
        </div>
        <div class="p-4 shadow-lg rounded-lg bg-white dark:bg-zinc-900 max-w-full mx-auto">
            <div class="pb-6" wire:ignore>
                <flux:heading size="lg">User profile</flux:heading>
                <flux:text class="mt-2">This information will be displayed publicly.</flux:text>
                <div class="flex flex-col items-center py-6">
                    <img class="mb-3 w-24 h-24 rounded-full shadow-lg"
                        src="https://api.dicebear.com/9.x/adventurer-neutral/svg?seed=Adrian"
                        alt="User profile image" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                        {{ Auth::user()->name ?? 'John Doe' }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->role ?? 'User' }}</span>
                </div>
                <div class="mb-4 dark:border-gray-700">
                    <ul class="flex flex-wrap justify-end -mb-px text-sm font-medium text-center"
                        id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                        data-tabs-active-classes="text-white-600 hover:text-white-600 dark:text-white-500 dark:hover:text-white-500 border-white-600 dark:border-white-500"
                        data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                        role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg"
                                id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab"
                                aria-controls="profile" aria-selected="false"><svg
                                    class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>Profile</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="settings-styled-tab" data-tabs-target="#styled-settings" type="button"
                                role="tab" aria-controls="settings" aria-selected="false"><svg
                                    class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                                </svg>Settings</button>
                        </li>
                    </ul>
                </div>
                <div id="default-styled-tab-content">
                    <div class="hidden p-4 rounded-lg" id="styled-profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the
                            <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for
                            the next. The tab JavaScript swaps classes to control the content visibility and
                            styling.
                        </p>
                    </div>
                    <div class="hidden p-4" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                        <form class="w-full" method="POST" action="#">
                            @csrf
                            <div class="mb-4">
                                <flux:input wire:model="password" :label="__('Current Password')" type="password"
                                    required autocomplete="new-password" viewable />
                            </div>
                            <div class="mb-4">
                                <flux:input wire:model="password" :label="__('New Password')" type="password" required
                                    autocomplete="new-password" viewable />
                            </div>
                            <div class="mb-6">
                                <flux:input wire:model="password" :label="__('Confirm New Password')" type="password"
                                    required autocomplete="new-password" viewable />
                            </div>
                            <flux:button type="submit" class="w-full" variant="primary" color="zinc">
                                {{ __('Change Password') }}
                            </flux:button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layouts.app>
