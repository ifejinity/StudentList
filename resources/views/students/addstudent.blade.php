<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    @include('partials.__cdn')
</head>
<body class="min-h-screen bg-indigo-50 flex flex-col items-center">
    {{-- nav bar --}}
    <x-messages />
    @include('partials.__nav')

    <header class="w-full text-indigo-500 font-bold text-3xl mt-5 text-center">
        <a href="#">Add Student</a>
    </header>

    <form action="/add/student" method="post" class="modal-box flex flex-col gap-3">
        @csrf
        <h3 class="font-bold text-lg text-indigo-600">Add new Student</h3>
        <input type="text" placeholder="Firstname" name="first_name" class="input input-bordered w-full" value="{{old('first_name')}}"/>
        @error('first_name')
            <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
        <input type="text" placeholder="Lastname" name="last_name" class="input input-bordered w-full" value="{{old('last_name')}}"/>
        @error('last_name')
            <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
        <select class="select select-bordered w-full" name="gender">
            <option disabled selected value="" {{old('gender') == '' ? 'Selected' : ''}}>Gender</option>
            <option value="Male" {{old('gender') == 'Male' ? 'Selected' : ''}}>Male</option>
            <option value="Female" {{old('gender') == 'Female' ? 'Selected' : ''}}>Female</option>
        </select>
        @error('gender')
            <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
        <input type="number" placeholder="Age" name="age" class="input input-bordered w-full" value="{{old('age')}}"/>
        @error('age')
            <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
        <input type="text" placeholder="Email" name="email" class="input input-bordered w-full" value="{{old('email')}}"/>
        @error('email')
            <p class="text-red-500 text-xs">{{$message}}</p>
        @enderror
        <button type="submit" class="btn bg-indigo-600 hover:bg-indigo-500 text-white">Save</button>
    </form>
</body>
</html>