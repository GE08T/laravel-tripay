<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripayController extends Controller
{
    public function getPaymentChannels ()
    {

		$apiKey = config('tripay.api_key');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_FRESH_CONNECT  => true,
		  CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER         => false,
		  CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
		  CURLOPT_FAILONERROR    => false,
		  CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
		));

		$response = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);

		$response = json_decode($response)->data;

		return $response ? $response : $error;
    }

    public function requestTransaction($method , $amount)
    {
		$apiKey       = config('tripay.api_key');
		$privateKey   = config('tripay.private_key');
		$merchantCode = config('tripay.merchant_code');
		$merchantRef  = 'TX'.time();

		$user = auth()->user();

		$data = [
		    'method'         => $method,
		    'merchant_ref'   => $merchantRef,
		    'amount'         => $amount,
		    'customer_name'  => $user->name,
		    'customer_email' => $user->email,
		    'customer_phone' => '081234567890',
		    'order_items'    => [
		        [
		            // 'sku'         => 'FB-06',
		            'name'        => 'Donasi Dari @'.$user->name,
		            'price'       => $amount,
		            'quantity'    => 1,
		            // 'product_url' => 'https://tokokamu.com/product/nama-produk-1',
		            // 'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
		        ],
		    ],
		    // 'return_url'   => 'https://domainanda.com/redirect', 	
		    'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
		    'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
		];

		$curl = curl_init();

		curl_setopt_array($curl, [
		    CURLOPT_FRESH_CONNECT  => true,
		    CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_HEADER         => false,
		    CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
		    CURLOPT_FAILONERROR    => false,
		    CURLOPT_POST           => true,
		    CURLOPT_POSTFIELDS     => http_build_query($data),
		    CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
		]);

		$response = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);
		
		$response = json_decode($response)->data;

		return $response ?: $error;

    }

    public function detailTransaction($reference)
    {

		$apiKey = config('tripay.api_key');

		$payload = ['reference'	=> $reference];

		$curl = curl_init();

		curl_setopt_array($curl, [
		    CURLOPT_FRESH_CONNECT  => true,
		    CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/detail?'.http_build_query($payload),
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_HEADER         => false,
		    CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
		    CURLOPT_FAILONERROR    => false,
		    CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
		]);

		$response = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);

		$response = json_decode($response)->data;

		return $response ?: $error;
    }
}
