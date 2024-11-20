<?php

require_once 'dbConfig.php';

function getAllApplicant($pdo) {
    $sql = "SELECT * FROM applicant_information
            ORDER BY applicantID ASC";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "querySet" => $stmt -> fetchAll()
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to get applicant!"
        );
    }
    return $response;
}


function getApplicantByID($pdo, $applicantID){
    $sql = "SELECT * FROM applicant_information WHERE applicantID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$applicantID]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "querySet" => $stmt -> fetch()
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to get applicant " . $applicantID . "!"
        );
    }
    return $response;
}

function searchForApplicant($pdo, $searchQuery) {

    $sql = "SELECT * FROM applicant_information WHERE
            CONCAT(first_name, last_name, age, gender, email, contact_info, date_added)
            LIKE ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute(["%".$searchQuery."%"]);
    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "querySet" => $stmt -> fetchAll()
    );
        } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to search applicant!"
        );
    }
    return $response;
}

function editApplicant($pdo, $first_name, $last_name, $age, $gender, $email, $contact_info, $applicantID) {
    $response = array();

    $query = "UPDATE applicant_information
            SET first_name = ?,
                last_name =?,
                age = ?,
                gender = ?,
                email = ?,
                contact_info = ?
            WHERE applicantID = ?
        ";
    $stmt = $pdo->prepare($query);
    $executeQuery = $stmt->execute([$first_name, $last_name, $age, $gender, $email, $contact_info, $applicantID]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "message" => "Application " . $applicantID . " edited successfully!"
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to edit application " . $applicantID . "!"
        );
    }
    return $response;
}

function deleteApplicantByID($pdo, $applicantID) {
    $sql = "DELETE FROM applicant_information
            WHERE applicantID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$applicantID]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "message" => "Applicant " . $applicantID . " has been deleted!"
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to delete applicant info " . $applicantID . "!"
        );
    }
    return $response;
}

function addApplicant($pdo, $first_name, $last_name, $age, $gender, $email, $contact_info) {
    $response = array();
    $query = "INSERT INTO applicant_information (first_name, last_name, age, gender, email, contact_info) VALUES (?, ?, ?, ?, ?, ?)";
    
    $statement = $pdo -> prepare($query);
    $executeQuery = $statement -> execute([$first_name, $last_name, $age, $gender, $email, $contact_info]);

    if($executeQuery) {
        $response = array(
            "statusCode" => "200",
            "message" => "Application submitted successfully!"
        );
    } else {
        $response = array(
            "statusCode" => "400",
            "message" => "Failed to submit application!"
        );
    }
    return $response;
}
