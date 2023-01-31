<?php

namespace App\Http\Controllers;

use App\Models\HelpTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HelpTicketController extends Controller
{
    public function index()
    {
        $tickets = HelpTicket::all();

        return view('feedback.index')->with('tickets', $tickets);
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'email' => ['required', 'email:rfc, dns'],
            'message' => ['required'],
        ], [
            'required' => 'Поле :attribute обязятельно для заполнения',
            'email.email' => 'Поле :attribute содержит невалидный email',
        ])->validate();



        HelpTicket::create($request->all());

        return redirect('/');
    }
}
