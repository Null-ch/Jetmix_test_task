<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AppealService;

class AppealController extends Controller
{
    /**
     * A service that contains the implementation of the logic of processing requests
     *
     * @var object
     */
    protected $appealService;

    public function __construct(AppealService $appealService)
    {
        $this->appealService = $appealService;
    }

    /**
     * Receiving all appeals
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */
    public function index()
    {
        $appeals = $this->appealService->getAllAppeals();
        return view('admin.index', compact('appeals'));
    }

    /**
     * Getting information about a appeal by ID
     *
     * @param mixed $id
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */
    public function show($id)
    {
        $appeal = $this->appealService->getAppeal($id);
        return view('admin.show', compact('appeal'));
    }
}
