<?php

function getHighschoolsList($conn){
    $query = "  SELECT 
                    *,
                    (SELECT GROUP_CONCAT(`profiluri`.`denumire` SEPARATOR ', ') 
                     FROM `profiluri_licee` 
                     JOIN `profiluri` ON `profiluri_licee`.`id_profil` = `profiluri`.`id` 
                     WHERE `profiluri_licee`.`id_liceu` = `licee`.`id`) AS 'profil',
                    (SELECT GROUP_CONCAT(DISTINCT `categorii_cluburi`.`denumire` SEPARATOR ', ')
                     FROM `cluburi`
                     JOIN `categorii_cluburi` ON `cluburi`.`categorie_id` = `categorii_cluburi`.`id`
                     WHERE `cluburi`.`id_liceu` = `licee`.`id`) AS 'categorii_cluburi',
                    (SELECT `programe`.`denumire`
                     FROM `programe_licee`
                     JOIN `programe` ON `programe_licee`.`id_program` = `programe`.`id`
                     WHERE `programe_licee`.`id_liceu` = `licee`.`id`) AS 'program'
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

function getProgramsList($conn){
    $query = "SELECT * FROM `programe`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getClubCategories($conn){
    $query = "SELECT * FROM `categorii_cluburi`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProfilesList($conn, $format = false){
    $query = "  SELECT 
                    `profiluri`.*,
                    `categorii_profiluri`.`denumire` AS `categorie_profil`
                FROM 
                    `profiluri` JOIN 
                    `categorii_profiluri` ON `profiluri`.`id_categorie_profiluri` = `categorii_profiluri`.`id`  
                ORDER BY 
                    `id_categorie_profiluri`, `profiluri`.`denumire`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $queryData = $result->fetch_all(MYSQLI_ASSOC);
    if(!$format){
        return $queryData;
    }
    $formattedData = [];
    foreach($queryData as $row){
        $formattedData[$row["categorie_profil"]][] = $row;
    }
    return $formattedData;
}

function getHighschoolData($idLiceu, $conn){
    $stmt = $conn->prepare("SELECT * FROM `licee` WHERE id = ?");
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    $highschoolData = $result->fetch_assoc(); // single row as associative array
    $highschoolData["medie_admitere"] = getHighschoolAdmissionScores($idLiceu, $conn);
    $highschoolData["medie_admitere_curenta"] = $highschoolData["medie_admitere"][0]["medie"];
    $highschoolData["rata_promovabilitate"] = getHighschoolGraduationRate($idLiceu, $conn);
    $highschoolData["rata_promovabilitate_curenta"] = $highschoolData["rata_promovabilitate"][0]["procent_promovabilitate"];
    $highschoolData["profiluri"] = getHighschoolProfiles($idLiceu, $conn);
    $highschoolData["acreditari"] = getHighschoolAcreditations($idLiceu, $conn);
    $highschoolData["cluburi"] = getHighschoolClubs($idLiceu, $conn);
    $highschoolData["program"] = getHighschoolProgram($idLiceu, $conn);
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
                    `profiluri`.`denumire`,
                    `profiluri_licee`.`medie_admitere`,
                    `categorii_profiluri`.`denumire` AS `categorie_profil`
                FROM
                    `profiluri_licee` JOIN 
                    `profiluri` ON `profiluri_licee`.`id_profil` = `profiluri`.`id`	JOIN
                    `categorii_profiluri` ON `profiluri`.`id_categorie_profiluri` = `categorii_profiluri`.`id` 
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

function getHighschoolProgram($idLiceu, $conn){
    $query = "  SELECT
                    `programe`.`denumire`
                FROM
                    `programe_licee` JOIN 
                    `programe` ON `programe_licee`.`id_program` = `programe`.`id`	
                WHERE
                    `id_liceu` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idLiceu); // "i" = integer
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getHighschoolAcreditations($idLiceu, $conn){
    $query = "  SELECT
                    `acreditari_licee`.`prioritate`,
                    `acreditari`.`denumire`
                FROM
                    `acreditari_licee` JOIN 
                    `acreditari` ON `acreditari_licee`.`id_acreditare` = `acreditari`.`id`	
                WHERE
                    `id_liceu` = ?
                ORDER BY
                    `acreditari_licee`.`prioritate`";
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
