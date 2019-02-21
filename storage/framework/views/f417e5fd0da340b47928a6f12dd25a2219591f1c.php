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
    <p>Chào <?php echo e($name); ?></p>
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
                <td><?php echo e($order->customer_name); ?></td>
            </tr>
            <tr>
                <td>Ngày đặt</td>
                <td><?php echo e($order->created_at); ?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><?php echo e($order->customer_phone); ?></td>
            </tr>
            <tr>
                <td>Địa chỉ giao hàng</td>
                <td><?php echo e($order->customer_address); ?></td>
            </tr>

            <tr>
                <td>Ghi chú</td>
                <td><?php echo e($order->note); ?></td>
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
                <?php $index = 1; ?>
                <?php $__currentLoopData = $order->product_variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index); ?></td>
                    <td><?php echo e($product->getName()); ?></td>
                    <td><?php echo e($product->pivot->amount); ?></td>
                    <td><?php echo e($product->getPrice()); ?></td>

                </tr>
                <?php $index++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th><b>Tổng giá</b></th>
                    <th><?php echo e($order->getTotal()); ?></th>
                </tr>

            </tbody>
        </table>
    <p>Cảm ơn sự ủng hộ của bạn!</p>
</body>
</html>
