<?php


namespace Modules\APIProxy\Actions;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Lorisleiva\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HandleRequest extends Action
{
    public function authorize()
    {
        if ($this->runningAs('controller')) {
            return $this->request->wantsJson();
        }

        return true;
    }

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

        if (empty($service)) {
            return response('Service not found.', 400);
        }

        try {
            $client = new Client();

            $parameters = [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer " . session()->get('access_token'),
                ]
            ];

            if ($this->form_data) {
                $parameters['form_params'] = $this->form_data;
            }

            $response = $client->request($this->method, $url, $parameters);

            return $response->getBody()->getContents();

        } catch (RequestException $ex) {
            if ($ex->getCode() == 401) {
                return response(['message' => "Unauthorized access on $url."], $ex->getCode());
            } else {
                if ($ex instanceof NotFoundHttpException) {
                    return response(['message' => "Resource $url not found."], $ex->getCode());
                }
            }

            $ex_code = $ex->getCode();
            if (intval($ex_code) < 1) {
                $ex_code = 500;
            }

            $msg = $ex->getMessage();
            if (empty($msg)) {
                $msg = 'Unknown error';
            }

            return response($msg, $ex_code ?? 500);
        }
    }
}