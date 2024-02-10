<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use AshAllenDesign\ShortURL\Models\ShortURL;
use AshAllenDesign\ShortURL\Facades\ShortURL as ShortUrlBuilder;

class UrlShortnerController extends Controller
{


    public function index()
    {
        $links = ShortURL::where('user_id', auth()->user()->id)->latest()->get();

        return view('dashboard', compact('links'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url',
        ], [
            'link.required' => 'The link field is required.',
            'link.url' => 'The link must be a valid URL.',
        ]);

        // $builder = new \AshAllenDesign\ShortURL\Classes\Builder();

        $shortURL = ShortUrlBuilder::destinationUrl($request->link)
            ->beforeCreate(function (ShortURL $model): void {
                $model->user_id = auth()->user()->id;
            })
            ->make();
        return redirect()->back();
    }

    public function delete($id)
    {
        ShortURL::find($id)->delete();
        return redirect()->back();
    }
}
