<?php

namespace App\Services\Client;

use App\Models\Appeal;
use App\Mail\AppealMail;
use App\Services\FileService;
use App\Services\LogInterface;
use Illuminate\Support\Facades\Mail;

class AppealService
{
    /**
     * LogInterface implementation
     *
     * @var object
     */
    private $logger;

    /**
     * The service responsible for working with files
     *
     * @var object
     */
    private $fileService;
    /**
     * Model: Appeal
     *
     * @var object
     */
    private $appeal;

    /**
     * Mail implementation
     *
     * @var object
     */

    private $mail;

    /**
     * Construct client appeal service
     *
     * @param LogInterface $logger
     * @param FileService $fileService
     * @param Appeal $appeal
     * @param Mail $mail
     * 
     */
    public function __construct(LogInterface $logger, FileService $fileService, Appeal $appeal, Mail $mail)
    {
        (object) $this->logger = $logger;
        (object) $this->appeal = $appeal;
        (object) $this->mail = $mail;
        (object) $this->fileService = $fileService;
    }

    /**
     * Creating a appeal
     *
     * @param array $data
     * 
     * @return object
     * 
     */
    public function createAppeal(array $data): ?object
    {
        try {
            if (isset($data['file'])) {
                $file = $data['file'];
                $path = $this->fileService->store($file);
                $data['file'] = $path;
            }
            $appeal = $this->appeal::create($data);

            return $appeal;
        } catch (\Exception $e) {
            $this->logger->error('Error when creating a category: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Sending a request to the manager's email
     *
     * @param object $data
     * 
     * @return bool
     * 
     */
    public function sendAppealByEmail(object $data): bool
    {
        try {
            $managerEmail = env('MANAGER_EMAIL');
            $this->mail::to($managerEmail)->send(new AppealMail($data));
            return true;
        } catch (\Exception $e) {
            $this->logger->error('Error when creating a category: ' . $e->getMessage());
            return false;
        }
    }
}
