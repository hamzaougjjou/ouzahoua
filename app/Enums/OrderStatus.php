<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case SHIPPED = 'shipped';
    case CONFIRMED = 'confirmed';
    case COMPLETED = 'completed';
    case RETURNED = 'returned';
    case CANCELED = 'canceled';
    case FAILED = 'failed';

    /**
     * Get the Arabic label for the order status.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'قيد الانتظار',
            self::SHIPPED => 'تم الشحن',
            self::CONFIRMED => 'تم التأكيد',
            self::COMPLETED => 'مكتمل',
            self::RETURNED => 'تم الإرجاع',
            self::CANCELED => 'ملغي',
            self::FAILED => 'فشل',
        };
    }
}
