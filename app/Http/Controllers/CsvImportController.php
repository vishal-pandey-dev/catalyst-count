<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvData;
use Illuminate\Support\Facades\DB;

class CsvImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:1024000'
        ]);

        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $filePath = $file->getRealPath();
            $header = null;
            $data = [];
            $chunkSize = 1000; 

            if (($handle = fopen($filePath, 'r')) !== false) {
                $header = fgetcsv($handle, 0, ',');

                while (!feof($handle)) {
                    $chunkData = [];
                    $rowCount = 0;

                    while (($row = fgetcsv($handle, 0, ',')) !== false && $rowCount < $chunkSize) {
                        $rowData = array_combine($header, $row);
                        $chunkData[] = $rowData;
                        $rowCount++;
                    }
                    $this->insertData($chunkData);
                }

                fclose($handle);

                return redirect()->back()->with('success', 'CSV data imported successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to open CSV file.');
            }
        }

        return redirect()->back()->with('error', 'Please upload a CSV file.');
    }

    private function insertData($data)
    {
        CsvData::insert($data);
    }
}
