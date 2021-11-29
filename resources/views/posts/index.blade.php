<x-app-layout>

    <div class="container bg-green-500">

        <div class="grid grid-cols-3 gap-6">

            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center" style="background-image: url({{ url('storage/' . $post->image->url) }} )">

                    {{-- <img src=" {{ Storage::url($post->image->url)  }}" alt=""> --}}
                    {{-- <img src=" {{ url('storage/' . $post->image->url) }}" alt=""> --}}


                </article>
            @endforeach

        </div>

    </div>

</x-app-layout>
