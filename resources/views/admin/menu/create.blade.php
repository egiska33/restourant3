<form action="{{route('menu.store')}}" method="post">
    {{ csrf_field() }}
    <input type="text" name="title" placeholder="Menu">
    <input type="submit">
</form>