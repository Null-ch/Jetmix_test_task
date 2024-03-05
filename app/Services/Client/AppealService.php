<?php

namespace App\Services\Client;

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
     * Creating a appeal
     *
     * @param array $data
     * 
     * @return bool
     * 
     */
    public function createAppeal(array $data): ?object
    {
        try {
            $file = $data['file'];
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/files/', $filename);
            $path = 'storage/files/' . $filename;
            $data['file'] = $path;
            $appeal = $this->appeal::create($data);
            return $appeal;
        } catch (\Exception $e) {
            $this->logger->error('Error when creating a category: ' . $e->getMessage());
            return null;
        }
    }
}
