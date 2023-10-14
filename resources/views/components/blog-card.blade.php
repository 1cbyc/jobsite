@props(['Blog'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                {{ $Blog->title }}
            </h3>
            <div class="text-xl font-bold mb-4">{{ $Blog->content }}</div>
        </div>
    </div>
</div>
