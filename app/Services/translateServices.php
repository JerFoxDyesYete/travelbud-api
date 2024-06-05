<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class translateServices
{
    use ConsumesExternalService;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.translate.base_uri');
    }

    public function getTranslate($text)
    {
        $queryParams = ['text' => $text];
        return $this->performRequest('POST', '/detect-language', $queryParams);
    }

    public function getLang()
    {
        return $this->performRequest('GET', '/languages');
    }

    public function textTranslate($text, $source, $target)
    {
        $queryParams = [
            'text' => $text,
            'source' => $source,
            'targer' => $target,
        ];
        return $this->performRequest('POST', '/translate', $queryParams);
    }
}