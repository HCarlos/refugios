<?php

namespace App\Http\Requests\Refugios;

use App\Models\Colonia;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ColoniasUpdateRequest extends FormRequest
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
            'colonia_id' => ['required', 'numeric','min:1'],
            'colonia' => ['required', 'string'],
            'comunidad_id' => ['required', 'numeric','min:1'],
        ];
    }

//'imagen' => ['file','mimes:png,jpeg,jpg,gif,svg'],

    protected function prepareForValidation()
    {
        if ($this->colonia == null) {
            $this->request->remove('colonia');
        }
    }

    public function manage(){

        $Item = [
            'colonia_id' => (int)$this->colonia_id,
            'colonia' => strtoupper($this->colonia),
            'colonia1_id' => (int)$this->colonia1_id,
            'colonia1' => strtoupper($this->colonia1),
            'comunidad_id' => (int)$this->comunidad_id,
            'comunidad' => strtoupper($this->comunidad),
            'tipocomunidad_id' => (int)$this->tipocomunidad_id,
            'tipocomunidad' => strtoupper($this->tipocomunidad),
        ];

        //dd($this->file('imagen'));

        $Id = (int)$this->id;

        // dd($this->id);
        $Col = null;
        try {
            if($Id <= 0){
                $Col = Colonia::create($Item);
            }else{
                $Col = Colonia::find($this->id);
                $Col->update($Item);
            }

        }catch (\Exception $e){
            Log::info($e->getMessage());
        }

        return $Col;

    }


}
