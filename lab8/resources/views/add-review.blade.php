@extends("master")

@section("main")
    <h2>Add a review</h2>
    
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="post" action="{{ route('store-review') }}" enctype="multipart/form-data">
        @csrf

        <label for="product">Product:</label>
        <input type="text" id="product" name="product">

        <label for="picture">Picture:</label>
        <input type="file" name="picture" id="picture" accept="image/png, image/jpeg">

        <label for="stars">Stars:</label>
        <input type="number" id="stars" name="stars">

        <label for="review">Your review:</label>
        <textarea name="review" id="review"></textarea>

        <input type="submit" value="Add review">
    </form>
@endsection