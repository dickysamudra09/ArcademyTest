<?php
    function inputData($nameP, $ageP){
        $name = $nameP;
        $age = $ageP;
        $address = "Jl.Joyo Taman Sari 1, Kota Malang, Indonesia";
        $hobbies = array('Main Game','Sepak Bola','Nonton Film');
        $is_married = FALSE;
        $list_school = array('year_in' => 2017, 'year_out' => 2020);
        $skill = array('skill_name' => array('Python' => array('level' => 'Beginner/Advanced'),
                                             'Java' => array('level' => 'Beginner'),
                                             'Php' => array('level' => 'Advanced')));
        $interest_in_coding = TRUE;                                       

        return array($name, $age, $address, $hobbies, $is_married, $list_school, $skill, $interest_in_coding);
    }    
    
    $dataArray = inputData('Dicky Samudra Alamsyah', 18);

    $jsonData = array(
        name                => $dataArray[0],
        age                 => $dataArray[1],
        address             => $dataArray[2],
        hobbies             => $dataArray[3],
        married             => $dataArray[4],
        list_school         => $dataArray[5],
        skills              => $dataArray[6],
        interest_in_coding  => $dataArray[7]    
    );

    echo json_encode($jsonData);

?>