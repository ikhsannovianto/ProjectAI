<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klaster Kinerja Rumah Sakit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body class="bg-purple-100">

<div class="container mx-auto p-4">

    <h1 class="mb-8 text-3xl text-center font-bold">Klasterisasi Kinerja Rumah Sakit di Kota Surakarta</h1>

    <div class="bg-white shadow-md rounded-lg mb-8">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Data Asli</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-purple-200">
                    <thead>
                        <tr class="bg-purple-100">
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Nama</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Tempat Tidur</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Pasien Keluar (Hidup + Mati)</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Hari Perawatan</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Lama Dirawat</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">BOR (%)</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">BTO (Kali)</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">TOI (Hari)</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">ALOS (Hari)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi tabel dengan data $originalData -->
                        <?php foreach($originalData as $hospital): ?>
                            <tr class="bg-purple-100">
                                <td class="border px-4 py-2 text-center"><?= $hospital['name'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['bed_count'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['patient_out'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['care_days'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['days_in_care'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['bor'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['bto'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['toi'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['alos'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg mb-8">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Data Dinormalisasi (Skala 1-10)</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-purple-200">
                    <thead>
                        <tr class="bg-purple-100">
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Nama</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Tempat Tidur</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Pasien Keluar (Hidup + Mati)</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Hari Perawatan</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Lama Dirawat</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">BOR</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">BTO</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">TOI</th>
                            <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">ALOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi tabel dengan data $normalizedData -->
                        <?php foreach($normalizedData as $hospital): ?>
                            <tr class="bg-purple-100">
                                <td class="border px-4 py-2 text-center"><?= $hospital['name'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['bed_count'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['patient_out'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['care_days'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['days_in_care'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['bor'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['bto'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['toi'] ?></td>
                                <td class="border px-4 py-2 text-center"><?= $hospital['alos'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg mb-8">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Metode Elbow</h2>
            <div id="elbow-chart"></div>
        </div>
    </div>

<script>
    // Menggunakan PHP untuk mengonversi data ke JSON
    var elbowData = <?php echo json_encode($elbowResult); ?>;
    
    var trace = {
        x: elbowData.map(function(item) { return item.k; }),
        y: elbowData.map(function(item) { return item.wcss; }),
        mode: 'lines+markers',
        type: 'scatter'
    };

    var layout = {
        title: 'Metode Elbow untuk Menentukan Jumlah Cluster Optimal',
        xaxis: {
            title: 'Jumlah Cluster (k)',
            dtick: 1, // Menampilkan angka dengan langkah 1
            range: [1, 10] // Menentukan rentang sumbu x dari 1 hingga 10
        },
        yaxis: {
            title: 'WCSS'
        }
    };

    Plotly.newPlot('elbow-chart', [trace], layout);
</script>

    <!-- Iterasi dan hasil klaster -->
    <?php foreach($iterations as $iteration): ?>
        <div class="bg-white shadow-md rounded-lg mb-8">
            <div class="bg-blue-500 text-white p-4 rounded-t-lg">
                <h2 class="text-xl font-bold mb-0">Iterasi <?= $iteration['iteration'] ?></h2>
            </div>
            <div class="p-4">
                <div class="overflow-x-auto">
                    <h3 class="text-lg font-bold mb-2">Centroid</h3>
                    <table class="table-auto w-full border-collapse border border-purple-200">
                        <thead>
                            <tr class="bg-pink-200">
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">Centroid</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">Jumlah Tempat Tidur</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">Pasien Keluar (Hidup + Mati)</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">Jumlah Hari Perawatan</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">Jumlah Lama Dirawat</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">BOR</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">BTO</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">TOI</th>
                                <th class="px-4 py-2 text-center bg-pink-300 text-pink-800">ALOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($iteration['centroids'] as $index => $centroid): ?>
                                <tr class="bg-pink-100">
                                    <td class="border px-4 py-2 text-center"><?= 'C' . ($index + 1) ?></td>
                                    <?php foreach($centroid as $value): ?>
                                        <td class="border px-4 py-2 text-center"><?= round($value, 2) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="overflow-x-auto mt-4">
                    <h3 class="text-lg font-bold mb-2">Rumah Sakit</h3>
                    <table class="table-auto w-full border-collapse border border-purple-200">
                        <thead>
                            <tr class="bg-purple-100">
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Nama</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Tempat Tidur</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Pasien Keluar (Hidup + Mati)</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Hari Perawatan</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jumlah Lama Dirawat</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">BOR</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">BTO</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">TOI</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">ALOS</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jarak ke C1</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jarak ke C2</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Jarak ke C3</th>
                                <th class="px-4 py-2 text-center bg-purple-300 text-purple-800">Klaster</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($iteration['hospitals'] as $hospital): ?>
                                <tr class="<?php 
                                    if ($hospital['cluster'] == 1) {
                                        echo 'bg-red-200';
                                    } elseif ($hospital['cluster'] == 2) {
                                        echo 'bg-yellow-200';
                                    } elseif ($hospital['cluster'] == 3) {
                                        echo 'bg-green-200';
                                    }
                                ?>">
                                    <td class="border px-4 py-2 text-center"><?= $hospital['name'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['bed_count'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['patient_out'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['care_days'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['days_in_care'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['bor'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['bto'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['toi'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['alos'] ?></td>
                                    <td class="border px-4 py-2 text-center"><?= round($hospital['distances'][0], 3) ?></td>
                                    <td class="border px-4 py-2 text-center"><?= round($hospital['distances'][1], 3) ?></td>
                                    <td class="border px-4 py-2 text-center"><?= round($hospital['distances'][2], 3) ?></td>
                                    <td class="border px-4 py-2 text-center"><?= $hospital['cluster'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="bg-white shadow-md rounded-lg mb-8">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Hasil Akhir Klastering</h2>
            <?php
                $finalIteration = end($iterations);
                $clusterNames = ['Kinerja Kurang', 'Kinerja Cukup', 'Kinerja Baik'];
            ?>
            <?php foreach($clusterNames as $index => $clusterName): ?>
                <div class="mb-6">
                    <h3 class="text-lg font-bold mb-2 bg-<?= $index === 0 ? 'red' : ($index === 1 ? 'yellow' : 'green') ?>-500 text-white p-2 rounded">
                        Klaster <?= $index + 1 ?> - <?= $clusterName ?>
                    </h3>
                    <ul class="list-disc pl-6 bg-<?= $index === 0 ? 'red' : ($index === 1 ? 'yellow' : 'green') ?>-100 p-4 rounded">
                        <?php foreach($finalIteration['hospitals'] as $hospital): ?>
                            <?php if($hospital['cluster'] == $index + 1): ?>
                                <li><?= $hospital['name'] ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg mb-8">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Evaluasi dan Peningkatan</h2>
            @foreach($finalIteration['hospitals'] as $hospital)
                <div class="mb-6 p-4 border rounded-lg @if($hospital['cluster'] == 1) bg-red-100 @elseif($hospital['cluster'] == 2) bg-yellow-100 @else bg-green-100 @endif">
                    <h3 class="text-lg font-bold mb-2">{{ $hospital['name'] }} (Klaster {{ $hospital['cluster'] }})</h3>
                    <div class="mb-4">
                        <h4 class="font-bold">Evaluasi:</h4>
                        <ul class="list-disc pl-6">
                            @foreach($hospital['evaluation'] as $eval)
                                <li>{{ $eval }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold">Peningkatan yang Disarankan:</h4>
                        <ul class="list-disc pl-6">
                            @foreach($hospital['improvements'] as $improvement)
                                <li>{{ $improvement }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

</body>
</html>
