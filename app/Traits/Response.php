<?php

namespace App\Traits;

trait Response{

    protected function successResponse($data, $message = null, $code = 200)
	{
		return response()->json([
			'status'  =>  $code,
			'message' =>  $message,
			'data'    =>  $data
		], $code);
	}

	protected function errorResponse($message = null, $code)
	{
		return response()->json([
			'status'  => $code,
			'message' =>  $message,
			'data'    =>  null
		], $code);
	}

}
