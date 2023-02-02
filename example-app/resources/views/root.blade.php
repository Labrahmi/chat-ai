<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <!-- Styles -->
    @vite('resources/css/app.css')
    <!-- Styles -->
</head>

<body class="bg-gradient-to-r from-emerald-50 to-gray-50">
    <div>
        <h1 class="font-black h-screen flex justify-center items-center">
            <form type="GET" action="{{ route('login') }}" class="text-slate-900 text-2xl p-16 select-none">
                <div class="text-emerald-600">Hello There.</div>
                <div class="flex py-1"></div>
                <div class="text-base">
                    <button type="submit" class="p-2 w-full bg-emerald-600 border border-emerald-700 border-opacity-30 hover:brightness-105 transition-all text-white rounded shadow">
                        Login
                    </button>
                </div>
            </form>
        </h1>
    </div>
</body>
</html>