<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Sign up</title>
    @include('partials.__cdn')
</head>
<body class="md:px-[10%] px-[5%] min-h-screen bg-indigo-50 flex flex-col items-center justify-center">
    <header class="w-full text-indigo-500 font-bold text-3xl mt-5 text-center">
        <a href="#">Student Register</a>
    </header>
    <main class="w-full max-w-lg flex flex-col p-5 bg-white rounded-lg shadow-md mt-5">
        <section class="">
            <h1 class="text-xl font-bold">Welcome to Student System</h1>
            <a href="/login" class="text-indigo-500">Sign in an account</a>
        </section>
        <section class="flex flex-col mt-5">
            <form action="/store" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-3">
                    <input type="text" placeholder="Name" name="name" class="input input-bordered w-full" value="{{old('name')}}"/>
                    @error('name')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    <input type="text" placeholder="Email" name="email" class="input input-bordered w-full" value="{{old('email')}}"/>
                    @error('email')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    <input type="password" placeholder="Password" name="password" class="input input-bordered w-full"/>
                    @error('password')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" class="input input-bordered w-full" />
                    <button type="submit" class="btn bg-indigo-600 hover:bg-indigo-500 text-white">Sign up</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>