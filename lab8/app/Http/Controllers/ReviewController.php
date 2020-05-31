<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function index() {
        return view('index', ['reviews' => \App\Review::all()]);
    }

    public function create() {
        return view('add-review');
    }

    public function show($id) {
        $review = \App\Review::find($id);
        return view('review', ['review' => $review]);
    }

    public function store(Request $request) {
        $data = $this->validateReview($request);
        $imagePath = $request->file("picture")->store("products");

        Log::info("The file was stored at", $imagePath);
        
        $review = new \App\Review();
        $review->product = $data["product"];
        $review->rating = $data["stars"];
        $review->image = $imagePath;
        $review->review = $data["review"];
        $review->store();

        return view('index', ['reviews' => \App\Review::all()]);
    }

    public function validateReview($request) {
        $rules = [
            "product" => "required",
            "picture" => "required",
            "stars" => "required|integer|min:0|max:5",
            "review" => "required"
        ];

        return $request->validate($rules);
    }
}
