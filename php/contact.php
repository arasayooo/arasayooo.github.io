<?php

$pdo = new PDO('mysql:host=localhost;port=3308;dbname=powerec', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];
$firstname = '';
$lastname = '';
$email = '';
$phone = '';
$message = '';
$powerec = "farraedna56@gmail.com";
$subject = "Message from customer";
$subject2 = "Your message has been sent successfully.";
$customer = "Customer name: " .$firstname. " " .$lastname. "\nEmail: " .$email. "\nPhone number: " .$phone. "\n\nMessage: " .$message;
$employer = "Dear " .$firstname. " " .$lastname. "\nThank you for contacting us. We will get back to you shortly!\n\nRegards,\nPOWEREC Technology Service Sdn Bhd";
$headers = "From: " .$email;
$headers2 = "From: " .$powerec;

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (!$firstname) {
        $errors[] = "First name is required";
    }

    if (!$lastname) {
        $errors[] = "Last name is required";  
    }  
        
    if (!$email) {
        $errors[] = "Email is required";
    }

    if (!$phone) {
        $errors[] = "Phone number is required";
    }

    if (!$message) {
        $errors[] = "Message is required";
    }

    
    // $result1 = mail($powerec, $subject, $customer, $headers);
    // $result2 = mail($email, $subject2, $employer, $headers2);
    // if($result1 && $result2)
    // {
    //     echo "Your message has been sent successfully!";
    // }
    // else
    // {
    //     echo "Sorry! We couldn't send your message. Please try again later.";
    // }

    if (empty($errors)) 
    {
        $statement = $pdo->prepare("INSERT INTO contactus (firstname, lastname, email, phone, message)
        VALUES(:FirstName, :LastName, :Email, :Phone, :Message)");

        $statement->bindValue(':FirstName', $firstname);
        $statement->bindValue(':LastName', $lastname);
        $statement->bindValue(':Email', $email);
        $statement->bindValue(':Phone', $phone);
        $statement->bindValue(':Message', $message);
        $statement->execute();
        
        header('Location: ../html/index.html');
        //redirect user to index php
    }
}


// Dataroots change the form placeholder on mouse click 
// add_action( 'wp_enqueue_scripts', 'dr_placeholder_form' );
// function dr_placeholder_form() {

// 	wp_enqueue_script( 'placeholder-form',  get_stylesheet_directory_uri() . '/js/placeholder-form.js', array( 'jquery' ), '1.0.0', true );

// }
// End Dataroots change the form placeholder on mouse click 

?>
