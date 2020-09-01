@extends('base')
@section('main')

    <style>
        .w-70 {
            width: 20rem;
        }
    </style>

    <section class="blog text-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Soliloquy</h1>
                <a class="block py-2 px-4 rounded text-indigo-600 bg-teal-200 hover:bg-white hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out mb-3" href="/messages/create">Create</a>

                <p class="lg:w-1/2 w-full leading-relaxed text-base">
                    <b>soliloquy</b>
                    /səˈlɪləkwi/<br>
                    noun<br>
                    an act of speaking one's thoughts aloud when by oneself or regardless of any hearers, especially by a character in a play.<br>
                    "Edmund ends the scene as he had begun it, with a soliloquy" </p>
            </div>
            <div class="">
                <div class="min-w-screen flex items-center justify-center px-5 py-5">
                    <div class="bg-teal-600 text-white rounded shadow-xl py-5 px-5 w-full lg:w-10/12 xl:w-3/4" x-data="{welcomeMessageShow:true}" x-show="welcomeMessageShow" x-transition:enter="transition-all ease duration-500 transform" x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease duration-500 transform" x-transition:leave-end="opacity-0 scale-90">
                        <div class="flex flex-wrap -mx-3 items-center">
                            <div class="w-1/4 px-3 text-center hidden md:block">
                                <div class="">
                                    <img src="https://picsum.photos/200/300?nocache=<?php echo rand(0,1000); ?>" alt="">
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-2/4 px-3 text-left">
                                <div class="p-5 xl:px-8 md:py-5">
                                    <h3 class="text-2xl">{{$message->subject}}</h3>
                                    <h5 class="text-xl mb-3">{{$message->sent}}</h5>
                                    <p class="text-sm text-indigo-200">{{$message->body}}</p>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 md:w-1/4 px-3 text-center">
                                <div class="p-5 xl:px-8 md:py-5">
                                    <a class="block w-full py-2 px-4 rounded text-indigo-600 bg-gray-200 hover:bg-white hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out mb-3" href="/archive/{{$message->id}}">Archive</a>
                                    <a class="block w-full py-2 px-4 rounded text-indigo-600 bg-teal-200 hover:bg-white hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out mb-3" href="/messages">Go Back</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection







