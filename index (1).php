<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pak SIM Databases 😈</title>
<style>
/* General styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.5s ease forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

h1 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
    animation: slideDown 0.5s ease forwards;
}

@keyframes slideDown {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

p {
    color: #777;
    font-size: 14px;
    line-height: 1.6;
}

/* Form styling */
form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    animation: slideUp 0.5s ease forwards;
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

label {
    font-weight: bold;
}

input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
}

button {
    padding: 10px 20px;
    background: linear-gradient(to right, #007bff, #0056b3);
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
    animation: zoomIn 0.5s ease forwards;
}

button:hover {
    background: linear-gradient(to right, #0056b3, #007bff);
}

/* Response styling */
.response-container {
    margin-top: 20px;
    padding: 10px;
    border-radius: 5px;
    animation: fadeIn 0.5s ease forwards;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.response-container pre {
    white-space: pre-wrap;
    word-wrap: break-word;
}

/* Popup styles */
.popup-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    display: none;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    z-index: 9999;
}

.popup-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

/* Animation for the popup */
@keyframes fadeInOut {
    0% { opacity: 0; }
    25% { opacity: 1; }
    75% { opacity: 1; }
    100% { opacity: 0; }
}
</style>
</head>
<body>
<div class="container">
    <h1>Pak SIM Database 💀</h1>
    <p>This is a big platform where you can gather details about any Pakistani number, such as name, validation, CNIC, and address.</p>
    
    <form id="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="number">Enter a Number:</label>
        <input type="text" id="number" name="number" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];

        // Validate the number if needed
        // For simplicity, assuming the number is valid

        // Check if the number is empty and show the popup
        if (empty($number)) {
            echo '<script>showPopup("Please fill out the field.");</script>';
        } else {
            // Run the API with the number
            $apiUrl = "https://number-details-api-pk-aafed0521786.herokuapp.com/api/v1/details/number?number=+92" . urlencode($number);
            $apiResponse = file_get_contents($apiUrl);

            if ($apiResponse) {
                // Parse JSON response
                $responseData = json_decode($apiResponse, true);

                if ($responseData && isset($responseData['status']) && $responseData['status'] == 201 && isset($responseData['message'])) {
                    // Display the formatted API response
                    echo '<div class="response-container success">';
                    echo "<pre>" . htmlspecialchars($responseData['message']) . "</pre>";
                    echo "</div>";
                } else {
                    echo '<div class="response-container error">Error in API response.</div>';
                }
            } else {
                echo '<div class="response-container error">Error retrieving API data.</div>';
            }
        }
    }
    ?>
</div>

<!-- Popup for form validation messages -->
<div id="popup" class="popup-container">
    <div class="popup-content">
        <span id="popup-text"></span>
    </div>
</div>

<script>
// Get the popup and its content
const popup = document.getElementById('popup');
const popupText = document.getElementById('popup-text');

// Function to show the popup with a message
function showPopup(message) {
    popupText.textContent = message;
    popup.style.display = 'flex';
    popup.classList.add('fadeInOut');
    setTimeout(() => {
        popup.style.display = 'none';
        popup.classList.remove('fadeInOut');
    }, 2000); // Adjust the time (in milliseconds) the popup stays visible
}
</script>

</body>
</html>

@made by cutehack