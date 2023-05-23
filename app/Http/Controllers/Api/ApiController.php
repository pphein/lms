<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function createBook(Request $request)
    {
        // Get the updated data from the request
        $createdData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8000/api/books';

        // Create a new Guzzle HTTP client instance
        // $client = new Client();

        try {
            // Send a PUT request to the API endpoint with the updated data
            // $response = $client->put($apiUrl, [
            //     'json' => $createdData,
            // ]);
            Log::info("Created Data >> " . print_r($createdData, true));
            $response = Http::post($apiUrl, $createdData);

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

    public function updateBook(Request $request)
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

    public function deleteBook(Request $request)
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
            Log::info("Deleted Data >> " . print_r($updatedData, true));
            $response = Http::delete($apiUrl);

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

    public function createAuthor(Request $request)
    {
        // Get the updated data from the request
        $createdData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8000/api/authors';

        // Create a new Guzzle HTTP client instance
        // $client = new Client();

        try {
            // Send a PUT request to the API endpoint with the updated data
            // $response = $client->put($apiUrl, [
            //     'json' => $createdData,
            // ]);
            Log::info("Created Data >> " . print_r($createdData, true));
            $response = Http::post($apiUrl, $createdData);

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

    public function updateAuthor(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8000/api/authors/' . $request->input('id');

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

    public function deleteAuthor(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8000/api/authors/' . $request->input('id');

        // Create a new Guzzle HTTP client instance
        // $client = new Client();

        try {
            // Send a PUT request to the API endpoint with the updated data
            // $response = $client->put($apiUrl, [
            //     'json' => $updatedData,
            // ]);
            Log::info("Deleted Data >> " . print_r($updatedData, true));
            $response = Http::delete($apiUrl);

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
