<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdviser extends FormRequest
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
          'lec_id' => 'required',
          'lec_fname' => 'required',
          'lec_lname' => 'required',
          'lec_title2' => 'required',
        ];
    }

    public function messages() {
      return [
        'lec_id.required' => 'กรุณากรอกรหัสอาจารย์ที่ปรึกษา',
        'lec_fname.required' => 'กรุณากรอกชื่ออาจารย์ที่ปรึกษา',
        'lec_lname.required' => 'กรุณากรอกนามสกุลอาจารย์ที่ปรึกษา',
        'lec_title2.required' => 'กรุณากรอกตำแหน่งปัจจุบัน',
      ];
    }
}
