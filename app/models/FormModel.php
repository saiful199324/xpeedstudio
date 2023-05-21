<?php

class FormModel
{
    private $conn;

    public function __construct()
    {
        // Database connection configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "xpeedstudio";

        // Create a new PDO instance
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function submitForm($amount, $buyer, $receipt_id, $items, $buyer_email, $note, $city, $phone, $entry_by,$buyer_ip,$hash_key,$entry_at)
    {
        // Perform necessary validations and sanitization if needed

        // Prepare the SQL statement
        $stmt = $this->conn->prepare("INSERT INTO submissions (amount, buyer, receipt_id, items, buyer_email, note, city, phone, entry_by, buyer_ip, hash_key, entry_at)  VALUES (:amount, :buyer, :receipt_id, :items, :buyer_email,:note, :city, :phone, :entry_by,:buyer_ip,:hash_key,:entry_at)");

        // Bind the parameters
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':buyer', $buyer);
        $stmt->bindParam(':receipt_id', $receipt_id);
        $stmt->bindParam(':items', $items);
        $stmt->bindParam(':buyer_email', $buyer_email);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':entry_by', $entry_by);
        $stmt->bindParam(':buyer_ip', $buyer_ip);
        $stmt->bindParam(':hash_key', $hash_key);
        $stmt->bindParam(':entry_at', $entry_at);


        // Execute the statement
        $stmt->execute();

        // Close the database connection
        $this->conn = null;

        // Return true on success or false on failure
        return $stmt->rowCount() > 0;
    }

    public function getReportData(){
        
    }
}