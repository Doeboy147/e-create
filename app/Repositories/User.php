<?php

namespace App\Repositories;

use App\Models\User as Model;
use Laravel5Helpers\Repositories\Search;

class User extends Search
{

    protected function getModel()
    {
        return new Model;
    }

    public function setBaseCurrency($request)
    {
        return $this->getModel()->where('uuid', $request['user_id'])->update(['currency' => $request['currency']]);
    }

}
