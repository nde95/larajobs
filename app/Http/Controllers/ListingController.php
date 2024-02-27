<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        // get and show all listings
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    public function show(Listing $listing)
    {
        // show a single listing
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create()
    {
        // create a new listing
        return view('listings.create');
    }

    public function store(Request $request)
    {
        // store new listing data
        $formData = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formData);

        return redirect('/')->with('message', 'Your listing has been added!');
    }
}
