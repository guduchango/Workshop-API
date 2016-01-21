<?php
namespace App\Services\Cart\Commands;
use DB;
use App\Events\OrderWasGenerated;
use App\Services\Cart\Models\Order;
use Dingo\Api\Exception\ResourceException;
class GenerateOrderHandler {
    public function handle($command)
    {
        DB::beginTransaction();
        try{
            $order = $this->saveOrder($command);
            DB::commit();
            event(new OrderWasGenerated($command, $order));
            return [
                'command' => $command,
                'order' => $order
            ];
        }catch (\Exception $e)
        {
            DB::rollBack();
            throw new ResourceException($e->getMessage());
        }
    }
    private function saveOrder($command)
    {
        return Order::create((array) $command);
    }

}
