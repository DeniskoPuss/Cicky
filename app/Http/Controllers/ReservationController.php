<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reservation\StoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('reservations.index', [
            'tables' => Table::with([
                'reservations' => function ($query) {
                    $query->where('since', '>', Carbon::now()->subHours(2))
                        ->orderBy('since', 'ASC');
            }])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
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
     * @param Table $table
     *
     * @return RedirectResponse
     */

    public function store(StoreRequest $request, Table $table): RedirectResponse
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
     * @param Reservation $reservation
     *
     * @return RedirectResponse
     */
    public function destroy(Reservation $reservation): RedirectResponse
    {
        $reservation->delete();

        return Redirect::route('reservations.index');
    }
}
