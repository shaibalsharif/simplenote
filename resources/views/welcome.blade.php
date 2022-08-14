<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-gray-200 p-4">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-4xl text-center mb-8">TODO LIST</h1>
        <div class="mb-6">

            <form class="flex flex-col space-y-4" method="POST" action="/">
                @csrf
                <input type="text" name="title" placeholder="The todo title..." class="font-bold text-[1.2rem]  py-3 px-4 bg-gray-100 rounded-xl">
                <textarea name="description" placeholder="The todo description..." class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>

                <button class="w-28 py-2 px-8 bg-green-500 text-white rounded-xl">Add</button>
            </form>
            <hr>

            <div class="mt-2">
                @foreach ($todos as $todo)
                <div @class([ "py-4 flex  items-center border-b border-gray-300 px-3" , $todo->isDone?"bg-green-200":"bg-none"
                    ])
                    >
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg font-semibold">{{$todo->title}}</h3>
                        <p class="text-gray-500"> {{$todo->description}}</p>
                    </div>
                    <form method="POST" action="/{{$todo->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="flex space-x-3">
                            <button class="p-2 bg-green-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                    </form>
                    <form method="POST" action="/{{$todo->id}}">
                        @csrf
                        @method('DELETE')
                        <div class="flex space-x-3">
                            <button class="p-2 bg-red-500 text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                    </form>
                </div>
            </div>

        </div>
        @endforeach

    </div>
    </div>
</body>

</html>