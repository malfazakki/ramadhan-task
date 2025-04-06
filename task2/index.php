<?php

function transformOrangData(array $orang): array {
    $result = [];
    foreach ($orang as $data) {
        if (empty($data)) continue;

        $transformed = [
            'nama' => $data['nama'],
            'umur' => (int)$data['umur'],
            'jenis_kelamin' => $data['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan'
        ];
        $result[] = $transformed;
    }
    return $result;
}

// Example usage:
$orang = [
    [
        'nama' => 'John Doe',
        'umur' => '25 tahun',
        'jenis_kelamin' => 'L'
    ],
    [
        'nama' => 'Jane Smith',
        'umur' => '30 tahun',
        'jenis_kelamin' => 'P'
    ],
    []
];

$transformed = transformOrangData($orang);
print_r($transformed);
