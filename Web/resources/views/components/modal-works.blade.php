{{-- resources/views/components/modal-works.blade.php --}}
@props(['name', 'title'])

<div x-data="{ show: false, name: '{{ $name }}' }" x-show="show" @open-modal.window="show = ($event.detail.name === name)"
    @close-modal.window="show = false" @keydown.escape.window="show = false" x-cloak style="display: none"
    class="fixed inset-0 z-50 flex items-center justify-center">
    <div x-show="show" x-transition.opacity class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm" @click="show = false">
    </div>

    <div x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        class="relative w-full max-w-2xl mx-4 rounded-2xl shadow-2xl overflow-hidden z-50 bg-white max-h-[90vh] overflow-y-auto s">
        <div class="max-h-[80vh] overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>
