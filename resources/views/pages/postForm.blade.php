<form action="{{route('postForm')}}" method="post">
    @csrf
    <input type="text" name="Ten"/>
    <input type="text" name="sdt" value=""/>
    <button type="submit">Submit</button>
</form>