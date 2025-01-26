<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
// use App\Http\Resources\ResponseResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{

    public function index(Request $request)
    {

        $filter = $request->input("filter");

        if ($filter) {
            $orders = Order::
                where("order_status", $filter)
                ->latest()
                ->paginate(15);
        } else {
            $orders = Order::latest()
                ->paginate(15);
        }


        foreach ($orders as $order) {
            # code...
            $order->date = $order->created_at->toDateTimeString();

        }

        return response()->json([
            "success" => true,
            "message" => 'orders retrieved successfully',
            "orders" => $orders
        ], 200);
    }


    public function show($id)
    {

        $order = Order::find($id);
        if (!$order) {
            return response()->json([
                "success" => false,
                "message" => 'orders retrieved successfully',
            ], 404);
        }
        // return ResponseResource::error("ordernot found", 404);

        $order->date = $order->created_at->toDateTimeString();
        $order->order_items = $order->orderItems;

        // return ResponseResource::success(
        //     $order,
        //     "order retrieved successfully"
        // );

        return response()->json([
            "success" => true,
            "message" => 'order retrieved successfully',
            "data" => $order
        ], 200);

    }

    /**
     * Update the status of an order.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $order
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request, $order)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'status' => ['required', 'string', Rule::in(array_column(OrderStatus::cases(), 'value'))],
            ]);

            // Find the order by ID
            $order = Order::findOrFail($order);

            // Update the status using the OrderStatus enum
            $order->order_status = OrderStatus::from($validated['status'])->value;
            $order->save();

            return response()->json([
                'message' => 'تم تحديث حالة الطلب بنجاح.',
                'order' => $order,
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'بيانات الإدخال غير صحيحة.',
                'details' => $e->errors(),
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'الطلب غير موجود.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'حدث خطأ أثناء تحديث حالة الطلب.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

}
