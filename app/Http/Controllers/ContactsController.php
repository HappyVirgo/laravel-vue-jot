<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Response;

class ContactsController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Contact::class);

        return ContactResource::collection(request()->user()->contacts);
    }
    //
    public function store()
    {
        $this->authorize('create', Contact::class);
        
        $contact = request()->user()->contacts()->create($this->validateData());

        return (new ContactResource($contact))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);

        return new ContactResource($contact);
    }

    public function update(Contact $contact)
    {
        $this->authorize('update', $contact);

        $contact->update($this->validateData());

        return (new ContactResource($contact))->response()->setStatusCode(Response::HTTP_OK);
    }

    public function delete(Contact $contact)
    {
        $this->authorize('delete', $contact);

        $contact->delete();

        return response([], Response::HTTP_NO_CONTENT);
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'company' => 'required',
        ]);
    }
}
