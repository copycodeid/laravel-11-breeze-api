<?php

if (! function_exists('sendSuccessData')) {
    function sendSuccessData(mixed $data = null, ?string $message = 'Success'): array
    {
        if ($data != null) {
            return [
                'message' => $message,
                'data' => $data,
            ];
        }

        return [
            'message' => $message,
        ];
    }
}

if (! function_exists('sendFailedData')) {
    function sendFailedData(mixed $data = null, ?string $message = 'Failed'): array
    {
        $result = [
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }
}
