<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AppealRequest;
use App\Services\Client\AppealService;

class AppealController extends Controller
{
    /**
     * A service that contains the implementation of the logic of processing appeals
     *
     * @var object
     */
    protected $appealService;

    public function __construct(AppealService $appealService)
    {
        $this->appealService = $appealService;
    }

    /**
     * Displaying the page for creating a appeal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.index');
        }

        return view('home');
    }

    /**
     * Creating a appeal
     *
     * @param AppealRequest $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    public function store(AppealRequest $request)
    {
        $data = $request->validated();
        $appeal = $this->appealService->createAppeal($data);
        $result = $this->appealService->sendAppealByEmail($appeal);
        return redirect()->back()->with(['success' => $result]);
    }
}
