<?php

namespace App\Http\Controllers;

use App\Contracts\Services\BookServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function __construct(
        private BookServiceInterface $service
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
        return $this->service->createBook($request->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->getBookById($id);
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
        return $this->service->updateBookById($id, $request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function getByTitle(string $title)
    // {
    //     return $this->service->getBookByTitle($title);
    // }

    public function searchBook(string $key, string $value)
    {
        return $this->service->searchBook($key, $value);
    }
}
