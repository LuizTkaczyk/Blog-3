<x-app-layout>

    <div class="container bg-green-500">

        @foreach ($posts as $post)
            <article>
                {{ Storage::url($post->image->url) }}
            </article>
        @endforeach


    </div>

</x-app-layout>
