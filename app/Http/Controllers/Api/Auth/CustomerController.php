<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function index() {
        // return $this->getAccessToken();
        $accessToken = $this->getAccessToken();
        $customers = null;
        // return $accessToken['access_token'];
        // $company_id = 855331826;
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token']])->get('https://www.zohoapis.com/billing/v1/customers');
        if ($response->successful()) {
            $customers = json_decode($response, true);
            $customers = $customers['customers'];
        }
        // return $response;
        return view('api.auth.customers.index', compact('customers'));
    }

    public function create() {
        return view('api.auth.customers.create');
    }

    public function store(Request $request) {
        $accessToken = $this->getAccessToken();
        Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token']])->post('https://www.zohoapis.com/billing/v1/customers', [
            'display_name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('customers.index');
    }

    public function update(Request $request, $id) {
        $accessToken = $this->getAccessToken();
        Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token']])->put('https://www.zohoapis.com/billing/v1/customers/' . $id, [
            'display_name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('customers.index');
    }

    public function show($id) {

        $accessToken = $this->getAccessToken();

        if ($id) {
            $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token']])->get('https://www.zohoapis.com/billing/v1/customers/' . $id);
            if ($response->successful()) {
                $customer = json_decode($response, true);
                $customer = $customer['customer'];
            }
        }
        // return $customer;
        return view('api.auth.customers.show', compact('customer'));
    }

    public function edit($id) {

        $accessToken = $this->getAccessToken();

        if ($id) {
            $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token']])->get('https://www.zohoapis.com/billing/v1/customers/' . $id);
            if ($response->successful()) {
                $customer = json_decode($response, true);
                $customer = $customer['customer'];
            }
        }
        // return $id;
        return view('api.auth.customers.edit', compact('customer'));
    }

    public function destroy($id) {

        $accessToken = $this->getAccessToken();

        Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken['access_token']])->delete('https://www.zohoapis.com/billing/v1/customers/' . $id);

        return redirect()->route('customers.index');

    }

    private function getAccessToken() {
        $clientId = '1000.B4LN77YNYL5J5KOJTXO6J7NGYX4FXZ';
        $clientSecret = '9070cf39936dd86b54612c7039e6dc22852bb8be08';
        $refreshToken = '1000.059ac31e932dae632a88704db3c68079.e74d413226180d9adb46a3b4dce2eec9';
        $redirectUri = 'http://zohoapis.test';
        $grant_type = 'refresh_token';

        $response = Http::post('https://accounts.zoho.com/oauth/v2/token?refresh_token=' . $refreshToken . '&client_id=' . $clientId . '&client_secret=' . $clientSecret . '&redirect_uri=' . $redirectUri . '&grant_type=' . $grant_type);

        return $response;
    }
}
