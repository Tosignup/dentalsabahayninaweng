<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | Register </title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <section class="h-screen bg-slate-100 flex justify-center items-center ">
        <div class="bg-white rounded-lg shadow-lg flex max-w-5xl">
            <div class="bg-green-600 rounded-lg text-white p-8 flex flex-col">
                <h1 class="font-bold text-4xl text-white max-w-sm mb-6">Register account</h1>
                <form method="POST" action="{{ route('register') }}" class="flex flex-col justify-start gap-4 mb-8">
                    @csrf
                    {{-- <label for="role">
                        <h1 class="font-semibold">Select Role</h1>
                        <select name="role" class="w-full border text-black border-gray-400 py-2 px-4 rounded-md">
                            <option value="client">Customer</option>
                            <option value="receptionist">Receptionist</option>
                        </select>
                    </label> --}}

                    <label for="name">
                        <h1 class="font-semibold">Username</h1>
                        <input class="w-full border text-black border-gray-400 py-2 px-4 rounded-md" type="text"
                            name="name" id="name" placeholder="Juan">
                    </label>
                    <label for="email">
                        <h1 class="font-semibold">E-mail</h1>
                        <input class="w-full border text-black border-gray-400 py-2 px-4 rounded-md" type="email"
                            name="email" id="email" placeholder="juan@gmail.com">
                    </label>
                    <label for="password">
                        <h1 class="font-semibold">Password</h1>
                        <input class="w-full border text-black border-gray-400 py-2 px-4 rounded-md" type="password"
                            name="password" id="password">
                    </label>
                    </label>
                    <label for="password_confirmation">
                        <h1 class="font-semibold">Confirm Password</h1>
                        <input class="w-full border text-black border-gray-400 py-2 px-4 rounded-md" type="password"
                            name="password_confirmation" id="password_confirmation">
                    </label>
                    <button
                        class="bg-slate-200 my-4 self-start text-slate-900 font-bold py-2 px-8 rounded-md hover:bg-slate-900 hover:text-slate-100 transition-all">Register</button>
                </form>
                <div class="flex gap-2 flex-col text-sm  max-w-52">
                    <a class="hover:font-semibold transition-all" href="{{ route('login') }}">Already have an
                        account?</a>
                    <a class="hover:font-semibold transition-all" href="{{ route('welcome') }}">Go back to homepage</a>
                </div>
            </div>
            <div class="p-8 flex flex-col items-center">
                <img class="mx-8" src="{{ asset('assets/images/logo.png') }}" alt="">
                <div class="flex flex-col justify-center text-center mt-6">
                    <h1 class="font-bold text-xl">Tooth Impressions Dental Clinic</h1>
                    <h1 class="text-sm">Your Smile, Our Passion: Quality Dental Care You Can Trust.</h1>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
