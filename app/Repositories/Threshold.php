<?php

namespace App\Repositories;

use App\Models\Threshold as Model;
use Laravel5Helpers\Repositories\Search;
use Webpatser\Uuid\Uuid;

class Threshold extends Search
{

    protected function getModel()
    {
        return new Model;
    }

    public function create($request)
    {
        $alert = $this->getModel()->where('user_id', $request['user_id'])->first();

        if (empty($alert)){
            $notification = $this->getModel();
            $notification->uuid     = Uuid::generate()->string;
            $notification->currency = $request['currency'];
            $notification->symbol   = $request['symbol'];
            $notification->amount   = $request['amount'];
            $notification->user_id  = $request['user_id'];
            return $notification->save();
        }else{
            return $this->update($request);
        }

    }

    protected function update($request)
    {
        return $this->getModel()->where('user_id', $request['user_id'])->update(
            ['currency' => $request['currency'], 'symbol' => $request['symbol'], 'amount' => $request['amount']]
        );
    }
}
