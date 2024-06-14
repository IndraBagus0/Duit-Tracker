<!DOCTYPE html>
<html>
<head>
    <title>Pengiriman Formulir Kontak</title>
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
        .email-body strong {
            color: #007bff;
        }
        .email-body .contact-info {
            margin: 20px 0;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 8px;
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
            <h2>Pesan dari Duit Tracker</h2>
        </div>
        <div class="email-body">
            <p>Anda telah menerima pesan baru melalui formulir kontak Duit Tracker. Berikut adalah detailnya:</p>
            <div class="contact-info">
                <p><strong>Nama:</strong> {{ $details['nama'] }}</p>
                <p><strong>Email:</strong> {{ $details['email'] }}</p>
                <p><strong>No Hp:</strong> {{ $details['no_hp'] }}</p>
                <p><strong>Pesan:</strong> {{ $details['pesan'] }}</p>
            </div>
            <p>Terima kasih telah menggunakan layanan kami. Kami akan menanggapi pertanyaan Anda sesegera mungkin.</p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 Duit Tracker. Semua Hak Dilindungi.</p>
            <p><a href="#">Kebijakan Privasi</a> | <a href="#">Syarat dan Ketentuan</a></p>
        </div>
    </div>
</body>
</html>
