<?php


namespace Modules\APIProxy\Actions;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Lorisleiva\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HandleRequest extends Action
{
    public function rules()
    {
        return [
            'service' => 'required',
            'path' => 'required',
            'method' => 'required'
        ];
    }

    public function handle()
    {
        $service = config("applications.$this->service");
        $url = $service['url'] . "/" . $this->path;

        try {
            $client = new Client();
            $response = $client->request($this->method, $url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer " . session()->get('access_token'),
                ]
            ]);

            return $response->getBody();

        } catch (RequestException $ex) {
            if ($ex->getCode() == 401) {
                return response(['message' => "Unauthorized access on $url."], $ex->getCode());
            } else {
                if ($ex instanceof NotFoundHttpException) {
                    return response(['message' => "Resource $url not found."], $ex->getCode());
                }
            }

            return response($ex->getMessage(), $ex->getCode() ?? 500);
        }
    }
}