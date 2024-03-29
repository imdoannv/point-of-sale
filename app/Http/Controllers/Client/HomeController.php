<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $floors = Floor::query()
            ->withCount('tables')
            ->orderBy('name', 'asc')
            ->get();
        $floor = Floor::find(1);

        if (!$floor) {
            $floor = Floor::first();
        }

        $tables = $floor->tables;

        return view('client.places.table-detail',compact('floors','tables'));
    }

    public function getFools(){
        $floors = Floor::query() ->withCount('tables')->orderBy('name', 'asc')->get();
        return view ('client.places.get-floor',compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $floors = Floor::query()
            ->withCount('tables')
            ->orderBy('name', 'asc')
            ->get();

        $floor_id= Floor::find($id);
        $tables = $floor_id->tables;

        return view('client.places.table-detail',compact('floors','tables'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
