<?php

namespace App\Http\Controllers\Refugios\XLSX;

use App\Classes\LoadTemplateExcel;
use App\Http\Controllers\Controller;
use App\Models\Refugio;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;

class RefugiosStorageController extends Controller{


    public function ListaRefugios() {

        ini_set('max_execution_time', 900);
        $Items = Refugio::query()->orderBy('numero')->get();

        $C0 = 2;
        $C = $C0;

        try {
            $file_external = trim(config("refugios.archivos.fmt_lista_refugios"));
            $extension = "Xlsx"; //Str::ucfirst($arrFE[1]);

            $archivo = LoadTemplateExcel::getFileTemplate($file_external);

            $reader = IOFactory::createReader($extension);
            $spreadsheet = $reader->load($archivo);
            $sh = $spreadsheet->setActiveSheetIndex(0);

            foreach ($Items as $item){

                $sh
                    ->setCellValue('A'.$C, strtoupper(trim($item->id ?? '')))
                    ->setCellValue('B'.$C, strtoupper(trim($item->numero ?? '')))
                    ->setCellValue('C'.$C, strtoupper(trim($item->refugio ?? '')))
                    ->setCellValue('D'.$C, strtoupper(trim($item->ubicacion ?? '')))
                    ->setCellValue('E'.$C, strtoupper(trim($item->ubicacion_google ?? '')))
                    ->setCellValue('F'.$C, strtoupper(trim($item->ruta->ruta ?? '')))
                    ->setCellValue('G'.$C, strtoupper(trim($item->ruta->zona ?? '')))
                    ->setCellValue('H'.$C, strtoupper(trim($item->capacidad ?? '')))
                    ->setCellValue('I'.$C, strtoupper(trim($item->infraestructura ?? '')))
                    ->setCellValue('J'.$C, strtoupper(trim($item->enlace ?? '')))
                    ->setCellValue('K'.$C, strtoupper(trim($item->telefonos ?? '')))
                    ->setCellValue('L'.$C, strtoupper(trim($item->latitud ?? '')))
                    ->setCellValue('M'.$C, strtoupper(trim($item->longitud ?? '')))
                    ->setCellValue('N'.$C, strtoupper(trim($item->poligono ?? '')))
                    ->setCellValue('O'.$C, strtoupper(trim($item->observaciones ?? '')));

                $C++;
            }

            $fileName = "_refugios_temporalesv_1.xlsx";
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename='.$fileName);
            header('Cache-Control: max-age=0');
            header('Cache-Control: max-age=1');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');
            $writer = IOFactory::createWriter($spreadsheet, $extension);
            $writer->save('php://output');
            exit;

        } catch (Exception $e) {
            echo 'Ocurrio un error al intentar abrir el archivo ' . $e;
        }



    }

}
