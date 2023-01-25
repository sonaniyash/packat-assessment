<?php

namespace App\Packt;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class Packt
{
    private string $endpoint;

    private string $apiToken;

    private int $page = 1;

    /**
     * Packt constructor.
     */
    public function __construct()
    {
        $this->endpoint = config('services.packt.endpoint');
        $this->apiToken = config('services.packt.api_token');
    }

    /**
     * Create an instance of ClientBuilder
     */
    public static function create(): static
    {
        return new static();
    }

    public function setPage(int $page): Packt
    {
        $this->page = $page;

        return $this;
    }

    public function list()
    {
        $params = [
            'token' => $this->apiToken,
            'page' => $this->page,
            'limit' => 12,
        ];

        $response = Http::get($this->endpoint . '/products', $params);

        return $response->json();
    }

    public function detail(string $id)
    {
        $params = [
            'token' => $this->apiToken,
        ];

        $response = Http::get($this->endpoint . '/products/' . $id, $params);

        return $response->json();
    }

    public function prices(string $id)
    {
        $params = [
            'token' => $this->apiToken,
        ];

        $response = Http::get($this->endpoint . '/products/' . $id . '/price/USD', $params);
        $response = $response->json();

        return Arr::get($response, 'prices', []);
    }
}
