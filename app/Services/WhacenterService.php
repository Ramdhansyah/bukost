<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhacenterService
{

    protected string $to;
    protected array $lines;
    protected string $baseUrl = '';
    protected string $deviceId = '';
    protected string $token = '';


    /**
     * constructor.
     * @param array $lines
     */
    public function __construct($lines = [])
    {
        $this->lines = $lines;
        $this->baseUrl = 'https://api.ultramsg.com/instance50826/messages/chat';
        $this->deviceId = '';
        $this->token = 'aoj0l6jqk72n68q4';
    }

    public function getDeviceStatus()
    {
        return Http::get($this->baseUrl . '/statusDevice?device_id=' . $this->deviceId);
    }

    public function line($line = ''): self
    {
        $this->lines[] = $line;

        return $this;
    }

    public function to($to): self
    {
        $this->to = $to;

        return $this;
    }

    public function send(): mixed
    {
        if ($this->to == '' || count($this->lines) <= 0) {
            throw new \Exception('Message not correct.');
        }
        // $params = 'device_id=' . $this->deviceId . '&number=' . $this->to . '&message=' . urlencode(implode("\n", $this->lines));
         $params = 'token=' .$this->token. '&to=' . $this->to . '&body=' . urlencode(implode("\n", $this->lines));
        $response = Http::get($this->baseUrl .'?' . $params);
        return $response->body();
    }
}