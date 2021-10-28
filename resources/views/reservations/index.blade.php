<x-guest-layout>
    <div class="grid grid-cols-10 dark:bg-gray-400 h-screen">
        @foreach($tables as $table)
            <div class="grid-cols-1 text-center items-center">
                <div>
                    <span class="text-2xl">{{ $table->name }}</span>
                    @if ($table->reservations->isEmpty())
                        <img src="{{ asset('images/StolVolny.png') }}" class="block w-14 mx-auto">
                    @else
                        <img src="{{ asset('images/StolZabrany.png') }}" class="block w-14 mx-auto">
                    @endif
                    @if(Auth::user())
                        <a href="{{ route('reservations.create', $table->id) }}" class="inline-block mt-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg">Reserve</a>
                    @endif
                </div>
                @foreach($table->reservations as $reservation)
                    <div class="grid grid-cols-2 mt-4">
                        @if(Auth::id() === $reservation->user_id)
                            <div>{{ $reservation->since }}</div>
                            <div>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="col-span-2">{{ $reservation->since }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-guest-layout>
