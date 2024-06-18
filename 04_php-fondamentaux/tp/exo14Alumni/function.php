<?php
function specialityCountMap($classOption, &$specialityMap): array
{
    if (array_key_exists($classOption, $specialityMap)) {
        $specialityMap[$classOption] += 1;
    } else {
        $specialityMap[$classOption] = 1;
    }
    return $specialityMap;
}

function EmployedPerSpe($alumnuses)
{
    $specialite = [];
    $notInSearch = [];
    foreach ($alumnuses as $alumni) {

        foreach ($alumni as $key => $value) {
            if ($key == 'classOption') {
                if (array_key_exists($value, $specialite)) {
                    $specialite[$value] += 1;
                } else {
                    $specialite[$value] = 1;
                }
                //array_count_values()
            } elseif ($key == 'inSearch' && !$alumni['inSearch']) {
                $notInSearch[] = $alumni['classOption'];
            }
        }
    }
    foreach ($specialite as $key => $total) {
        $numberInposte = array_count_values($notInSearch);

        $percent = ($numberInposte[$key] / $total) * 100;
        echo '<p>' . $key . ' : ' . $percent . ' % en poste</p>';
    }
    // print_r($numberInposte);
    // print_r($specialite);
    // print_r($notInSearch);
}
