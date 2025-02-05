<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .footer {
        background-color: #f48fb1;
        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        left: 0; /* Ensures the footer starts from the very left */
        width: 100%; /* Ensures it spans the full width */
        font-size: 14px;
        z-index: 1000; /* Ensures the footer stays above other elements */
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow for better visibility */
    }

    /* Optional: Add a margin to the bottom of the body to prevent overlap */
    body {
        margin-bottom: 50px; /* Adjust to match the height of the footer */
    }
</style>

</head>
<body>
    <div class="footer">
    &copy; <?php echo date("Y"); ?> MEDIC CLINIC OWN. All Rights Reserved.
</div>

</body>
</html>
    