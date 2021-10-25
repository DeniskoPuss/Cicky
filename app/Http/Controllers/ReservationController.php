<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reservation\StoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservations.index', ['tables' => Table::with(['reservations' => fn($q) => $q->whereDay('since', '>', Carbon::now()->subDay())->orderBy('since', 'ASC')])->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Table $table)
    {

        return view('reservations.create', [
            'table' => Table::where('id', $table->id)->first(),

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreRequest $request, Table $table)
    {

        Reservation::create([
            'user_id' => Auth::user()->id,
            'table_id' => $table->id,
            'people' => $request->number_of_people,
            'since' => $request->date
        ]);

        return Redirect::route('reservations.index');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
