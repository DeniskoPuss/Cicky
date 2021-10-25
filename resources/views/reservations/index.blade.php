<x-guest-layout>

    <div class="grid grid-cols-10 gap-4">
        @foreach($tables as $table)
            <div>
                <a href="{{route('reservations.create', $table->id)}}">

                    {{$table->name}}
                    @if ($table->reservations->isEmpty())
                        <img width="50px" src="{{asset('images/StolVolny.png')}}">
                    @else
                        <img width="50px" src="{{asset('images/StolZabrany.png')}}">
                    @endif
                </a>
                <div class="grid grid-cols-1">
                    @foreach($table->reservations as $reservation)
                        <div>
                            {{$reservation->since}}
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
