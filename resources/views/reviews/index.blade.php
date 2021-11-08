<x-guest-layout>
    <div class="justify-items-start place-content-center font-serif">
        <p class="font-mono text-justify">
        <a href="{{ route('reviews.create') }}" class="inline-block mt-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg">Pridať recenziu</a>
        </p>
        @foreach($reviews as $review)
            <div class="grid grid-cols-4 text-4xl font-thin'] italic mb-4 text-left tracking-tighter antialiased">
                <div>{{ $review->user->name }}</div>
                <div class="{{ $review->rating > 4 ? 'text-green-600' : ($review->rating > 2 ? 'text-yellow-600' : 'text-red-600') }}">{{ $review->rating }}/5*</div>
                <div>{{ $review->review }}</div>
                <div>
                    @if(Auth::id() === $review->user_id)
                        <div>{{ $review->since }}</div>

                        <div>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <p class="font-mono">
                                <button type="submit" class="inline-block mt-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg">
                                    Delete
                                </button>

                                </p>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        <button>
            <a href="{{ url()->previous() }}" class="inline-block mt-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-yellow-500 hover:bg-yellow-600 hover:shadow-lg font-serif">Back</a>
        </button>
        {{ $reviews->links() }}
    </div>
</x-guest-layout>
