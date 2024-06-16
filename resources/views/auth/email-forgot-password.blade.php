<!DOCTYPE html>
<html>

<head>
    <title>Lupa Kata Sandi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .email-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .email-body {
            padding: 20px;
        }

        .email-footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
        }

        .email-body a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .email-footer a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Reset Kata Sandi Anda</h1>
        </div>
        <div class="email-body">
            <p>Halo,</p>
            <p>Kami menerima permintaan untuk mereset kata sandi Anda. Anda dapat mereset kata sandi Anda dengan
                mengklik tombol di bawah ini:</p>
            <a href="{{ route('reset-password', ['token' => $token]) }}">Reset Kata Sandi</a>
            <p>Jika Anda tidak meminta reset kata sandi, harap abaikan email ini atau hubungi dukungan jika Anda
                memiliki pertanyaan.</p>
            <p>Terima kasih,</p>
            <p>Tim Duit Tracker</p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 Duit Tracker. Semua Hak Dilindungi.</p>
            <p><a href="#">Kebijakan Privasi</a> | <a href="#">Syarat dan Ketentuan</a></p>
        </div>
    </div>
</body>

</html>
