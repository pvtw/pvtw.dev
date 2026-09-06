<x-layouts::app title="Settings" description="Settings page">
    <x-container>
        <x-heading>Settings</x-heading>

        <div class="mt-4">
            @if ( ! $hasPassword)
                <livewire:settings.set-password />
            @else
                <livewire:settings.update-password />
            @endif
        </div>
    </x-container>
</x-layouts::app>