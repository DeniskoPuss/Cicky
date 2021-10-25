@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="{{route('reservations.store', $table->id)}}" method="post">
    @csrf
    <input name="table_id" value="{{$table->id}}" type="hidden">
    <select name="number_of_people" id="">
        @for($i=1;$i<=$table->people;$i++)
            <option value="{{$i}}">
                {{$i}}
            </option>
        @endfor
    </select>
    <input name="date" type="datetime-local">
    <input name="submit" type="submit">
</form>
