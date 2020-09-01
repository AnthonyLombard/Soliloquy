@extends('base')
@section('main')
    <body class="antialiased text-gray-900 bg-teal-600">
    <div class="mx-4 card bg-white max-w-md p-10 md:rounded-lg my-8 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form method="post" action="{{ route('messages.store') }}">
            @csrf
            <div class="title">
                <h1 class="font-bold text-center">Create a message</h1>
            </div>

            <div class="form mt-4">
                <div class="flex flex-col text-sm">
                    <label for="subject" class="font-bold mb-2">Subject</label>
                    <input name="subject" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text" placeholder="Enter a subject">
                </div>

                <div class="text-sm flex flex-col">
                    <label for="body" class="font-bold mt-4 mb-2">Message body</label>
                    <textarea name="body" class=" appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"  placeholder="Enter your message here"></textarea>
                </div>
            </div>

            <div class="submit">
                <button type="submit" class=" w-full bg-teal-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Send</button>
            </div>
        </form>
    </div>
    </body>
@endsection
