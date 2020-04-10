<?php

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @param bool $status
 * @param string|null $msg
 * @param null $data
 * @param string $status_string
 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
 */
function return_msg(bool $status = false, string $msg = null, $data = null, string $status_string = "ok")
{
    $response_code = get_status_code($status_string);
    $response_payload = [
        'status' => $status,
        'code' => $response_code,
        'msg' => $msg,
        'data' => $data
    ];
    return $response_payload;
//    return response($response_payload, $response_code);
}

/**
 * @param string $type
 * @return int|mixed
 */
function get_status_code($type = "ok")
{
    return all_status_code()[strtolower($type)] ?? 200;
}

/**
 * @return array
 */
function all_status_code()
{
    return [
        "ok" => 200,
        "created" => 201,
        "accepted" => 202,
        "no_content" => 204,
        "moved" => 301,
        "found" => 302,
        "see_other" => 303,
        "not_modified" => 304,
        "temporary_redirect" => 307,
        "bad_request" => 400,
        "unauthorized" => 401,
        "forbidden" => 403,
        "not_found" => 404,
        "method_not_allowed" => 405,
        "not_acceptable" => 406,
        "precondition_failed" => 412,
        "unsupported_media_type" => 415,
        "validation_error" => 422,
        "server_error" => 500,
        "not_implemented" => 501,
    ];
}

/**
 * @param $collection
 * @param int $limit
 * @return LengthAwarePaginator
 */
function custom_paginate($collection, $limit = 20)
{
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $itemCollection = collect($collection);
    $perPage = $limit;
    $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->values();
    $collection = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
    $collection->setPath(request()->url());

    return $collection;
}


function handle_exception($exception)
{
    dd($exception->getMessage());
}