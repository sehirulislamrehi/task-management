<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

/**
 * Contain some utility function to handel the response for api
 * @author Alimul-Mahfuz <alimulmahfuztushar@gamil.com>
 * @copyright 2023 MIS PRAN-RFL Group
 */
trait ApiResponseTrait
{

    /**
     * To handel success response
     *
     * @param mixed $data
     * @param string|null $message
     * @param integer $code
     * @return JsonResponse
     */
    protected function success($data, ?string $message = null, int $code = 200): JsonResponse
    {
        return response()->json(
            [
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ],
            $code
        );
    }

    /**
     * To handel warning response
     *
     * @param mixed $data
     * @param string|null $message
     * @param integer $code
     * @return JsonResponse
     */
    protected function warning($data, ?string $message = null, int $code = 200): JsonResponse
    {
        return response()->json(
            [
                'status' => 'warning',
                'message' => $message,
                'data' => $data,
            ],
            $code
        );
    }

    /**
     * To handel error response
     *
     * @param mixed|null $data
     * @param string|null $message
     * @param integer $code
     * @return JsonResponse
     */
    protected function error(mixed $data = null, ?string $message = null, int $code = 200): JsonResponse
    {
        return response()->json(
            [
                'status' => 'error',
                'message' => $message,
                'data' => $data,
            ],
            $code
        );
    }

    /**
     * To handel location reload response
     *
     * @param mixed|null $data
     * @param string|null $message
     * @param bool $location_reload
     * @param null $url
     * @param integer $code
     * @return JsonResponse
     */
    protected function location_reload(mixed $data = null, ?string $message = null, bool $location_reload = true, $url = null, int $code = 200): JsonResponse
    {

        return response()->json(
            [
                'status' => 'success',
                'message' => $message,
                'data' => $data,
                'location_reload' => $location_reload,
                'url' => $url,
            ],
            $code
        );
    }
}
