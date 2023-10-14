<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Post
                </h2>
                <p class="mb-4">Post a nice and engaging content</p>
            </header>

            <form method="POST" action="/blogs">
                @csrf

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        value="{{ old('title') }}" placeholder="Example: Senior Laravel Developer" />

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="content" class="inline-block text-lg mb-2">
                        Post Content
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="content" rows="10"
                        placeholder="Include tasks, requirements, salary, etc">{{ old('content') }}</textarea>

                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Create Post
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
