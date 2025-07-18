<div class="flex justify-start sm:justify-end w-full sm:w-auto">
    <flux:dropdown x-data align="end">
        <flux:button variant="subtle" square class="group !w-10 !h-10" aria-label="Preferred color scheme">
            <flux:icon.sun x-show="$flux.appearance === 'light'" variant="mini" class="text-zinc-500 dark:text-white" />
            <flux:icon.moon x-show="$flux.appearance === 'dark'" variant="mini" class="text-zinc-500 dark:text-white" />
            <flux:icon.moon x-show="$flux.appearance === 'system' && $flux.dark" variant="mini" />
            <flux:icon.sun x-show="$flux.appearance === 'system' && ! $flux.dark" variant="mini" />
        </flux:button>

        <flux:menu class="min-w-[140px]">
            <flux:menu.item icon="sun" x-on:click="$flux.appearance = 'light'" class="py-2 px-4">Light
            </flux:menu.item>
            <flux:menu.item icon="moon" x-on:click="$flux.appearance = 'dark'" class="py-2 px-4">Dark
            </flux:menu.item>
            <flux:menu.item icon="computer-desktop" x-on:click="$flux.appearance = 'system'" class="py-2 px-4">System
            </flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</div>
