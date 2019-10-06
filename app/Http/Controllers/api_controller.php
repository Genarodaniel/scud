<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class api_controller extends Controller
{
    public function __construct()
    {
        $this->header['Authorization'] = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY4OTlhNDdlZjE0MDAwZTZiYjY5ZTZlM2ZkNjBjZmVkZGExN2I2ZGQzOThhNzVhZjhmMDJiMzFmMGI4ZTI1MTk4NDJiMTFkZWRiNWY2MmQ4In0.eyJhdWQiOiIxIiwianRpIjoiNjg5OWE0N2VmMTQwMDBlNmJiNjllNmUzZmQ2MGNmZWRkYTE3YjZkZDM5OGE3NWFmOGYwMmIzMWYwYjhlMjUxOTg0MmIxMWRlZGI1ZjYyZDgiLCJpYXQiOjE1NzAzMTIwMjQsIm5iZiI6MTU3MDMxMjAyNCwiZXhwIjoxNjAxOTM0NDIzLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.QJxBtYL4cYEJlZ0s-R_kI8omAt2wJE8xYBusLX6fJzf8bDRrE0q7npADe6sQrjroPhUVVc8Au7AZIUU7GKVunNf_yyw63h7WSytYDTGGZQYIg6es2VECfKgRoEDS_umorZsG4TxNK_FPZZV46gSlAtSVV6orhCf72qfoARbIeDvwBO9KRxAiIH2hAwMOh7p_929yhtuMlo2QwD3o-_-cvk_Qb7rW4uUgy3IJuA-j0S-jxgSxiRday241hsTxXXdnSVwe_8xz2HXWuvcnJA2THqNAV5Pod-TP9ZDc4pb4vt5HEiH3mNxHp45U-bl90y9q8TjiHhD9B6K5pCA-efMyLjSDojP9ENhzxrTpoyYuXzAFbUB5inQ5hX64b7E_3ragaWtyZ4RnF1PajIXx1EZkoum5Im7XN3xJyuh76-eRKVQfzPOa4PXtOyBnLX4yQFTTJ7Nz7-fKLgvV8SvaAjctWEQvvFRiU10YUc620n6S9m4wlVLiXI5v_UkK7ja6p2ltsjRNwwSB0ZcFihmvYm8PS1QO4CQwHpSnAyS9eq-zO5qTU5Xy7y9ZJOrskieXmPHYIbBpNPEwlweFbsOUOYO2ms_F8tVDBit3g8kEkBSTIFnYyS-rvjKdw25pYRPsVLPuhnHRR6weTkqLEz1K71DP7Fa4uzNVnJN_6btGIfCAbSI';
        $this->content_type['Content-Type'] = 'application/json';
        $this->client = new Client();

    }
    public function getTeste()
    {
        $response = $this->client->request('GET','http://127.0.0.1:8080/api/ok');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        return ($statusCode);

    }

    public function login(Request $request)
    {
        $content = $request->all();
        $send = $this->client->post('http://127.0.0.1:8000/api/api_user/login',$this->header,$content);
        $response = $send->send();
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        return response()->json($body,200);

    }

}
