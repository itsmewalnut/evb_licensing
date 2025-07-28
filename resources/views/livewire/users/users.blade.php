    <div class="h-full w-full">
        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2 gap-2 px-2 sm:px-0">
            <div class="flex-1 min-w-0">
                <flux:heading size="xl" level="1">{{ __('Users Account') }}</flux:heading>
                <flux:subheading size="lg" class="mb-4 sm:mb-6">
                    <flux:breadcrumbs class="mt-2">
                        <flux:breadcrumbs.item href="/">{{ __('Home') }}</flux:breadcrumbs.item>
                        <flux:breadcrumbs.item>{{ __('Users Account') }}</flux:breadcrumbs.item>
                    </flux:breadcrumbs>
                </flux:subheading>
            </div>
            <div class="absolute right-2 top-2 sm:static sm:right-auto sm:top-auto flex-shrink-0 z-10">
                <x-theme />
            </div>
        </div>
        <div class="p-4 shadow-lg rounded-lg dark:bg-zinc-900">
            <div class="pb-3">
                <flux:modal.trigger name="create-user">
                    <flux:button variant="primary" color="green" icon="user-plus">Add new user</flux:button>
                </flux:modal.trigger>
            </div>

            {{-- user modals --}}
            <livewire:users.create-user />
            <livewire:users.edit-user />

            {{-- delete user modal --}}
            <flux:modal name="delete-user" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg" wire:model="user_name">Delete {{ $user_name }}?</flux:heading>
                        <flux:text class="mt-2">
                            <p>You're about to delete this user.</p>
                            <p>This action cannot be reversed.</p>
                        </flux:text>
                    </div>
                    <div class="flex gap-2">
                        <flux:spacer />
                        <flux:modal.close>
                            <flux:button variant="ghost">Cancel</flux:button>
                        </flux:modal.close>
                        <flux:button type="submit" variant="danger" wire:click="deleteUser()">Delete User
                        </flux:button>
                    </div>
                </div>
            </flux:modal>

            {{-- reset password modal --}}
            <flux:modal name="reset-password" class="min-w-[22rem]">
                <div class="space-y-6">
                    <div>
                        <flux:heading size="lg">Reset Password
                        </flux:heading>
                        <flux:text class="mt-2">
                            <p wire:model="user_name">You're about to reset the password of {{ $user_name }}.</p>
                            <p>This action cannot be reversed.</p>
                        </flux:text>
                    </div>
                    <div class="flex gap-2">
                        <flux:spacer />
                        <flux:modal.close>
                            <flux:button variant="ghost">Cancel</flux:button>
                        </flux:modal.close>
                        <flux:button type="submit" variant="danger" wire:click="ResetPass()">Reset
                        </flux:button>
                    </div>
                </div>
            </flux:modal>

            <div wire:ignore>
                <table id="export-table">
                    <thead>
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    ID
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Name
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th data-type="date" data-format="YYYY/DD/MM">
                                <span class="flex items-center">
                                    Branch
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Department
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Email
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Role
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th class="text-center">
                                <span class="flex items-center">
                                    Action
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 whitespace-nowrap cursor-pointer">
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->branch }}</td>
                                <td>{{ $user->department }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-center">
                                    <flux:modal.trigger name="edit-user">
                                        <flux:button variant="primary" color="zinc" icon="pencil-square"
                                            wire:click="editUser({{ $user->id }})">Edit
                                        </flux:button>
                                    </flux:modal.trigger>
                                    <flux:modal.trigger name="delete-user">
                                        <flux:button variant="danger" icon="trash"
                                            wire:click="delete({{ $user->id }})">Delete</flux:button>
                                    </flux:modal.trigger>
                                    <flux:modal.trigger name="reset-password">
                                        <flux:button icon="arrow-path-rounded-square"
                                            wire:click="resetPassword({{ $user->id }})">Reset
                                        </flux:button>
                                    </flux:modal.trigger>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
