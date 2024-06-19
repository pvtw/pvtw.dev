<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <x-markdown>
        {!! $getState() !!}
    </x-markdown>
</x-dynamic-component>
