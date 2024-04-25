<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/qr.css">

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">

    <title>MediCare - Código QR</title>

<body>
    <h1>MediCare</h1>

    <div class="container">
        <img src="css/media/camera.png" id="camera" alt="">
        <p>Aponte a câmera do dispositivo para o QR code localizado na porta</p>

        <video id="qr-video" width="100%" height="auto" autoplay></video>
        <canvas id="qr-canvas" style="display: none;"></canvas>
    </div>

    <a href="login.html"><img src="css/media/setabranca.png" class="seta"></a>

    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.0.0/dist/jsQR.min.js"></script>
    <script src="js/qrcode.js"></script>
</body>

</html>