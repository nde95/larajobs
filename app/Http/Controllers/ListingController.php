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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
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
            'description' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('logo')) {
            $formData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formData['user_id'] = auth()->id();

        Listing::create($formData);

        return redirect('/')->with('message', 'Your listing has been added!');
    }

    // show edit form for existing Listing
    public function edit(Listing $listing)
    {
        // edit a listing
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        // validate user updating the post
        if(auth()->id() !== $listing->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // update existing listing data
        $formData = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('logo')) {
            $formData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formData);

        return back()->with('message', 'Your listing has been edited successfully!');
    }

    public function destroy(Listing $listing)
    {
        // validate user deleting the post
        if(auth()->id() !== $listing->user_id) {
            abort(403, 'Unauthorized action.');
        }
        // delete a listing
        $listing->delete();

        return redirect('/')->with('message', 'Your listing has been deleted!');
    }

    public function manage()
    {
        // manage user listings
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get()
        ]);
    }
}
