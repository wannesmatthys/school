@extends("master")

@section("main")
    <h2>List of reviews</h2>

    <ul>
        @isset($reviews)
            @foreach ($reviews as $review)
                <li><a href="{{ route('show-review', ['id' => $review->id]) }}">{{ $review->product }}</a></li>
            @endforeach
        @endisset
    </ul>

    <a href="{{ route('create-review') }}">Add a review</a>
@endsection