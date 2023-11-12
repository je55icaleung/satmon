<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        function updateFileName() {
            var fileInput = document.getElementById('file');
            var fileNameDisplay = document.getElementById('file-name-display');

            if (fileInput.files.length > 0) {
                fileNameDisplay.innerHTML = fileInput.files[0].name;
            } else {
                fileNameDisplay.innerHTML = 'No file chosen';
            }
        }
    </script>
</head>

<header class="header">
    <div class="header-logo">
        <a href="index.php">
            <h1>OW</h1>
        </a>
    </div>
</header> 

<body>
    <div class="page">
        <div class="animation-container">
            <div class="animation">
                <lottie-player src="../assets/satellite.json" style="height: 20vh;" loop autoplay></lottie-player>
            </div>
        </div>
        <div class="content-container">
            <div class="content">
                <h1>ENTER YOUR SATELLITE ID HERE</h1>
            </div>
            <div class="content">
            <?php include '../upload.php'; ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <button type="button" name="choose" onclick="document.getElementById('file').click()">Choose File</button>
                <input type="file" name="file" id="file" accept=".csv" required onchange="updateFileName()" style="display: none;">
                <br>
                <br>
                <button type="submit" name="submit">Upload</button>
            </form>
        </div>
        <?php
                if (!empty($uploadMessage)) {
                    echo $uploadMessage;
                }
        ?>
    </div>
</body>
</html>
