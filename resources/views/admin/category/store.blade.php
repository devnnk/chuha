<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(isset($id) ? 'Update category' : 'Create category ') }}
        </h2>
    </x-slot>

    <livewire:admin-category-store :_id="$id ?? ''"/>
</x-app-layout>
