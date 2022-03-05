<nav class="navbar navbar-light bg-light justify-content-around">
    <a class="navbar-brand" href="{{route('home')}}">Home page</a>
    <form action="{{ route('logout') }}" id="logout" class="d-none" method="POST">
        @csrf
    </form>
    <button form="logout" type="submit" class='text-dark btn btn-outline'>Logout</button>
</nav>
