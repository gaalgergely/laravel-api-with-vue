<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\Contact as ContactResource;
use Symfony\Component\HttpFoundation\Response;

class ContactsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Contact::class);
        return ContactResource::collection(request()->user()->contacts);
    }

    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        return new ContactResource($contact);
    }

    public function store(ContactRequest $request)
    {
        $this->authorize('create', Contact::class);
        $contact = request()->user()->contacts()->create($request->except('api_token'));
        return (new ContactResource($contact))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        $this->authorize('update', $contact);
        $contact->update($request->except('api_token'));
        return (new ContactResource($contact))->response()->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $contact->delete();
        return response([], Response::HTTP_NO_CONTENT);
    }
}
