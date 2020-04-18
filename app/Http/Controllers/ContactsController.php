<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function show(Contact $contact)
    {
        return $contact;
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->all());
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        $contact->update($request->all());
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
