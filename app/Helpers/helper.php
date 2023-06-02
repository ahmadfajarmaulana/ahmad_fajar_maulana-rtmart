<?php

use Illuminate\Support\Facades\Auth;

function resJson($status, $message, $data = null, $statusCode)
{
    return response()->json([
        'success' => $status,
        'message' => $message,
        'data'    => $data
    ], $statusCode);
}

function assetURL($path)
{
    return config('app.asset_url') . '/' . ltrim($path, '/');
}

function currentUser()
{
    return Auth::user();
}