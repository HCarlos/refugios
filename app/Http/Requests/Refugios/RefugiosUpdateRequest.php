<?php

namespace App\Http\Requests\Refugios;

use App\Models\Refugio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
            'numero' => ['required', 'numeric','unique:refugios,numero,'.(int)$this->id],
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

//'imagen' => ['file','mimes:png,jpeg,jpg,gif,svg'],

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
        ];

        //dd($this->file('imagen'));

        $Id = (int)$this->id;

        // dd($this->id);

        if($Id <= 0){
            $ref = Refugio::create($Item);
        }else{
            $ref = Refugio::find($this->id);
            $ref->update($Item);
        }
        try {
            if ($this->hasFile('imagen')){
                $imgName = $ref->numero.'.'.$this->file('imagen')->getClientOriginalExtension();
                if($Id > 0) {
                    $e1 = Storage::disk('externo')->exists($ref->imagen);
                    if ($e1) {
                        Storage::disk('externo')->delete($ref->imagen);
                    }
                }
                $file = $this->file('imagen');
                $path = Storage::disk("externo")->put($imgName,File::get($file), 'public');
                $path = Storage::url($path);
                $ref->imagen = $imgName;
                $ref->save();
            }
        }catch (\Exception $e){
            dd($e->getMessage());
        }

        return $ref;

    }


}
