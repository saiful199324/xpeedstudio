<?php

// Load the required files
require_once '../app/controllers/FormController.php';
require_once '../app/models/FormModel.php';

// Create instances of the controller and model
$formModel = new FormModel();
$formController = new FormController($formModel);


// Determine the action based on the request
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Handle the request based on the action
switch ($action) {
    case 'report':
        $formController->displayReport();
        break;
    default:
        $formController->handleFormSubmission();


}