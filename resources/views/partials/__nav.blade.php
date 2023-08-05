<nav class="w-full flex justify-between items-center p-3 bg-indigo-500">
    <a href="/login" class="text-white font-bold text-lg">Student System</a>

    <div class="md:hidden block">
        <label class="btn btn-circle swap swap-rotate">
        <!-- this hidden checkbox controls the state -->
        <input type="checkbox" id="menu"/>
        <!-- hamburger icon -->
        <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z"/></svg>
        <!-- close icon -->
        <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><polygon points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49"/></svg>
        </label>
    </div>

    <div class="md:flex md:flex-row flex-col hidden md:relative fixed md:min-h-fit min-h-screen md:p-0 p-5 md:bg-indigo-500 bg-white md:w-fit w-[200px] md:left-0 left-[-200px] gap-2 md:shadow-none shadow-lg" id="menuTab">
        <a href="/add" class="btn text-white bg-none hover:bg-indigo-400 bg-indigo-500 border-none" id="addnew">Add new</a>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn text-white rounded-lg hover:bg-indigo-600 bg-indigo-900 border-none w-full">Log out</button>
        </form>        
    </div>
</nav>