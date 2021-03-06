<?php

namespace App\Services\Packages;

use App\Services\Router;
use GuzzleHttp\Exception\ClientException;

class XiaomiPadavan extends Router
{

    /**
     * @var string
     */
    protected $title = 'Xiaomi';

    /**
     * @var string
     */
    protected $color = 'is-info';

    /**
     * @return bool
     */
    public function restart(): bool
    {
        try {
            $this->guzzle()->post('/apply.cgi', [
                'auth' => [$this->username, $this->password],
                'headers' => [
                    'X-Requested-With' => 'XMLHttpRequest',
                ],
                'form_params' => [
                    'action_mode' => ' Reboot ',
                ],
            ]);
        } catch (ClientException $exception) {

        }

        return parent::restart();
    }

}
