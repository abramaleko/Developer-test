@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class=" pb-4">
        <div class="text-lg bg-gray-100 text-gray-800 px-6 py-4">
            {{ $title }}
        </div>

        <div class="mt-4 px-6">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-modal>
