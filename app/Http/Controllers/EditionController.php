<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\EditionServiceInterface;
use Illuminate\Support\Facades\Log;

class EditionController extends Controller
{
    public function __construct(
        private EditionServiceInterface $service
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->service->getList();
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return $this->model->create($request->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info("Create Request >> " . print_r($request->all(), true));
        $this->service->createEdition($request->toArray());

        return view('home')->with('success', 'successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->getEditionById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info("request data >> " . print_r($request->toArray(), true));
        $this->service->updateEditionById($id, $request->toArray());

        return view('home')->with('success', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info("Book id to delete >> " . $id);
        $this->service->destroyEditionById($id);
        return view('home')->with('success', 'successfully deleted');
    }
}
