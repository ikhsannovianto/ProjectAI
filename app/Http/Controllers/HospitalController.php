<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalController extends Controller
{
    // Properti untuk menyimpan data, data yang sudah dinormalisasi, centroid, cluster, dan iterasi
    private $data;
    private $normalizedData;
    private $centroids;
    private $clusters;
    private $iterations;

    public function index()
    {
        // Data kinerja pelayanan rumah sakit yang akan dianalisis
        $this->data = [
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

        // Memanggil metode untuk menormalisasi data
        $this->normalizeData();
        // Memanggil metode untuk inisialisasi centroid
        $this->initializeCentroids();
        // Memanggil metode untuk menjalankan algoritma K-Means clustering
        $this->runKMeans();
        // Memanggil metode untuk evaluasi rumah sakit berdasarkan hasil clustering
        $this->evaluateHospitals();

        // Mengembalikan view dengan data yang akan ditampilkan
        return view('hospitals.index', [
            'originalData' => $this->data,
            'normalizedData' => $this->normalizedData,
            'iterations' => $this->iterations,
        ]);
    }

    // Metode untuk menormalisasi data rumah sakit
    private function normalizeData()
    {
        // Menginisialisasi array untuk data yang dinormalisasi
        $this->normalizedData = [];
        // Mencari nilai maksimum dan minimum untuk setiap atribut kecuali nama rumah sakit
        $maxValues = [];
        $minValues = [];

        // Menentukan nilai maksimal dan minimal untuk setiap atribut kinerja pelayanan rumah sakit
        foreach ($this->data as $hospital) {
            foreach ($hospital as $key => $value) {
                if ($key != 'name') {
                    if (!isset($maxValues[$key])) {
                        $maxValues[$key] = $value;
                        $minValues[$key] = $value;
                    } else {
                        $maxValues[$key] = max($maxValues[$key], $value);
                        $minValues[$key] = min($minValues[$key], $value);
                    }
                }
            }
        }

        // Normalisasi data untuk setiap rumah sakit berdasarkan nilai maksimum dan minimum
        foreach ($this->data as $hospital) {
            $normalizedHospital = ['name' => $hospital['name']];
            foreach ($hospital as $key => $value) {
                if ($key != 'name') {
                    $normalizedValue = ($value - $minValues[$key]) / ($maxValues[$key] - $minValues[$key]);
                    $normalizedHospital[$key] = round($normalizedValue * 9) + 1;
                }
            }
            // Menyimpan data yang sudah dinormalisasi
            $this->normalizedData[] = $normalizedHospital;
        }
    }

    // Metode untuk inisialisasi centroid
    private function initializeCentroids()
    {
        // Mengambil tiga data pertama sebagai centroid awal
        $this->centroids = array_slice($this->normalizedData, 0, 3);
        foreach ($this->centroids as &$centroid) {
            unset($centroid['name']);
        }
    }

    // Metode untuk menjalankan algoritma K-Means clustering
    private function runKMeans()
    {
        // Inisialisasi iterasi dan batas maksimum iterasi
        $this->iterations = [];
        $maxIterations = 100; // Batas maksimum iterasi
        $iteration = 0;

        // Iterasi K-Means
        do {
            // Menyimpan centroid sebelumnya dan memperbarui klaster untuk setiap rumah sakit
            $previousCentroids = $this->centroids;
            // Menginisialisasi cluster sebagai array kosong
            $this->clusters = [[], [], []];

            // Mengelompokkan setiap rumah sakit ke centroid terdekat
            foreach ($this->normalizedData as &$hospital) {
                $distances = [];
                foreach ($this->centroids as $centroidIndex => $centroid) {
                    $distances[$centroidIndex] = $this->calculateDistance($hospital, $centroid);
                }
                // Menghitung jarak ke centroid terdekat
                $closestCentroidIndex = array_search(min($distances), $distances);
                // Memasukkan rumah sakit ke klaster yang sesuai
                $this->clusters[$closestCentroidIndex][] = $hospital;
                
                // Menyimpan informasi jarak dan klaster pada rumah sakit
                $hospital['distances'] = $distances;
                $hospital['cluster'] = $closestCentroidIndex + 1;
            }

            // Menghitung ulang centroid berdasarkan klaster baru
            foreach ($this->clusters as $clusterIndex => $cluster) {
                if (!empty($cluster)) {
                    $newCentroid = [];
                    foreach (array_keys($cluster[0]) as $key) {
                        if ($key != 'name' && $key != 'distances' && $key != 'cluster') {
                            $sum = array_sum(array_column($cluster, $key));
                            $newCentroid[$key] = $sum / count($cluster);
                        }
                    }
                    $this->centroids[$clusterIndex] = $newCentroid;
                }
            }

            // Menyimpan hasil iterasi saat ini
            $this->iterations[] = [
                'iteration' => $iteration + 1,
                'centroids' => $this->centroids,
                'hospitals' => $this->normalizedData,
            ];

            // Menghitung jumlah iterasi
            $iteration++;
        } while (!$this->centroidsConverged($previousCentroids) && $iteration < $maxIterations);
    }

    // Metode untuk menghitung jarak Euclidean antara dua titik
    private function calculateDistance($point1, $point2)
    {
        $sum = 0;
        foreach ($point1 as $key => $value) {
            if ($key != 'name' && $key != 'distances' && $key != 'cluster') {
                // Menghitung jarak kuadrat antara setiap atribut
                $sum += pow($value - $point2[$key], 2);
            }
        }
        return sqrt($sum);
    }

    // Metode untuk memeriksa apakah centroid sudah konvergen
    private function centroidsConverged($previousCentroids)
    {
        $threshold = 0.001; // Batas ambang konvergensi
        foreach ($this->centroids as $index => $centroid) {
            // Memeriksa jarak antara centroid saat ini dan sebelumnya
            if ($this->calculateDistance($centroid, $previousCentroids[$index]) > $threshold) {
                return false;
            }
        }
        return true;
    }

    // Metode untuk mengevaluasi kinerja rumah sakit berdasarkan hasil clustering
    private function evaluateHospitals()
    {
        // Mendapatkan hasil iterasi terakhir
        $finalIteration = end($this->iterations);
        $clusterNames = ['Kinerja Kurang', 'Kinerja Cukup', 'Kinerja Baik'];

        // Evaluasi rumah sakit dalam cluster terakhir
        foreach ($finalIteration['hospitals'] as &$hospital) {
            $clusterIndex = $hospital['cluster'] - 1;
            $evaluation = [];
            $improvements = [];

            // Evaluasi dan saran perbaikan berdasarkan cluster
            switch ($clusterIndex) {
                case 0: // Kinerja Kurang
                    $evaluation[] = "Kinerja rumah sakit berada di bawah rata-rata.";
                    $improvements[] = "Lakukan evaluasi menyeluruh terhadap manajemen dan pelayanan rumah sakit.";
                    $improvements[] = "Tingkatkan efisiensi penggunaan tempat tidur dan manajemen pasien.";
                    $improvements[] = "Perbaiki kualitas pelayanan untuk meningkatkan kepuasan pasien.";
                    break;
                case 1: // Kinerja Cukup
                    $evaluation[] = "Kinerja rumah sakit berada pada tingkat rata-rata.";
                    $improvements[] = "Identifikasi area-area yang masih dapat ditingkatkan.";
                    $improvements[] = "Optimalkan penggunaan sumber daya yang ada.";
                    $improvements[] = "Tingkatkan efisiensi operasional untuk meningkatkan kinerja.";
                    break;
                case 2: // Kinerja Baik
                    $evaluation[] = "Kinerja rumah sakit di atas rata-rata.";
                    $improvements[] = "Pertahankan kinerja yang sudah baik.";
                    $improvements[] = "Terus lakukan inovasi untuk meningkatkan kualitas pelayanan.";
                    $improvements[] = "Bagikan praktik terbaik dengan rumah sakit lain di klaster yang lebih rendah.";
                    break;
            }

            // Evaluasi tambahan berdasarkan indikator spesifik rumah sakit
            if ($hospital['bor'] < 60) {
                $evaluation[] = "BOR rendah, menunjukkan penggunaan tempat tidur kurang optimal.";
                $improvements[] = "Tingkatkan promosi layanan rumah sakit dan kerjasama dengan fasilitas kesehatan tingkat pertama.";
            } elseif ($hospital['bor'] > 85) {
                $evaluation[] = "BOR tinggi, menunjukkan beban kerja tinggi dan risiko kualitas pelayanan menurun.";
                $improvements[] = "Pertimbangkan penambahan tempat tidur atau optimalisasi manajemen pasien.";
            }

            if ($hospital['bto'] < 30) {
                $evaluation[] = "BTO rendah, menunjukkan kurangnya pemanfaatan tempat tidur.";
                $improvements[] = "Tingkatkan efisiensi pelayanan dan promosi layanan rumah sakit.";
            } elseif ($hospital['bto'] > 50) {
                $evaluation[] = "BTO tinggi, menunjukkan tingginya perputaran penggunaan tempat tidur.";
                $improvements[] = "Pastikan kualitas pelayanan tetap terjaga meski perputaran pasien tinggi.";
            }

            if ($hospital['toi'] < 1) {
                $evaluation[] = "TOI rendah, risiko infeksi nosokomial tinggi dan kualitas pelayanan dapat menurun.";
                $improvements[] = "Tingkatkan interval pergantian tempat tidur untuk menjaga kualitas dan keamanan.";
            } elseif ($hospital['toi'] > 3) {
                $evaluation[] = "TOI tinggi, menunjukkan kurangnya pemanfaatan tempat tidur.";
                $improvements[] = "Tingkatkan efisiensi manajemen tempat tidur dan promosi layanan.";
            }

            if ($hospital['alos'] < 3) {
                $evaluation[] = "ALOS rendah, perlu memastikan pasien tidak dipulangkan terlalu cepat.";
                $improvements[] = "Evaluasi prosedur perawatan untuk memastikan kualitas pelayanan optimal.";
            } elseif ($hospital['alos'] > 6) {
                $evaluation[] = "ALOS tinggi, menunjukkan kemungkinan inefisiensi dalam perawatan.";
                $improvements[] = "Evaluasi dan tingkatkan efisiensi proses perawatan pasien.";
            }

            // Menyimpan evaluasi dan saran perbaikan untuk setiap rumah sakit
            $hospital['evaluation'] = $evaluation;
            $hospital['improvements'] = $improvements;
        }

        // Memperbarui hasil iterasi terakhir dengan hasil evaluasi
        $this->iterations[count($this->iterations) - 1] = $finalIteration;
    }
}