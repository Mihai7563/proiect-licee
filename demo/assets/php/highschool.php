<?php

function getHighschoolData($idLiceu, $conn){
    $stmt = $conn->prepare("SELECT * FROM `licee_bucuresti` WHERE id = ?");
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    $highschoolData = $result->fetch_assoc(); // single row as associative array
    $highschoolData["medie_admitere"] = getHighschoolAdmissionScores($idLiceu, $conn);
    return $highschoolData;
}

function getHighschoolAdmissionScores($idLiceu, $conn){
    $stmt = $conn->prepare("SELECT * FROM `medii_admitere` WHERE id_liceu = ? ORDER BY `an` DESC LIMIT 0,5");
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}