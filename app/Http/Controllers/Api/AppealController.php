<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Admin\AppealService;


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
     * Getting a list of all appeals
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     */
    public function index()
    {
        $appeals = $this->appealService->getAllAppeals();

        return response()->json($appeals);
    }

    /**
     * Getting information about a appeal by ID
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $appeal = $this->appealService->getAppeal($id);

        if (!$appeal) {
            return response()->json(['message' => 'Обращение не найдено'], 404);
        }

        return response()->json($appeal);
    }
}