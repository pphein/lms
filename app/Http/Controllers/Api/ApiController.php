<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function update(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8000/api/books/' . $request->input('id');

        // Create a new Guzzle HTTP client instance
        // $client = new Client();

        try {
            // Send a PUT request to the API endpoint with the updated data
            // $response = $client->put($apiUrl, [
            //     'json' => $updatedData,
            // ]);
            Log::info("UPLOADED Data >> " . print_r($updatedData, true));
            $response = Http::put($apiUrl, $updatedData);

            // Check the response and handle any errors or success messages accordingly
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record updated successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to update record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }
}
