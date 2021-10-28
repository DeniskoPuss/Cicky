<x-guest-layout>
    <div class="container mx-auto">
        <a href="{{ route('reviews.create') }}" class="inline-block m-4 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-purple-500 hover:bg-purple-600 hover:shadow-lg">Pridať recenziu</a>
        @foreach($reviews as $review)
            <div class="grid grid-cols-3 text-4xl font-extrabold italic mb-4">
                <div>{{ $review->user->name }}</div>
                <div class="{{ $review->rating > 4 ? 'text-green-600' : ($review->rating > 2 ? 'text-yellow-600' : 'text-red-600') }}">{{ $review->rating }}/5*</div>
                <div>{{ $review->review }}</div>
            </div>
        @endforeach
        {{ $reviews->links() }}
    </div>
</x-guest-layout>
