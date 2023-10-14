<x-layout>
    @include('partials._hero')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless (count($Blogs) == 0)
            @foreach ($Blogs as $Blog)
                <x-blog-card :Blog="$Blog" />
            @endforeach
        @else
            <p>No Blog available</p>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{ $Blogs->links() }}
    </div>
</x-layout>
