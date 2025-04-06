<?php
class QuinqueElementorum {
    private $elements = [
        'Api' => ['menang' => ['Es', 'Angin'], 'kalah' => ['Air', 'Tanah']],
        'Air' => ['menang' => ['Api', 'Tanah'], 'kalah' => ['Angin', 'Es']],
        'Tanah' => ['menang' => ['Api', 'Angin'], 'kalah' => ['Air', 'Es']],
        'Angin' => ['menang' => ['Air', 'Es'], 'kalah' => ['Api', 'Tanah']],
        'Es' => ['menang' => ['Air', 'Tanah'], 'kalah' => ['Api', 'Angin']]
    ];

    public function play($playerChoice, $computerChoice) {
        if (
            !array_key_exists($playerChoice, $this->elements) ||
            !array_key_exists($computerChoice, $this->elements)
        ) {
            return "Invalid element!";
        }

        if ($playerChoice === $computerChoice) {
            return "Seri!";
        }

        if (in_array($computerChoice, $this->elements[$playerChoice]['menang'])) {
            return "Anda menang! $playerChoice mengalahkan $computerChoice";
        } elseif (in_array($computerChoice, $this->elements[$playerChoice]['kalah'])) {
            return "Anda kalah! $computerChoice mengalahkan $playerChoice";
        } else {
            return "Hasil tidak terdefinisi";
        }
    }

    public function getRandomElement() {
        return array_rand($this->elements);
    }
}

// Example usage:
$game = new QuinqueElementorum();

// Player and computer choices
$player = 'Angin';
$computer = $game->getRandomElement();

// Play the game
echo $game->play($player, $computer);
