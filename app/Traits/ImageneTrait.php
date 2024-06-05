<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait ImageneTrait{


    protected $disk = 'denuncia';

    public function getTipoImageDenuncia($tipo=""){
        switch ($tipo){
            case 'thumb':
                return $this->image_thumb;
                break;
            default :
                return $this->image;
                break;
        }
    }

    // Get Image
    public function getPathImageAttribute(){
        return $this->getImage("");
    }

    // Get Image Thumbnail
    public function getPathImageThumbAttribute(){
        return $this->getImage("thumb");
    }

    public function getImage($tipoImage="thumb"){
        $ret = '/images/web/file-not-found.png';
        $path = config('refugios.public_url');
        $root = trim($this->root) == "" || trim($this->root) == "NULL" || is_null($this->root) ? $path : $this->root;
        $fl   = explode('.',$this->image);
        $dg   = $fl[count($fl)-1];
//        dd($dg);
        $flDoc = config("refugios.document_type_extension");
        $flImg = config("refugios.images_type_extension");
        if ( in_array( $dg, $flDoc ) ) {
            $ret = $root.'/images/web/document-file.png';
            $tFile = $this->getTipoImageDenuncia($tipoImage);
            $exists = Storage::disk($this->disk)->exists($tFile);
            $ret = $exists
                ? "/storage/".$this->disk."/".$tFile
                : $ret;
        }elseif (in_array( $dg, $flImg ) ) {
            $tFile = $this->getTipoImageDenuncia($tipoImage);
            $exists = Storage::disk($this->disk)->exists($tFile);
            $ret = $exists
                ? "/storage/".$this->disk."/".$tFile
                : $ret;
        }else{
            $ret = $root.'/images/web/file-not-found.png';
        }
        return $ret;

    }

    public function getPathImageMobileAttribute(){
        $this->disk = "mobile_denuncia";
        return $this->getImageMobile("");
    }

    public function getPathImageMobileThumbAttribute(){
        $this->disk = "mobile_denuncia";
        return $this->getImageMobile("thumb");
    }



    public function getImageMobile($tipoImage="thumb"){
        $ret = '/images/web/file-not-found.png';
        $path = config('refugios.public_url');
        $root = trim($this->root) == "" || trim($this->root) == "NULL" || is_null($this->root) ? $path : $this->root;
        $fl   = explode('.',$this->image);
        $dg   = $fl[count($fl)-1];
//        dd($dg);
        $flDoc = config("refugios.document_type_extension");
        $flImg = config("refugios.images_type_extension");
        if ( in_array( $dg, $flDoc ) ) {
            $ret = $root.'/images/web/document-file.png';
            $tFile = $this->getTipoImageDenuncia($tipoImage);
            $exists = Storage::disk($this->disk)->exists($tFile);

            $ret = $exists
                ? Storage::url('mobile/denuncia/') .$tFile
                : $ret;
        }elseif (in_array( $dg, $flImg ) ) {
            $tFile = $this->getTipoImageDenuncia($tipoImage);
            $exists = Storage::disk($this->disk)->exists($tFile);
            $ret = $exists
                ? Storage::url('mobile/denuncia/') .$tFile
                : $ret;
        }else{
            $ret = $root.'/images/web/file-not-found.png';
        }
        return $ret;

    }




}
