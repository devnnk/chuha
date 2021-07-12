<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BOT order') }}
        </h2>
    </x-slot>

    <livewire:admin-category-store :_id="$id ?? ''"/>
</x-app-layout>
