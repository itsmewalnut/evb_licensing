<x-layouts.app :title="__('Settings')">
    <flux:main class="sm:p-4 flex justify-center items-center flex-1">
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
                <div class="pb-6">
                    <flux:heading size="lg">User profile</flux:heading>
                    <flux:text class="mt-2">This information will be displayed publicly.</flux:text>
                    <div class="flex flex-col items-center pb-6">
                        <img class="mb-3 w-24 h-24 rounded-full shadow-lg"
                            src="https://api.dicebear.com/9.x/adventurer-neutral/svg?seed=Adrian"
                            alt="User profile image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                            {{ Auth::user()->name ?? 'John Doe' }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->role ?? 'User' }}</span>
                    </div>
                    <form class="mt-6 w-full" method="POST" action="#">
                        @csrf
                        <div class="mb-4">
                            <label for="current_password"
                                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Current
                                Password</label>
                            <input type="password" id="current_password" name="current_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="new_password"
                                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">New
                                Password</label>
                            <input type="password" id="new_password" name="new_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div class="mb-6">
                            <label for="new_password_confirmation"
                                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Confirm New
                                Password</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <button type="submit"
                            class="w-full inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                            Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </flux:main>
</x-layouts.app>
