<?php

namespace Ogilo;

trait ApiResponseHelpers
{
    public function validationError($validator)
    {
        return response()->json([
            'success' => false,
            'message' => 'Validation Error',
            'details' => $validator->errors(),
        ], 415);
    }

    public function storeSuccess($message, $data = [])
    {
        $key = array_keys($data)[0];
        return response()->json([
            'success' => true,
            'message' => $message,
            $key => $data[$key],
        ], 201);
    }

    public function updateSuccess($message, $data = [])
    {
        $key = array_keys($data)[0];
        return response()->json([
            'success' => true,
            'message' => $message,
            $key => $data[$key],
        ], 202);
    }

    public function deleteSuccess()
    {
        return response()->json(null, 204);
    }

    public function importSuccess($message, $data = [])
    {
        $key = array_keys($data)[0];
        return response()->json([
            'success' => true,
            'message' => $message,
            $key => $data[$key],
        ], 202);
    }

    public function authSuccess($token, $user = null)
    {
        $data = [
            'success' => true,
            'message' => 'Authentication successful',
            'access_token' => $token,
        ];

        if ($user) {
            $data['user'] = $user;
        }
        return response()->json($data, 200);
    }

    public function respondWithSuccess($message, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], $code);
    }

    public function respondWithError($message, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}
