<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function create($data)
    {
        $user = $this->model->create($data);
        if (isset($data['address'])) {
            $user->address()->create($data['address']);
        }
        return $user->fresh();
    }
}
