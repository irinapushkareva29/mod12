<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getPartsFromFullname ($fullname){
    $divided = explode(" ",$fullname);
    $seporated = [
        'surname' => $divided[0],
        'name' => $divided[1],
        'patronomyc' => $divided[2],
    ] ;

    return $seporated;

};

for ($i = 0;$i <= 10; $i++){
    $new_array_divided = getPartsFromFullname($example_persons_array[$i]['fullname']);
    print_r($new_array_divided);

    $new_array_united = getFullnameFromParts($new_array_divided['surname'],$new_array_divided['name'],$new_array_divided['patronomyc']);
    var_dump ($new_array_united). "\n";


};

function getFullnameFromParts ($surname,$name,$patronomyc) {
    $united = $surname.' '.$name.' '.$patronomyc;
    return $united;
};


function getShortName ($fullname) {
    $seporated = getPartsFromFullname ($fullname);
    $shortname = $seporated['name'].' '.mb_substr ($seporated['surname'],0,1);
    return $shortname;
}

for ($i = 0;$i <= 10; $i++){
    $new_array_short = getShortName ($example_persons_array[$i]['fullname']);
    var_dump ($new_array_short)."\n";
};

function getGenderFromName ($fullname){
    $seporated = getPartsFromFullname ($fullname);
    $gender = 0;

    if (mb_substr($seporated['surname'],-1,1) == "в") {
        $gender=1;
    } elseif (mb_substr($seporated['surname'],-2,2) == "ва") {
        $gender=-1;
    } else {
        $gender=0;
    };


    if (mb_substr($seporated['name'],-1,1) == "й" || mb_substr($seporated['name'],-1,1) == "н") {
        $gender=1;
    } elseif (mb_substr($seporated['name'],-1,1) == "а") {
        $gender=-1;
    } else {
        $gender=0;
    };


    if (mb_substr($seporated['patronomyc'],-2,2) == "ич") {
        $gender=1;
    } elseif (mb_substr($seporated['patronomyc'],-3,3) == "вна") {
        $gender=-1;
    } else {
        $gender=0;
    };


    if (($gender <=> 0) === 1) {
        return 'Мужчина';
    } else if (($gender <=> 0) === -1) {
        return 'Женщина';
    } else {
        return 'Пол не определен';
    };
};
    for ($i = 0;$i <= 10; $i++){
        $new_array_gender = getGenderFromName ($example_persons_array[$i]['fullname']);
        var_dump ($new_array_gender)."\n";        
    };

