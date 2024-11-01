<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreSignRequest;
use App\Http\Requests\UpdateSignRequest;

class SignController extends Controller
{
    /**
     * Остановить валидацию после первой неуспешной проверки.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    public function index()
    {
        //
    }

    public function store(StoreSignRequest $request): JsonResponse
    {
        try {
            $params = $request->all();
            foreach ($params['data'] as $items) {
                $items = ["request_id" =>  $params['request_id']] + $items;
                Sign::create($items);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage(), [
                'request' => $params,
            ]);

            return response()->json([$e->getMessage()], 404);
        }

        return response()->json(['success' => 'true', 'massege' => 'Данный сохранены'], 200);
    }

    public function show(Sign $sign)
    {
        //
    }

    public function update(UpdateSignRequest $request, Sign $sign)
    {
        //
    }

    public function destroy(Sign $sign)
    {
        //
    }
}
