<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AppealService;

class AppealController extends Controller
{
    protected $appealService;
    public function __construct(AppealService $appealService)
    {
        $this->appealService = $appealService;
    }
    public function index()
    {
        return view('admin', compact('apeal'));
    }
    public function show($id)
    {
        $apeal = $this->appealService->getAppeal($id);
        return view('admin_show', compact('apeal'));
    }
}
