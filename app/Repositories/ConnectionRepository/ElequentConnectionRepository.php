<?php

namespace App\Repositories\ConnectionRepository;

use App\Models\BaseModel;
use App\Models\Connection;
use Faker\Provider\Base;

class ElequentConnectionRepository implements ConnectionRepositoryInterface
{
    public $model;

    public function __construct(Connection $model)
    {
        $this->model = $model;

    }

    public function connection($key)
    {
        switch ($key) {
            case($key == BaseModel::TYPE_CONNECTION):
                return $this->model->where('type', 'connection')->get();
                break;
            case($key == BaseModel::TYPE_PROJECT):
                return $this->model->where('type', 'project')->get();
                break;
            case($key == BaseModel::TYPE_ARTICLE):
                return $this->model->where('type', 'article')->get();
            default:
                return $this->model->all();
        }
    }

    public function destroy(Connection $connection)
    {
        $connection->delete();
    }

    public function changeStatusConnection(Connection $connection)
    {
        $connection->update(['status' => 1]);
    }

    public function createConnection($attributes)
    {
        $connection = Connection::create([
            'name' => auth()->user()->name,
            'user_id' => auth()->id(),
            'email' => $attributes['email'],
            'subject' => $attributes['subject'],
            'type' => $attributes['type'] ?? BaseModel::TYPE_CONNECTION,
            'message' => $attributes['message']
        ]);
        return $connection;
    }
}
