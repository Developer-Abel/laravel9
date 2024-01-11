<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest{

    public function authorize(){
        return true;
    }


    public function rules(){
        // Realizar validaciones al actualizar y al guardar
        // if($this->isMethod('POST')){
        //     return [
        //         'title' => ['min:8'],
        //         'body'  => ['required']
        //     ];

        // }

        return [
            'title' => ['required'],
            'body'  => ['required']
        ];
    }
}
