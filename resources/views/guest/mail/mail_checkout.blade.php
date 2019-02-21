<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
</head>
<body>
    <p>Chào {{ $name }}</p>
    <p>Bạn vừa đặt hàng thành công tại tại website. Chúng tôi sẽ liên lạc với bạn sớm nhất! </p>
    <h1>THÔNG TIN ĐƠN HÀNG</h1>
    <table>
        <thead>
            <tr>
                <th><b>Thông tin khách hàng</b></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tên khách hàng</td>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <td>Ngày đặt</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>{{ $order->customer_phone }}</td>
            </tr>
            <tr>
                <td>Địa chỉ giao hàng</td>
                <td>{{ $order->customer_address }}</td>
            </tr>

            <tr>
                <td>Ghi chú</td>
                <td>{{ $order->note }}</td>
            </tr>
        </tbody>
    </table>
    <br><hr><br>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1; @endphp
                @foreach($order->product_variants as $product)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>{{ $product->pivot->amount }}</td>
                    <td>{{ $product->getPrice() }}</td>

                </tr>
                @php $index++ @endphp
                @endforeach
                <tr>
                    <th><b>Tổng giá</b></th>
                    <th>{{ $order->getTotal() }}</th>
                </tr>

            </tbody>
        </table>
    <p>Cảm ơn sự ủng hộ của bạn!</p>
</body>
</html>
