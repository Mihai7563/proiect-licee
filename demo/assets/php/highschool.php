<?php

function getHighschoolsList($conn){
    $query = "  SELECT 
                    *
                FROM 
                    `licee` JOIN 
                    (
                        SELECT 
                            MAX(an) AS an_procent_promovabilitate, 
                            procent_promovabilitate, 
                            id_liceu 
                        FROM `rate_promovabilitate` 
                        GROUP BY id_liceu 
                        ORDER BY id_liceu
                    ) AS `rate_promovabilitate` ON `licee`.`id` = `rate_promovabilitate`.`id_liceu` JOIN 
                    (
                        SELECT 
                            MAX(an) AS an_medie_admitere, 
                            medie, 
                            id_liceu 
                        FROM `medii_admitere` 
                        GROUP BY id_liceu 
                        ORDER BY id_liceu
                    ) AS `medii_admitere` ON `licee`.`id` = `medii_admitere`.`id_liceu`
                ORDER BY 
                    `nume`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getHighschoolData($idLiceu, $conn){
    $stmt = $conn->prepare("SELECT * FROM `licee` WHERE id = ?");
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    $highschoolData = $result->fetch_assoc(); // single row as associative array
    $highschoolData["medie_admitere"] = getHighschoolAdmissionScores($idLiceu, $conn);
    $highschoolData["rata_promovabilitate"] = getHighschoolGraduationRate($idLiceu, $conn);
    $highschoolData["rata_promovabilitate_curenta"] = $highschoolData["rata_promovabilitate"][0]["procent_promovabilitate"];
    $highschoolData["profiluri"] = getHighschoolProfiles($idLiceu, $conn);
    $highschoolData["cluburi"] = getHighschoolClubs($idLiceu, $conn);
    return $highschoolData;
}

function getHighschoolAdmissionScores($idLiceu, $conn){
    $stmt = $conn->prepare("SELECT * FROM `medii_admitere` WHERE id_liceu = ? ORDER BY `an` DESC LIMIT 0,5");
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getHighschoolGraduationRate($idLiceu, $conn){
    $stmt = $conn->prepare("SELECT * FROM `rate_promovabilitate` WHERE id_liceu = ? ORDER BY `an` DESC LIMIT 0,5");
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getHighschoolProfiles($idLiceu, $conn){
    $query = "  SELECT
                    `profiluri_licee`.`prioritate`,
                    `profiluri`.`denumire`
                FROM
                    `profiluri_licee` JOIN 
                    `profiluri` ON `profiluri_licee`.`id_profil` = `profiluri`.`id`	
                WHERE
                    `id_liceu` = ?
                ORDER BY
                    `profiluri_licee`.`prioritate`";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getHighschoolClubs($idLiceu, $conn){
    $query = "  SELECT 
                    `cluburi`.*,
                    `categorii_cluburi`.`denumire` AS `categorie` 
                FROM
                    `cluburi` JOIN 
                    `categorii_cluburi` ON `cluburi`.`categorie_id` = `categorii_cluburi`.`id`	
                WHERE
                    `id_liceu` = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $idLiceu); // "i" = integer
                $stmt->execute();
                $result = $stmt->get_result();
                return $result->fetch_all(MYSQLI_ASSOC);
}
