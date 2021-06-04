<?php

namespace App\Http\Controllers;

use App\Mail\Nofity;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Utilities\Currency;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User as UserRepository;
use App\Repositories\Threshold as NotificationRepository;
use App\Repositories\Threshold as AlertsRepository;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
//             'latestRates' => $this->currencyAPI()->getExchangeRates(Auth::user()->currency),
            'latestRates' => ['success' => false],
            'currentUser' => Auth::user()
        ];
        $this->compareCurrencies();
        return view('home', $data);
    }


    public function setBaseCurrency(Request $request)
    {
        try {
            $this->getUserRepository()->setBaseCurrency($request->all());
            return $this->ajaxSuccess('Base currency updated successfully', false, true);
        } catch (QueryException $exception) {
            return $this->ajaxError($exception->getMessage());
        }
    }


    public function setThreshold(Request $request)
    {
        try {
            $this->getNotificationRepo()->create($request->all());
            return $this->ajaxSuccess('Threshold updated successfully', false, true);
        } catch (QueryException $exception) {
            return $this->ajaxError($exception->getMessage());
        }
    }

    protected function compareCurrencies()
    {
        $authUser = Auth::user();

        if (!empty($authUser->alert)) {
            $response = $this->currencyAPI()->compareCurrencies($authUser->currency, $authUser->alert->currency, $authUser->alert->amount);

            if ($response['success']) {
                if ($response['query']['amount'] . $authUser->alert->symbol . $authUser->alert->amount) {
                    $rawMail = [
                        'from' => 'admin@financeinst.com',
                        'body' => 'Hi, <strong>' . $authUser->name . '</strong><br><br>' .
                                    '</strong><br> Alert for: <strong>' . $authUser->alert->currency .
                                     $authUser->alert->symbol . $authUser->alert->amount . '<br></strong>',
                    ];
                 return Mail::to($authUser->email)->send(new Nofity($rawMail));
                }
            }
            return true;
        }
        return true;
    }

    public function currencyAPI()
    {
        return new Currency();
    }

    protected function getUserRepository()
    {
        return new UserRepository;
    }

    protected function getNotificationRepo()
    {
        return new NotificationRepository;
    }

    protected function getAlertsRepository()
    {
        return new AlertsRepository;
    }
}
