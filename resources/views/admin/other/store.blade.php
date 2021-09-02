<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(isset($id) ? 'Update' : 'Create') }}
        </h2>
    </x-slot>

    <livewire:admin-other-store :_id="$id ?? ''"/>
</x-app-layout>
