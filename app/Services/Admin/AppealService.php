<?php

namespace App\Services\Admin;

use App\Models\Appeal;
use App\Services\LogInterface;

class AppealService
{
    /**
     * LogInterface implementation
     *
     * @var object
     */
    private $logger;


    /**
     * Model: Appeal
     *
     * @var object
     */
    private $appeal;

    /**
     * Construct client appeal service
     *
     * @param LogInterface $logger
     * @param Appeal $appeal
     * 
     */
    public function __construct(LogInterface $logger, Appeal $appeal)
    {
        (object) $this->logger = $logger;
        (object) $this->appeal = $appeal;
    }

    /**
     * Get appeal
     *
     * @param int $id
     * 
     * @return object
     * 
     */
    public function getAppeal(int $id): ?object
    {
        try {
            $appeal =  $this->appeal::findOrFail($id);
        } catch (\Exception $e) {
            $this->logger->error('Error when getting appeal: ' . $e->getMessage());
            return null;
        }

        return $appeal;
    }

    /**
     * Getting all appeal
     * 
     * @return object
     * 
     */
    public function getAllAppeals(): ?object
    {
        $allAppeals = collect();

        try {
            $chunkSize = 100;
            $this->appeal->chunk($chunkSize, function ($appeals) use ($allAppeals) {
                foreach ($appeals as $appeal) {
                    $allAppeals->push($appeal);
                }
            });
        } catch (\Exception $e) {
            $this->logger->error('Error when getting appeals: ' . $e->getMessage());
            return null;
        }

        return $allAppeals;
    }

}
