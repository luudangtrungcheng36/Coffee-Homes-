<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 600px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-details th, .order-details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .order-details th {
            background-color: #f1f1f1;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmation</h1>
            <p>Thank you for your order!</p>
        </div>
        <div class="order-details">
            <h2>Order Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0 ?>
                    @foreach ($order->details as $detail)
                        <tr>
                            <td>{{$loop->index + 1 }}</td>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ number_format($detail['price'], 0, '.', '.') . ' đ' }} VND</td>
                            <td>{{ $detail['quantity'] }}</td>
                            <td>{{ number_format($detail['price'] * $detail['quantity'], 0, '.', '.') . ' đ' }} VND</td>
                        </tr>
                        <?php $total += $detail['price'] * $detail['quantity'];?>
                    @endforeach
                    <tr>
                        <td colspan="4" class="total">Grand Total</td>
                        <td>{{ number_format($total, 0, '.', '.') . ' đ' }} VND</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p>If you have any questions about your order, please contact us.</p>
        <a href="{{route('checkout.verify', $order->token)}}">Xác minh tại đây</a>
    </div>
</body>
</html>
