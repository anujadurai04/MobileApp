<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Include config file
require_once "../../../config/config.php";

try {
    // Get the uploaded file details
    $profilePicture = $_FILES['profilePicture'];
    $fileName = $profilePicture['name'];
    $tmpFilePath = $profilePicture['tmp_name'];

    // Check if a file was uploaded successfully
    if ($fileName && $tmpFilePath) {
        // Check the file size
        $maxFileSize = 2 * 1024 * 1024; // 5MB (adjust as needed)
        $fileSize = $profilePicture['size'];

        if ($fileSize > $maxFileSize) {
            $returnData = array(
                'success' => 0,
                'status' => 422,
                'message' => "The file size exceeds the allowed limit of 2MB.",
            );
        } else {
            // Directory where you want to store the uploaded profile pictures
            $uploadDirectory = '../../../../assets/images/avatar/';

            // Generate a unique file name to prevent conflicts
            $uniqueFileName = uniqid() . '_' . $fileName;

            // Move the uploaded file to the desired directory
            $uploadPath = $uploadDirectory . $uniqueFileName;
            if (move_uploaded_file($tmpFilePath, $uploadPath)) {
                // Update the profile picture in the database
                $userId = $_POST['mobileNumber']; // Replace with the actual user ID
                $sql = "UPDATE `gdm_app_users` SET `profile_pic` = '$uniqueFileName' WHERE `user_phone` = $userId";

                // Execute the SQL query
                if (mysqli_query($link, $sql)) {
                    $returnData = array(
                        'success' => 1,
                        'status' => 201,
                        'message' => "Profile picture updated successfully",
                    );
                } else {
                    $returnData = array(
                        'success' => 0,
                        'status' => 422,
                        'message' => "Error updating profile picture:",
                    );
                }
            } else {
                $returnData = array(
                    'success' => 0,
                    'status' => 422,
                    'message' => "Error updating profile picture:",
                );
            }
        }
    } else {
        $returnData = array(
            'success' => 0,
            'status' => 422,
            'message' => "No file uploaded",
        );
    }
} catch (Exception $e) {
    $returnData = array(
        'success' => 0,
        'status' => 422,
        'message' => "Something Went wrong!",
    );
}

echo json_encode($returnData);

// close database connection
mysqli_close($link);
