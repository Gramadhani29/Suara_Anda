<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #007bff;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .details {
            margin-bottom: 20px;
        }

        .details h3 {
            margin-bottom: 10px;
            font-size: 18px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            color: #333;
        }

        .details p {
            margin: 5px 0;
            line-height: 1.6;
            font-size: 14px;
        }

        .details p span {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }

        .btn-print {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-print:hover {
            background-color: #0056b3;
        }

        @media print {
            .btn-print {
                display: none;
            }

            .container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Bukti Booking</h1>
        <p>Suara Anda</p>
    </div>

    <div class="details">
        <h3>Detail Booking</h3>
        <p><span>Psikolog:</span> {{$bookings->psikolog->psikolog}}</p>
        <p><span>Spesialis:</span> {{$bookings->psikolog->spesialis->spesialis}}</p>
        <p><span>Jadwal:</span>
            {{ $bookings->jadwal->hari }} 
            ({{ \Carbon\Carbon::createFromFormat('H:i:s', $bookings->jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $bookings->jadwal->jam_selesai)->format('H:i') }})
        </p>
        <p><span>Tanggal:</span> {{ $bookings->tanggal }}</p>
        <p><span>Atas Nama:</span> {{ $bookings->name }}</p>
        <p><span>Email:</span> {{ $bookings->email }}</p>
        <p><span>No. Telepon:</span> {{ $bookings->phone }}</p>
    </div>

    <div class="footer">
        <p>Terima kasih telah mempercayakan kami.</p>
        <p>Copyright &copy; 2024 Suara Anda</p>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="#" class="btn-print" onclick="window.print()">Cetak Bukti</a>
    </div>
</div>

</body>
</html>
