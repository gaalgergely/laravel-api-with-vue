<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function index(SearchRequest $request)
    {

        return ContactResource::collection(
            Contact::search($request->get('searchTerm', 'n/a'))
                ->where('user_id', request()->user()->id)
                ->get()
        );
    }
}
