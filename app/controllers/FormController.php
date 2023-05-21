<?php

class FormController
{
    private $model;


    public function __construct($model)
    {
        $this->model = $model;
    }




    public function handleFormSubmission()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $buyer = $_POST['buyer'];
            $receipt_id = $_POST['receipt_id'];
            $items = $_POST['items'];
            $buyer_email = $_POST['buyer_email'];
            $note = $_POST['note'];
            $city = $_POST['city'];
            // $phone = $_POST['phone'];
            $phone = $_POST['formattedPhone'];
            $entry_by = $_POST['entry_by'];

            $errors = [];

              // Validate required fields
            if (empty($amount) || !is_numeric($amount)) {
                $errors['amount'] = "Please enter a valid amount (numbers only).";
            }

            if (empty($buyer)) {
                $errors['buyer'] = "Please enter the buyer's name.";
            }

            if (empty($receipt_id)) {
                $errors['receipt_id'] = "Please enter the receipt ID.";
            }

            if (empty($items)) {
                $errors['items'] = "Please enter at least one item.";
            }

            if (empty($buyer_email) || !filter_var($buyer_email, FILTER_VALIDATE_EMAIL)) {
                $errors['buyer_email'] = "Please enter a valid buyer email.";
            }

            if (empty($note)) {
                $errors['note'] = "Please enter the note.";
            }

            if (empty($city)) {
                $errors['city'] = "Please enter the city.";
            }

            if (empty($phone)) {
                $errors['phone'] = "Please enter the phone number.";
            }

            if (empty($entry_by)) {
                $errors['entry_by'] = "Please enter the entry by.";
            }

            if (!empty($errors)) {
                // Validation errors occurred
                http_response_code(422); // Set the response status code to 422 Unprocessable Entity
                echo json_encode($errors);
                return;
            }



            // Buyer IP address
            $buyer_ip = $_SERVER['REMOTE_ADDR'];

            // Hash key generation
            $salt =bin2hex(random_bytes(16)); // Replace with your own salt value
            $hash_key = hash('sha512', $receipt_id . $salt);

            // $currentTime = new DateTime('now', new DateTimeZone('Asia/Dhaka'));

            // Entry date
            // $entry_at = new DateTime('now');
            $entry_at = date('Y-m-d');

            // Instantiate the model and call the submitForm method
            $success = $this->model->submitForm($amount, $buyer, $receipt_id, $items, $buyer_email, $note, $city, $phone, $entry_by,$buyer_ip,$hash_key,$entry_at);

            if ($success) {
                // Form submitted successfully
                echo "Form submitted successfully!";
            } else {
                // Error occurred while submitting the form
                echo "Error occurred while submitting the form. Please try again.";
            }
        } else {
            // Display the form view
            require_once '../app/views/form.php';
        }
    }

     public function displayReport()
    {
        

        // Display the report view
        require_once '../app/views/report.php';
    }

  

}