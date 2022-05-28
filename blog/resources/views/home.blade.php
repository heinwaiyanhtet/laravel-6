<h1>Hello I am home</h1>

<form action="{{route('logout')}}" method="post">
    @csrf
    <button>logout</button>
</form>
