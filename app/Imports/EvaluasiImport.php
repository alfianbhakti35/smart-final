<?php

namespace App\Imports;

use App\Models\Evaluasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EvaluasiImport implements ToModel, WithHeadingRow
{
    public function  __construct($materi_id)
    {
        $this->materi_id = $materi_id;
    }
    public function model(array $row)
    {
        return new Evaluasi([
            'soal' => $row['soal'],
            'materi_id' => $this->materi_id,
            'a' => $row['a'],
            'b' => $row['b'],
            'c' => $row['c'],
            'd' => $row['d'],
            'e' => $row['e'],
            'jawaban' => $row['jawaban'],
        ]);
    }
}
