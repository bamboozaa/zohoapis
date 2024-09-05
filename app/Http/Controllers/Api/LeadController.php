<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use DataTables;

class LeadController extends Controller
{
    private function getAccessToken() {
        $clientId = '1000.7DZFN7WJA2HS2W9FQZRPQHXMEGI07F';
        $clientSecret = '1215538685d4417757b0776ed511479ce97f92825d';
        $refreshToken = '1000.ee46c713cc87668d2d5bba8bc0ac368f.e87e2fedf78b47cecd02a179f18adbc9';
        $redirectUri = 'http://zohoapis.test';
        $grant_type = 'refresh_token';

        $response = Http::post('https://accounts.zoho.com/oauth/v2/token?refresh_token=' . $refreshToken . '&client_id=' . $clientId . '&client_secret=' . $clientSecret . '&redirect_uri=' . $redirectUri . '&grant_type=' . $grant_type);

        return $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = [
        //     'data' => [
        //         "Lead_Source" => "Employee Referral",
        //         "Last_Name" => "Daly",
        //         "First_Name" => "Paul",
        //         "Email" => "p.daly@zylker.com",
        //     ]
        // ];
        // return response()->json($data);
        // return $this->getAccessToken();
        $accessToken = $this->getAccessToken();
        // $leads = null;
        // $company_id = 855331826;
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token']])->get('https://www.zohoapis.com/crm/v3/Leads?fields=First_Name,Last_Name,Email,Lead_Source');

        // return $response;

        if ($response->successful()) {
            $leads = json_decode($response, true);
            $leads = $leads['data'];
        }

        // dd($leads);

        // return Datatables::of($leads)
        //             ->addIndexColumn()
        //             ->make(true);

        return view('api.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('api.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $accessToken = $this->getAccessToken();
        $client = new Client();
        $headers = [
            'Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token'],
            'Content-Type' => 'application/json'
        ];
        $url = 'https://www.zohoapis.com/crm/v6/Leads';


        $recordData = [
            [
                'First_Name' => $request->input('First_Name', $request->first_name),
                'Last_Name' => $request->input('Last_Name', $request->last_name),
                'Email' => $request->input('Email', $request->email),
                'Phone' => $request->input('Phone', $request->phone),
                // 'Nationality_(Online_app.)' => $request->input('Nationality_(Online_app.)', $request->nationality),
                'Country' => $request->input('Country', $request->country),
                'Lead_Source' => $request->input('Lead_Source', 'Download'),
                'Description' => $request->input('Description', 'UTCC Privacy Policy'),
            ]
        ];

        try {

            $response = $client->post($url , [
                'headers' => [
                    'Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token'],
                    'Content-Type' => 'application/json',
                ],
                'json' => ['data' => $recordData]
            ]);

            $responseBody = json_decode($response->getBody(), true);


            // return response()->json(['message' => 'Record inserted successfully', 'data' => $responseBody], 200);
            return response()->json(['success' => 'Record inserted successfully'], 200);
            // return response()->download('downloads/DM2024_en.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error inserting record', 'error' => $e->getMessage()], 500);
        }

        // return response()->download('downloads/DM2024_en.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
