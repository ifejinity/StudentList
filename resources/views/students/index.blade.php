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
        <a href="#">Students List</a>
    </header>

    <div class="mt-3 w-full md:px-[10%] px-[5%]">
      <form action="/search" method="post" class="form-control">
        @csrf
        <div class="input-group">
          <input type="text" name="searchItem" placeholder="Search name…" class="input input-bordered w-full"/>
          <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-400 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
          </button>
        </div>
      </form>
      <a href="/" class="btn btn-xs mt-2 bg-red-400 hover:bg-red-500">Reset filter</a>
    </div>

    <section class="mt-5 w-full md:px-[10%] px-[5%]">
        <div class="overflow-x-auto w-full">
            <table class="table bg-white">
              <!-- head -->
              <thead class="bg-indigo-500">
                <tr class="text-white">
                  <th>Id</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Age</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($StudentsData as $student)
                    <tr class="hover:bg-indigo-200">
                        <th>{{$student->id}}</th>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->age}}</td>
                        <td class="flex gap-1">
                          <a href="" class="btn btn-xs bg-green-400 hover:bg-green-500 border-none">edit</a>
                          <form action="/delete/{{$student->id}}" method="POST">
                            @csrf
                            @method('delete')
                              <button type="submit" class="btn btn-xs bg-red-400 hover:bg-red-500 border-none">delete</button>
                          </form>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="my-5 flex gap-2">
            {{ $StudentsData->links() }}
          </div>
    </section>

    <script>
      const navBtn = document.querySelector('#menu');
      const navTab = document.querySelector('#menuTab');
      navBtn.addEventListener('click', function () { 
        if(this.checked){
          navTab.classList.replace('hidden', 'flex');
          navTab.classList.replace('left-[-200px]', 'left-0');
          navTab.classList.add('top-0', 'z-[3]');
        } else {
          navTab.classList.replace('flex', 'hidden');
        }
      });
    </script>
</body>
</html>