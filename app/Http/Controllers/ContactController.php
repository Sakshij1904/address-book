<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
{
    $groups = Group::all();

    $query = Contact::with('groups');

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('phone', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

    if ($request->filled('group')) {
        $query->whereHas('groups', function ($q) use ($request) {
            $q->where('groups.id', $request->group);
        });
    }

    $contacts = $query->get();

    return view('contacts.index', compact('contacts', 'groups'));
}

    public function create()
    {
        $groups = Group::all();

        return view('contacts.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'nullable',
            'groups' => 'nullable|array'
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        $contact->groups()->sync($request->groups ?? []);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact added successfully!');
    }

    public function edit(Contact $contact)
    {
        $groups = Group::all();

        $contact->load('groups');

        return view('contacts.edit', compact('contact', 'groups'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'address' => 'nullable',
            'groups' => 'nullable|array'
        ]);

        $contact->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        $contact->groups()->sync($request->groups ?? []);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully!');
    }
}