<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppealRequest;
use App\Services\Client\AppealService;

class AppealController extends Controller
{
    protected $appealService;
    public function __construct(AppealService $appealService)
    {
        $this->appealService = $appealService;
    }
    public function index()
    {
        return view('home');
    }
    public function store(AppealRequest $request)
    {
        $data = $request->validated();
        $apeal = $this->appealService->createAppeal($data);
        return view('home');
    }
}
