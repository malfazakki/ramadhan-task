<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-center mb-6">Quiz Pengetahuan Umum</h1>

        <?php
        $questions = [
            [
                'question' => 'Di mana Ibukota Indonesia?',
                'options' => ['a. IKN', 'b. Jakarta', 'c. Aceh', 'd. Papua'],
                'answer' => 'b'
            ],
            [
                'question' => 'Apa warna bendera Indonesia?',
                'options' => ['a. Merah-Putih', 'b. Biru-Kuning', 'c. Hijau-Hitam', 'd. Merah-Kuning'],
                'answer' => 'a'
            ],
            [
                'question' => 'Siapa presiden pertama Indonesia?',
                'options' => ['a. Joko Widodo', 'b. Soeharto', 'c. Soekarno', 'd. BJ Habibie'],
                'answer' => 'c'
            ],
            [
                'question' => 'Kapan Indonesia merdeka?',
                'options' => ['a. 16 Agustus 1945', 'b. 17 Agustus 1945', 'c. 18 Agustus 1945', 'd. 19 Agustus 1945'],
                'answer' => 'b'
            ],
            [
                'question' => 'Apa lambang negara Indonesia?',
                'options' => ['a. Elang', 'b. Harimau', 'c. Garuda', 'd. Komodo'],
                'answer' => 'c'
            ]
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $score = 0;
            echo '<div class="mb-6">';
            foreach ($questions as $i => $q) {
                $userAnswer = $_POST['q' . ($i + 1)] ?? '';
                $isCorrect = ($userAnswer === $q['answer']);
                if ($isCorrect) $score++;

                echo '<div class="mb-4 p-4 rounded ' . ($isCorrect ? 'bg-green-50' : 'bg-red-50') . '">';
                echo '<p class="font-semibold">' . ($i + 1) . '. ' . $q['question'] . '</p>';
                echo '<p class="text-sm text-gray-600 mt-1">Jawaban Anda: ' . $userAnswer . '</p>';
                echo '<p class="text-sm ' . ($isCorrect ? 'text-green-600' : 'text-red-600') . '">';
                echo $isCorrect ? 'Benar!' : 'Salah! Jawaban yang benar: ' . $q['answer'];
                echo '</p></div>';
            }
            echo '<div class="text-center font-bold text-lg mt-4">Skor Anda: ' . $score . '/' . count($questions) . '</div>';
            echo '</div>';
            echo '<a href="?" class="block text-center mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Coba Lagi</a>';
        } else {
            echo '<form method="POST">';
            foreach ($questions as $i => $q) {
                echo '<div class="mb-6">';
                echo '<p class="font-semibold mb-2">' . ($i + 1) . '. ' . $q['question'] . '</p>';
                foreach ($q['options'] as $option) {
                    echo '<label class="block mb-2 ml-4">';
                    echo '<input type="radio" name="q' . ($i + 1) . '" value="' . substr($option, 0, 1) . '" class="mr-2" required>';
                    echo $option;
                    echo '</label>';
                }
                echo '</div>';
            }
            echo '<button type="submit" class="w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Submit Jawaban</button>';
            echo '</form>';
        }
        ?>
    </div>
</body>

</html>