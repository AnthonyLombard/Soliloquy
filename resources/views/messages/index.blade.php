@extends('base')
@section('main')

            <style>
                .w-70 {
                    width: 20rem;
                }
            </style>

            <section class="blog text-gray-700 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Soliloquy</h1>
                        <a class="block py-2 px-4 rounded text-indigo-600 bg-teal-200 hover:bg-white hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out mb-3" href="/messages/create">Create</a>
                        <p class="lg:w-1/2 w-full leading-relaxed text-base">
                            <b>soliloquy</b>
                            /səˈlɪləkwi/<br>
                            noun<br>
                            an act of speaking one's thoughts aloud when by oneself or regardless of any hearers, especially by a character in a play.<br>
                            "Edmund ends the scene as he had begun it, with a soliloquy" </p>
                    </div>
                    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                    @foreach($messages as $message)
                        <div class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
                            <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center" style="background-image: url(https://picsum.photos/200/300?nocache=<?php echo rand(0,1000); ?>"></div>
                            <a href="/view/{{$message->id}}">
                            <div class=" w-70 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden p-5">

                                <div class="header-content inline-flex ">
                                    <div class="category-badge flex-1  h-4 w-4 m rounded-full m-1 bg-purple-100">
                                        <div class="h-2 w-2 rounded-full m-1 bg-purple-500 " ></div>
                                    </div>
                                    <div class="category-title flex-1 text-sm"> {{$message->state}}</div>
                                </div>
                                <div class="title-post font-medium">{{$message->subject}}</div>

                                <div class="summary-post text-base text-justify">{{$message->preview}}
                                    <button class="bg-blue-100 text-blue-500 mt-4 block rounded p-2 text-sm "><span class="">Sent: {{$message->sent}}</span></button>
                                </div>

                            </div>
                            </a>
                        </div>


                    @endforeach
                    </div>
                </div>
            </section>
@endsection
