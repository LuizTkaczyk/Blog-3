<x-app-layout>

    <div class="container py-8">

        <div class="grid grid-cols-3 gap-6">

            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif"
                    style="background-image: url({{ url('storage/' . $post->image->url) }} )">

                    <div>
                        @foreach ($post->tags as $tag)
                            <a href="">{{$tag->name}}</a>
                        @endforeach

                        {{$post->tags}}
                    </div>

                    <div class="w-full h-80 flex flex-col justify-center">
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="">
                                {{$post->name}}
                            </a>
                        </h1>


                    </div>



                    {{-- <img src=" {{ Storage::url($post->image->url)  }}" alt=""> --}}
                    {{-- <img src=" {{ url('storage/' . $post->image->url) }}" alt=""> --}}


                </article>
            @endforeach

        </div>

    </div>

</x-app-layout>
