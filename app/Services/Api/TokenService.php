<?php

namespace App\Services\Api;

use App\Models\User;
use App\Services\LogInterface;
use Illuminate\Support\Facades\Hash;

class TokenService
{
    /**
     * Model: User
     *
     * @var object
     */

    private $user;
    /**
     * LogInterface implementation
     *
     * @var object
     */

    private $logger;

    /**
     * Hash object init
     *
     * @var object
     */
    private $hash;

    /**
     * Api token service
     *
     * @param User $user
     * @param LogInterface $logger
     * 
     */
    public function __construct(User $user, LogInterface $logger, Hash $hash)
    {
        (object) $this->user = $user;
        (object) $this->logger = $logger;
        (object) $this->hash = $hash;
    }

    public function generateToken(array $data): array
    {
        $user = $this->user::where('email', $data['email'])->first();

        if (!$user || !$this->hash::check($data['password'], $user->password)) {
            return [
                'result' => false,
                'message' => 'Неправильный логин или пароль!'
            ];
        }

        try {
            $token = $user->createToken('api-token')->plainTextToken;

            return [
                'result' => true,
                'token' => $token
            ];
        } catch (\Exception $e) {
            $this->logger->error('Error when generate token: ' . $e->getMessage());
            return [
                'result' => false,
                'message' => 'Ошибка при создании токена'
            ];
        }
    }
}
