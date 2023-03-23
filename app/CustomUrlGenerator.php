<?php 
namespace App;

use Illuminate\Support\Facades\Request;
use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;
class CustomUrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        $url = parent::getUrl();

        $urlParts = parse_url($url);

        if (isset($urlParts['port'])) {
            return $url;
        }

        $port = Request::getPort();

        if ($port) {
            $urlParts['port'] = $port;
        }

        return http_build_url('', $urlParts);
    }
}