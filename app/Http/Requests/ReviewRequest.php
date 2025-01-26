<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // يمكنك تغيير هذا إذا كان هناك تحقق من الصلاحيات
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'rating.required' => 'حقل التقييم مطلوب.',
            'rating.integer' => 'يجب أن يكون التقييم رقمًا صحيحًا.',
            'rating.min' => 'يجب أن يكون التقييم على الأقل 1.',
            'rating.max' => 'يجب ألا يزيد التقييم عن 5.',
            'name.required' => 'حقل الاسم مطلوب.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
            'comment.string' => 'يجب أن يكون التعليق نصًا.',
            'product_id.required' => 'حقل معرف المنتج مطلوب.',
            'product_id.exists' => 'المنتج المحدد غير موجود.',
        ];
    }
}