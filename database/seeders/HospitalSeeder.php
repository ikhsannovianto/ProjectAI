<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'RSUD DR. MOEWARDI', 'bed_count' => 887, 'patient_out' => 28480, 'care_days' => 216757, 'days_in_care' => 173244, 'bor' => 66.95, 'bto' => 32, 'toi' => 4, 'alos' => 6],
            ['name' => 'RST SLAMET RIYADI', 'bed_count' => 110, 'patient_out' => 4436, 'care_days' => 14027, 'days_in_care' => 9591, 'bor' => 34.94, 'bto' => 40, 'toi' => 6, 'alos' => 2],
            ['name' => 'RSUD IBU FATMAWATI SOEKARNO', 'bed_count' => 160, 'patient_out' => 7844, 'care_days' => 20491, 'days_in_care' => 20460, 'bor' => 35.09, 'bto' => 49, 'toi' => 5, 'alos' => 3],
            ['name' => 'RSUD BUNG KARNO', 'bed_count' => 106, 'patient_out' => 2050, 'care_days' => 7665, 'days_in_care' => 5615, 'bor' => 19.81, 'bto' => 19, 'toi' => 15, 'alos' => 3],
            ['name' => 'RS DR. OEN KANDANG SAPI SOLO', 'bed_count' => 275, 'patient_out' => 18160, 'care_days' => 57239, 'days_in_care' => 56477, 'bor' => 57.03, 'bto' => 66, 'toi' => 2, 'alos' => 3],
            ['name' => 'RS BRAYAT MINULYO', 'bed_count' => 121, 'patient_out' => 5001, 'care_days' => 14943, 'days_in_care' => 5412, 'bor' => 33.83, 'bto' => 41, 'toi' => 6, 'alos' => 1],
            ['name' => 'RS PANTI WALUYO', 'bed_count' => 107, 'patient_out' => 5664, 'care_days' => 20038, 'days_in_care' => 14125, 'bor' => 51.31, 'bto' => 53, 'toi' => 3, 'alos' => 2],
            ['name' => 'RS KASIH IBU', 'bed_count' => 204, 'patient_out' => 14281, 'care_days' => 42522, 'days_in_care' => 40904, 'bor' => 57.11, 'bto' => 70, 'toi' => 2, 'alos' => 3],
            ['name' => 'RS PKU MUHAMMADIYAH SURAKARTA', 'bed_count' => 377, 'patient_out' => 28804, 'care_days' => 85617, 'days_in_care' => 84188, 'bor' => 62.22, 'bto' => 76, 'toi' => 2, 'alos' => 3],
            ['name' => 'RSUI KUSTATI', 'bed_count' => 141, 'patient_out' => 14085, 'care_days' => 30502, 'days_in_care' => 29221, 'bor' => 59.27, 'bto' => 100, 'toi' => 1, 'alos' => 2],
            ['name' => 'RS TRIHARSI', 'bed_count' => 116, 'patient_out' => 5116, 'care_days' => 13918, 'days_in_care' => 9618, 'bor' => 32.87, 'bto' => 44, 'toi' => 6, 'alos' => 2],
            ['name' => 'RS HERMINA', 'bed_count' => 125, 'patient_out' => 11879, 'care_days' => 32031, 'days_in_care' => 40657, 'bor' => 70.2, 'bto' => 95, 'toi' => 1, 'alos' => 3],
            ['name' => 'RS PKU MUHAMMADIYAH SAMPANGAN', 'bed_count' => 54, 'patient_out' => 2912, 'care_days' => 10778, 'days_in_care' => 7664, 'bor' => 54.68, 'bto' => 54, 'toi' => 3, 'alos' => 3],
            ['name' => 'RS JIH SURAKARTA', 'bed_count' => 104, 'patient_out' => 5958, 'care_days' => 23692, 'days_in_care' => 17805, 'bor' => 62.41, 'bto' => 57, 'toi' => 2, 'alos' => 3],
            ['name' => 'RSUP SURAKARTA', 'bed_count' => 104, 'patient_out' => 2691, 'care_days' => 12479, 'days_in_care' => 12420, 'bor' => 32.87, 'bto' => 26, 'toi' => 9, 'alos' => 5],
            ['name' => 'RSJD dr. ARIF ZAINUDDIN SURAKARTA', 'bed_count' => 260, 'patient_out' => 3034, 'care_days' => 48885, 'days_in_care' => 48837, 'bor' => 51.51, 'bto' => 12, 'toi' => 15, 'alos' => 16],
            ['name' => 'RS MATA SOLO', 'bed_count' => 25, 'patient_out' => 53079, 'care_days' => 1052, 'days_in_care' => 1053, 'bor' => 11.53, 'bto' => 2123, 'toi' => 0, 'alos' => 0],
            ['name' => 'RSGM SULASTRI', 'bed_count' => 13, 'patient_out' => 139, 'care_days' => 191, 'days_in_care' => 186, 'bor' => 4.03, 'bto' => 11, 'toi' => 33, 'alos' => 1],
            ['name' => 'RS ONKOLOGI SURAKARTA', 'bed_count' => 25, 'patient_out' => 611, 'care_days' => 1567, 'days_in_care' => 1524, 'bor' => 17.17, 'bto' => 24, 'toi' => 12, 'alos' => 2],
        ];

        foreach ($data as $d) {
            Hospital::create($d);
        }
    }
}

