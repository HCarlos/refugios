<?php

namespace App\Http\Requests\Refugios;

use App\Models\Refugio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RefugiosUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'refugio' => ['required', 'string'],
            'ubicacion' => ['required', 'string'],
            'latitud' => ['required', 'string'],
            'longitud' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->refugio == null) {
            $this->request->remove('ubicacion');
        }
    }

    public function manage(){

        $Item = [
            'refugio' => strtoupper($this->refugio),
            'ubicacion' => strtoupper($this->ubicacion),
            'ubicacion_google' => strtolower($this->ubicacion_google),
            'enlace' => strtoupper($this->enlace),
            'telefonos' => strtoupper($this->telefonos),
            'observaciones' => strtoupper($this->observaciones),
            'latitud' => strtoupper($this->latitud),
            'longitud' => strtoupper($this->longitud),
            'activado' => $this->activado,
            'categoria' => $this->categoria,
        ];

        $Id = (int)$this->id;

        if($Id <= 0){
            $ref = Refugio::create($Item);
        }else{
            $ref = Refugio::find($this->id);
            $ref->update($Item);
        }
        return $ref;

    }


}
