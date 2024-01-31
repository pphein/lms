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
        $apiUrl = 'localhost:8001/api/books';

        try {
            Log::info("Created Data >> " . print_r($createdData, true));
            $response = Http::timeout(100)->post($apiUrl, $createdData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record created successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to create record');
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
        $apiUrl = 'localhost:8001/api/books/' . $request->input('id');

        try {
            Log::info("Updated Data >> " . print_r($updatedData, true));
            $response = Http::put($apiUrl, $updatedData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
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
        $apiUrl = 'localhost:8001/api/books/' . $request->input('id');

        try {
            Log::info("Deleted Data >> " . print_r($updatedData, true));
            $response = Http::delete($apiUrl);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record deleted successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to delete record');
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
        $apiUrl = 'localhost:8001/api/authors';

        try {
            Log::info("Created Data >> " . print_r($createdData, true));
            $response = Http::post($apiUrl, $createdData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record created successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to create record');
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
        $apiUrl = 'localhost:8001/api/authors/' . $request->input('id');

        try {
            Log::info("Updated Data >> " . print_r($updatedData, true));
            $response = Http::put($apiUrl, $updatedData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
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
        $apiUrl = 'localhost:8001/api/authors/' . $request->input('id');

        try {
            Log::info("Deleted Data >> " . print_r($updatedData, true));
            $response = Http::delete($apiUrl);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record deleted successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to delete record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }

    public function createCategory(Request $request)
    {
        // Get the updated data from the request
        $createdData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/categories';

        try {
            Log::info("Created Data >> " . print_r($createdData, true));
            $response = Http::post($apiUrl, $createdData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 201) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record created successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }

    public function updateCategory(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/categories/' . $request->input('id');

        try {
            Log::info("Updated Data >> " . print_r($updatedData, true));
            $response = Http::put($apiUrl, $updatedData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
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

    public function deleteCategory(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/categories/' . $request->input('id');

        try {
            Log::info("Deleted Data >> " . print_r($updatedData, true));
            $response = Http::delete($apiUrl);

            // Check the response and handle any errors or success messages accordingly
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record deleted successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to delete record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }

    public function createPublisher(Request $request)
    {
        // Get the updated data from the request
        $createdData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/publishers';

        try {
            Log::info("Created Data >> " . print_r($createdData, true));
            $response = Http::post($apiUrl, $createdData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 201) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record created successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }

    public function updatePublisher(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/publishers/' . $request->input('id');

        try {
            Log::info("Updated Data >> " . print_r($updatedData, true));
            $response = Http::put($apiUrl, $updatedData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
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

    public function deletePublisher(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/publishers/' . $request->input('id');

        try {
            Log::info("Deleted Data >> " . print_r($updatedData, true));
            $response = Http::delete($apiUrl);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record deleted successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to delete record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }

    public function createEdition(Request $request)
    {
        // Get the updated data from the request
        $createdData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/editions';

        try {
            Log::info("Created Data >> " . print_r($createdData, true));
            $response = Http::timeout(100)->post($apiUrl, $createdData);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record created successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }

    public function updateEdition(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/editions/' . $request->input('id');

        try {
            Log::info("Updated Data >> " . print_r($updatedData, true));
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

    public function deleteEdition(Request $request)
    {
        // Get the updated data from the request
        $updatedData = $request->except('_token');

        // Specify the API endpoint URL
        $apiUrl = 'localhost:8001/api/editions/' . $request->input('id');

        try {
            Log::info("Deleted Data >> " . print_r($updatedData, true));
            $response = Http::delete($apiUrl);

            // Check the response and handle any errors or success messages accordingly
            Log::info($response->getStatusCode());
            if ($response->getStatusCode() === 200) {
                // Success handling
                Log::debug("Success");
                return redirect()->back()->with('success', 'Record deleted successfully');
            } else {
                // Error handling
                Log::debug("Fail");
                return redirect()->back()->with('error', 'Failed to delete record');
            }
        } catch (\Exception $e) {
            // Exception handling
            Log::debug("Exception >> " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the record');
        }
    }
}
