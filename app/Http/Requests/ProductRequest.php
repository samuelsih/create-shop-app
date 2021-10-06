<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min: 0'],
            'status' => ['required', 'in:available,unavailable'],
        ];
    }

    public function withValidator($validator) {
        // if(request()->stock == 0 && request()->status == 'available') {
        //     //bisa dipersingkat dengan withErrors()
        //     // session()->flash('error', 'If stock = 0, status must unavailable');

        //     //kembali ke page sebelumnya, dengan membawa value isi dari request sebelumnya.
        //     return redirect()
        //             ->back()
        //             ->withInput(request()->all())
        //             ->withErrors('If stock = 0, status must unavailable');
        // }

        if($this->stock == 0 && $this->status == 'available') {
            $validator->errors()->add('stock', 'If stock = 0, status must unavailable');
        }
    }
}
