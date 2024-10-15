<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateFormRequest;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class EmailValidator extends Controller
{

    public $data;
    public $jobId;
    public $batch_id;
    public $url = "http://127.0.0.1:5000/verify-emails";

    /**
     * Display a listing of the resource.
     */
    public function index(ValidateFormRequest $request)
    {
        
        $this->data = ["emails" => [$request->input("email")]];

        return $this->validate_email();
        
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

    /**
     * Execute the job.
     */
    public function validate_email() : array
    {

        Log::info('Job started', ['time' => now(),'email' => count($this->data['emails'])]);
        
        $client = new Client();
        $url = $this->url;
        
        try {
            $response = $client->post($url, [
                'body' => json_encode($this->data),  // Sending data as JSON
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]);

            $statusCode = $response->getStatusCode();

            if( $statusCode == 200) {
                $response = json_decode($response->getBody(), true);
                Log::info('Job completed successfully', ['response' => $response,'time' => now()]);
                return ["success" => true, "response" => $response];
            }else{
                throw new \Exception('Some thing went wrong', 422);
            }
            
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $error = $e->getResponse()->getBody()->getContents();
                Log::error('Job failed', ['status' => $e->getResponse()->getStatusCode(), 'error' => $error, 'time' => now()]);
                return ["success" => false, "response" => $error];
            } else {
                Log::error('Job failed', ['status' => 500, 'error' => 'Request failed', 'time' => now()]);
                return ["success" => false, "response" => 'Request failed'];
            }

        } catch (\Exception $e) {
            Log::error('Job failed', ['status' => $e->getMessage(), 'error' => $e->getMessage(), 'time' => now()]);
            return ["success" => false, "response" => $e->getMessage()];
        }
    }
}
