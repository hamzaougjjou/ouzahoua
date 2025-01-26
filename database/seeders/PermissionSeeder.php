<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ["إضافة منتج", "add_product"],
            ["تعديل منتج", "edit_product"],
            ["حذف منتج", "delete_product"],
            ["عرض المنتجات", "view_products"],
            ["إدارة فئات المنتجات", "manage_product_categories"],
            ["إدارة الوسائط الرقمية", "manage_digital_assets"],
            ["إضافة تخفيض", "add_discount"],
            ["تعديل تخفيض", "edit_discount"],
            ["حذف تخفيض", "delete_discount"],
            ["عرض التخفيضات", "view_discounts"],
            ["إدارة الطلبات", "manage_orders"],
            ["عرض الطلبات", "view_orders"],
            ["تحديث حالة الطلب", "update_order_status"],
            ["إدارة العملاء", "manage_customers"],
            ["عرض العملاء", "view_customers"],
            ["إدارة الرسائل", "manage_messages"],
            ["إرسال الرسائل", "send_messages"],
            ["عرض الرسائل", "view_messages"],
            ["إدارة المخزون", "manage_inventory"],
            ["عرض المخزون", "view_inventory"],
            ["إضافة إلى المخزون", "add_to_inventory"],
            ["إدارة التقارير", "manage_reports"],
            ["عرض التقارير", "view_reports"],
            ["تصدير التقارير", "export_reports"],
            ["إدارة الإعدادات", "manage_settings"],
            ["إعدادات الدفع", "configure_payment_settings"],
            ["إعدادات الشحن", "configure_shipping_settings"],
            ["إعدادات المتجر", "configure_store_settings"],
            ["إدارة المستخدمين", "manage_users"],
            ["إضافة مستخدم", "add_user"],
            ["تعديل مستخدم", "edit_user"],
            ["حذف مستخدم", "delete_user"],
            ["عرض المستخدمين", "view_users"],
            ["إدارة المراجعات", "manage_reviews"],
            ["عرض المراجعات", "view_reviews"],
            ["حذف المراجعات", "delete_reviews"],
            ["إدارة الحوافز والعروض", "manage_promotions"],
            ["إضافة عرض", "add_promotion"],
            ["تعديل عرض", "edit_promotion"],
            ["حذف عرض", "delete_promotion"],
            ["عرض العروض", "view_promotions"],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission[1],
                'text' => $permission[0],
            ]);
        }
    }
}
