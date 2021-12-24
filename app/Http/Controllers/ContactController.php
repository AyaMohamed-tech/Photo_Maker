<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::get();
        return view('client.contact',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function syncServices(...$services)
    {
        $this->services()->detach();
        return $this->giveServiceTo($services);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'activity_type' => 'required',
            'contact_number' => 'required',
            'email' => 'required|unique:contacts,email',
            // 'service' => 'required',
        ]);
    
        $contact = Contact::create([
            'company_name' => $request->input('company_name'),
            'activity_type' => $request->input('activity_type'),
            'contact_number' => $request->input('contact_number'),
            'email' => $request->input('email'),
        ]);

        // $contact->syncServices($request->input('service'));

        // $service = new Service();
        // $service->name  = $request->input('service');
        // $service->save();
        return back()->with('status', 'Message sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
