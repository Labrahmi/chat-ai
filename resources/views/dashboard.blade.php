<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Styles -->
    @vite('resources/css/app.css')
    <!-- Styles -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/themes/prism.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.20.0/prism.min.js"></script>
    @php
        $dark_emoji = "moon";
    @endphp
    @if ($dark_status == 'dark')
        <style>
            *{
                color: whitesmoke!important;
                background-color: rgb(11, 8, 27)!important;
            }
        </style>
        @php
            $dark_emoji = "sun";
        @endphp
    @endif
</head>

<body class="tablet:bg-gradient-to-r tablet:from-emerald-50 tablet:to-gray-50">
    <nav class="p-4 px-8 bg-white shadow flex items-center justify-between">
        <a href="{{ route('root') }}" class="font-bold">ChatAi<span class="font-normal">.ma</span></a>
        <a class="flex" href="{{ route('dark_mode') }}"><box-icon class=" @if ($dark_status == 'dark') fill-white @endif " type='solid' name='{{ $dark_emoji }}'></box-icon></a>
    </nav>
    <!-- <pre><code class="language-javascript">const message = "Hello, World!"; console.log(message);</code></pre> -->
    {{--
    <main class="p-8 flex flex-col tablet:flex-row">
        <div class="tablet:w-1/3 p-4">
            <div class="text-2xl">Welcome Back, <span class="font-medium">Youssef</span></div>
            <div class="p-2 font-light">
            </div>
        </div>
        <div class="flex px-2"></div>
        <div class="tablet:w-2/3 p-4">
            <div class="font-bold text-2xl text-emerald-700">
                This Week's events
            </div>
            <div class="flex py-2"></div>

            <a href="./booking/10001"
                class="hover:shadow-lg hover:scale-[1.0075] transition-all tablet:w-3/4 text-white bg-emerald-600 p-4 rounded flex flex-col tablet:flex-row justify-between select-none">
                <div class="flex">
                    <box-icon class="fill-white" name='football'></box-icon>
                    <div class="flex px-1"></div>
                    <div class="font-bold">Football match</div>
                    <div>
                        , <span class="">[ 0/12 ]</span>
                    </div>
                </div>
                <div class="flex justify-center">bg='football'></box-icon>
                    <div class="flex px-1"></div>
                    <div class="font-bold">Football match</div>
                    <div>
                        , <span class="">[ 0/12 ]</span>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div><span class="font-semibold">19:00H</span> | Mond, 13 Jully</div>
                    <div class="flex px-1"></div>
                    <box-icon class="fill-white w-0 tablet:w-auto" type='solid' name='chevron-down'></box-icon>
                </div>
            </a>
            <div class="flex py-2"></div>

            <a href="./booking/10003"
                class="hover:shadow-lg hover:scale-[1.0075] transition-all tablet:w-3/4 text-white bg-emerald-600 p-4 rounded flex flex-col tablet:flex-row justify-between select-none">
                <div class="flex">
                    <box-icon class="fill-white" name='football'></box-icon>
                    <div class="flex px-1"></div>
                    <div class="font-bold">Football match</div>
                    <div>
                        , <span class="">[ 0/12 ]</span>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div><span class="font-semibold">20:00H</span> | Mond, 13 Jully</div>
                    <div class="flex px-1"></div>
                    <box-icon class="fill-white w-0 tablet:w-auto" type='solid' name='chevron-down'></box-icon>
                </div>
            </a>
            <div class="flex py-2"></div>

            <a href="./booking/10004"
                class="hover:shadow-lg hover:scale-[1.0075] transition-all tablet:w-3/4 text-white bg-amber-600 p-4 rounded flex flex-col tablet:flex-row justify-between select-none">
                <div class="flex">
                    <box-icon class="fill-white" name='basketball'></box-icon>
                    <div class="flex px-1"></div>
                    <div class="font-bold">Basketball match</div>
                    <div>
                        , <span class="">[ 0/10 ]</span>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div><span class="font-semibold">18:00H</span> | Mond, 13 Jully</div>
                    <div class="flex px-1"></div>
                    <box-icon class="fill-white w-0 tablet:w-auto" type='solid' name='chevron-down'></box-icon>
                </div>
            </a>
            <div class="flex py-2"></div>

        </div>
    </main>
    --}}
    <div class="tablet:p-16 tablet:px-32">
        <div class="tablet:p-8 p-4 rounded tablet:shadow bg-white">
            <div class="text-1xl font-normal">
                Write your request
            </div>
            <div class="flex py-2"></div>
            <form class="flex flex-col h-16 items-center delay-200" action="{{ route('askapi') }}" method="POST" class="transition-all">
                @csrf
                <input @isset($_GET['promot']) value="{{ $_GET['promot'] }}" @endisset autocomplete="off" name="promot"
                    class="w-full pr-20 focus-visible:outline-none focus:border-emerald-700 shadow border-2 border-gray-400 p-4 rounded"
                    type="text">
                <button class="text-sm p-2 rounded text-gray-600 hover:text-emerald-600 font-bold relative -top-12 self-end mr-2"
                    type="submit">Submit</button>
            </form>
            <div class="flex py-2"></div>
            <div class="tablet:p-4">
                @isset($_GET['ai_text'])
                    <pre class="rounded shadow border-slate-400 border"><code style="white-space: pre-wrap;" class="language-javascript">{{ $_GET['ai_text'] }}</code></pre>
                @endisset
            </div>
        </div>
    </div>
</body>

</html>