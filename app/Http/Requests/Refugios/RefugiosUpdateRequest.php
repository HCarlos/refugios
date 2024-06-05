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
            'numero' => ['required', 'numeric'],
            'refugio' => ['required', 'string'],
            'ubicacion' => ['required', 'string'],
            'latitud' => ['required', 'numeric'],
            'longitud' => ['required', 'numeric'],
            'capacidad' => ['required', 'numeric'],
            'activado' => ['required', 'min:0','numeric'],
            'categoria' => ['required', 'string'],
            'refugiorutaid' => ['required', 'min:1', 'numeric'],
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
            'numero' => (int)$this->numero,
            'refugio' => strtoupper($this->refugio),
            'ubicacion' => strtoupper($this->ubicacion),
            'ubicacion_google' => strtolower($this->ubicacion_google),
            'enlace' => strtoupper($this->enlace),
            'telefonos' => strtoupper($this->telefonos),
            'infraestructura' => strtoupper($this->infraestructura),
            'capacidad' => (int)$this->capacidad,
            'observaciones' => strtoupper($this->observaciones),
            'latitud' => (float)$this->latitud,
            'longitud' => (float)$this->longitud,
            'activado' => $this->activado,
            'categoria' => $this->categoria,
            'refugiorutaid' => (int)$this->refugiorutaid,
            'poligono' => $this->poligono ?? '',
            'imagen' => $this->imagen,
        ];

        // dd($Item);

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
