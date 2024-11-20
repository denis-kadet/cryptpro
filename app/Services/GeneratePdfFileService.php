<?php

namespace App\Services;

use App\Models\Sign;
use App\Models\SignsPathFile;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GeneratePdfFileService
{
    public function generatePdfFile(array $params): bool
    {

        try {

            $uuid = $params['uuid'];

            $htmlContent = view('pattern', $params)->render();

            $relativePath = "$uuid/$uuid.pdf";

            $pdfFile = PDF::loadHtml($htmlContent)
                ->setPaper('A4')->output();

            $saveFile =  Storage::disk('public')->put($relativePath, $pdfFile);

            if (!$saveFile) {
                Log::error("generatePdfFile not save file $uuid");
                return false;
            }

            DB::beginTransaction();

            Sign::whereUuid($uuid)->update(
                [
                    'status_id' => 1
                ]
            );

            SignsPathFile::updateOrCreate(
                [
                    'signs_uuid' => $uuid,
                    'path_pdf_draft' => $relativePath
                ]
            );

            DB::commit();
            return true;
        } catch (\Exception $e) {
            Log::error("generatePdfFile not save file $uuid", ['massege' => $e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }
}
