<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
class ExportPdf
{
// Generate PDF
    public function createPDF($model,$modal_id) {
        // retreive all records from db
        $data = $model::find($modal_id);
        // share data to view

        $pdf = PDF::loadView('pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
