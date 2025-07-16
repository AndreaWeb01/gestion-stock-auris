<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
class ExportationEcontroller extends Controller
{

    public function exportation(Request $request): StreamedResponse
    {
        $request->validate([
            'name' => 'required|string',
            'extension' => 'required|string|in:xlsx',
        ]);

        $filename = $request->name . '.' . $request->extension;

        // 1. Récupération des données
        $ventes = vente::select('code_recu', 'remise', 'mode_paiement', 'montant_total')->get();

        // 2. Création du spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // 3. Définir les en-têtes
        $headers = ['Code Reçu', 'Remise', 'Mode de Paiement', 'Montant Total'];
        $sheet->fromArray($headers, null, 'A1');

        // 4. Appliquer le style aux en-têtes
        $headerStyle = [
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '007ACC']],
            'borders' => ['allBorders' => ['borderStyle' => 'thin']],
        ];
        $sheet->getStyle('A1:D1')->applyFromArray($headerStyle);

        // 5. Remplir les données
        $rowIndex = 2;
        foreach ($ventes as $vente) {
            $sheet->setCellValue("A{$rowIndex}", $vente->code_recu);
            $sheet->setCellValue("B{$rowIndex}", $vente->remise);
            $sheet->setCellValue("C{$rowIndex}", $vente->mode_paiement);
            $sheet->setCellValue("D{$rowIndex}", $vente->montant_total);
            $rowIndex++;
        }

        // 6. Ligne Total
        $sheet->setCellValue("C{$rowIndex}", 'TOTAL');
        $sheet->setCellValue("D{$rowIndex}", $ventes->sum('montant_total'));

        // Style total
        $sheet->getStyle("C{$rowIndex}:D{$rowIndex}")->applyFromArray([
            'font' => ['bold' => true],
            'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'FCE4D6']],
            'borders' => ['allBorders' => ['borderStyle' => 'thin']],
        ]);

        // 7. Appliquer les bordures à toutes les lignes
        $sheet->getStyle("A1:D{$rowIndex}")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // 8. Auto-size des colonnes
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // 9. Retourner le fichier en téléchargement
        $writer = new Xlsx($spreadsheet);
        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename);
    }
}


