<?php


namespace Core\BankIntegration;


use Core\User\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SomeBankClient implements IntegrationInterface
{
    /**
     * @param User $user
     * @return ResponseStructure
     */
    public function sendMoney(User $user): ResponseStructure
    {
        //Fake api request...
        $client = new Client();
        $response = new ResponseStructure();

        try {
            $request = $client->post('https://reqres.in/api/users', [
                'form_params' => [
                    'name' => $user->name,
                    'job' => 'manager',
                ]
            ]);

            $bankResponse = json_decode($request->getBody()->getContents(), true);

            $response->setStatus($bankResponse['name']);
            $response->setCode(200);
        } catch (GuzzleException $exception) {
            $response->setStatus($exception->getMessage());
            $response->setCode($exception->getCode());
        }

        return $response;
    }
}
