<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png"
        href="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2157447622/settings_images/f8dcb26-5efa-561-0e3e-ee4dc5e84f_medicine-2801025_1280.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/css/apoteker/checkout.css">

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->


    <title>Obatin Aja</title>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pembayaran</h5>
            <table>
                <tr>
                    <td>Nama</td>
                    <td> : {{ $order->name }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td> : {{ $order->no_hp }}</td>
                </tr>
                <tr>
                    <td>Obat</td>
                    <td> : {{ $order->nama_obat }}</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td> : {{ $order->qty }}</td>
                </tr>
                <tr>
                    <td>Total Pembayaran</td>
                    <td> : {{ $order->total_harga }}</td>
                </tr>
            </table>
            <button class="btn btn-primary mt-4" id="pay-button">Bayar</button>
        </div>
    </div>


    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/user/pembayaran'
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>

</body>

</html>
