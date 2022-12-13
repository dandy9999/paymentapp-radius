<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Beli Membership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-3">Beli Membership</h1>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Hotspot Dandot IT Solution</h5>
                        <p class="card-text">Membership mulai dari 1-30 Hari. Kalian bisa memilih membership 1 hari, 3 hari, 7 hari atau 30 hari.</p>
                    </div>
                    <div class="card-header fw-bold text-center">
                        Manfaat :
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Untuk 1 device</li>
                        <li class="list-group-item">Unlimited Quota</li>
                        <li class="list-group-item">Speed Up to 40Mbps</li>
                    </ul>
                    <div class="card-header fw-bold text-center">
                        Harga :
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Rp. 2.500 / 1 hari</li>
                        <li class="list-group-item">Rp. 5.000 / 3 hari</li>
                        <li class="list-group-item">Rp. 10.000 / 7 hari</li>
                        <li class="list-group-item">Rp. 25.000 / 30 hari</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Beli Membershipmu</h5>
                        <p class="card-text">Berikut detail pesananmu.</p>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td> : {{$order->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> : {{$order->email}}</td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td> : {{$order->phone}}</td>
                            </tr>
                            <tr>
                                <td>Membership</td>
                                <td> : {{$order->qty}} Hari</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td> : {{$order->total_price}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body mt-2 text-center">
                        <button class="btn btn-success btn-md" id="pay-button">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            //alert("payment success!"); 
            window.location.href = '/invoice/{{$order->id}}';
            console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
