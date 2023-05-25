<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Contracts\Services\PublisherServiceInterface;

class PublisherController extends Controller
{
    public function __construct(
        private PublisherServiceInterface $service
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
        // return $this->service->create($request->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->service->createPublisher($request->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->getPublisherById($id);
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
        return $this->service->updatePublisherById($id, $request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info("Publisher id to delete >> " . $id);
        return $this->service->destroyPublisherById($id);
    }

    // public function getByTitle(string $title)
    // {
    //     return $this->service->getPublisherByTitle($title);
    // }

    public function searchPublisher(string $key, string $value)
    {
        return $this->service->searchPublisher($key, $value);
    }
}
