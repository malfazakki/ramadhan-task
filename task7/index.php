<?php
class StudentGrader {
    const KKM = 75;
    private $students = [];
    private $remedialCount = 0;
    private $passedCount = 0;
    private $belowKKM = [];

    public function addStudent($name, $score) {
        if ($score > 100 || $score < 0) {
            return false;
        }
        $this->students[$name] = $score;
        return true;
    }

    public function evaluateAll() {
        $this->remedialCount = 0;
        $this->passedCount = 0;
        $this->belowKKM = [];

        foreach ($this->students as $name => $score) {
            $grade = $this->getGrade($score);
            $this->printEvaluation($name, $score, $grade);

            // Count remedial students
            if ($grade === 'Belajar Lagi (Remidi)' || $grade === 'Ulangi Lagi pelajarannya 10x (Remidi)') {
                $this->remedialCount++;
            } else {
                $this->passedCount++;
            }

            // Track students below KKM
            if ($score < self::KKM) {
                $this->belowKKM[$name] = $score;
            }
        }
    }

    private function getGrade($score) {
        if ($score == 100) return 'Sempurna';
        if ($score >= 98) return 'Sangat Bagus';
        if ($score >= 90) return 'Sangat Bagus';
        if ($score >= 80) return 'Bagus';
        if ($score >= 70) return 'Lumayan';
        if ($score >= 50) return 'Belajar Lagi (Remidi)';
        return 'Ulangi Lagi pelajarannya 10x (Remidi)';
    }

    private function printEvaluation($name, $score, $grade) {
        echo "$name: $score - $grade\n";
    }

    public function getStatistics() {
        echo "\nStatistik Kelas:\n";
        echo "Jumlah siswa lulus: $this->passedCount\n";
        echo "Jumlah siswa remidi: $this->remedialCount\n";

        if (!empty($this->belowKKM)) {
            echo "\nSiswa di bawah KKM (75):\n";
            foreach ($this->belowKKM as $name => $score) {
                echo "$name: $score\n";
            }
        }
    }
}

// Example usage:
$grader = new StudentGrader();

// Add students
$grader->addStudent('Andi', 85);
$grader->addStudent('Budi', 72);
$grader->addStudent('Citra', 95);
$grader->addStudent('Dedi', 45);
$grader->addStudent('Eka', 65);
$grader->addStudent('Fani', 110); // Will be ignored
$grader->addStudent('Gina', -5); // Will be ignored

// Evaluate and show results
$grader->evaluateAll();
$grader->getStatistics();
