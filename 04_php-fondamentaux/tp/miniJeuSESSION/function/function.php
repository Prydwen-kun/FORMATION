<?php
function randNum(int $min, int $max): int
{
    return rand($min, $max);
}

function gameMystere(int $input, int $mystere, int &$essai): bool
{
    if ($input < $mystere) {
        $essai++;
        echo "Plus grand ! Tentative : " . $essai;
        return false;
    } else if ($input > $mystere) {
        $essai++;
        echo "Plus petit ! Tentative : " . $essai;
        return false;
    } else if ($input == $mystere) {
        $essai++;
        echo "You win ! Le nombre est bien " . $mystere . " trouvé en " . $essai . " essai.";
        return true;
    }
    return false;
}