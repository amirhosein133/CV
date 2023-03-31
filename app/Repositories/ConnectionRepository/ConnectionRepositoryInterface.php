<?php

namespace App\Repositories\ConnectionRepository;

use App\Models\Connection;

interface ConnectionRepositoryInterface
{
    public function connection($key);

    public function destroy(Connection $connection);

    public function changeStatusConnection(Connection $connection);

    public function createConnection($attributes);
}
