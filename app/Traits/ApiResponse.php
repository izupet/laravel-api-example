<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Config;

trait ApiResponse {

    private $successHTTPStatusCodes = [
        200,
        201,
        304
    ];

    private $errorHTTPStatusCodes = [
        400,
        401,
        404,
        422,
        500
    ];

    public function respond($message, $HTTPStatusCode, $data = null, array $extras = [])
    {
        $meta = array_merge([
            'status'    => $status = $this->getStatus($HTTPStatusCode),
            'message'   => $message
        ], $extras);

        return new JsonResponse(compact('meta', $status === 'error' ?: 'data'), Config::get('api.suppressResponseHttpStatusCode') ? 200 : $HTTPStatusCode);
    }

    private function getStatus($HTTPStatusCode)
    {
        return in_array($HTTPStatusCode, $this->successHTTPStatusCodes) ? 'success' : 'error';
    }
}
