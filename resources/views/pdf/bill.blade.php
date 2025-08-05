<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer Invoice</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: local('DejaVu Sans'), url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/fonts/DejaVuSans.ttf') format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 13px;
            color: #333;
            margin: 0;
            padding: 30px;
            background-color: #ffffff;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1d3557;
        }

        .info-grid {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 5px solid #007BFF;
        }

        .info-box {
            width: 48%;
        }

        .info-box h4 {
            margin-bottom: 10px;
            color: #007BFF;
        }

        .info-box p {
            margin: 4px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #ffffff;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f6f6f6;
        }

        ul {
            padding-left: 18px;
            margin: 5px 0 0;
        }

        ul li {
            font-size: 11px;
            color: #555;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }

        .total span {
            background: #28a745;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            text-align: center;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .footer strong {
            color: #000;
        }
    </style>
</head>

<body>
    <h2>Customer Invoice</h2>

    <div class="info-grid">
        <div class="info-box">
            <h4>Store Details</h4>
            <p><strong>Rani Retail</strong></p>
            <p>Main Street, Mumbai</p>
            <p>Email: support@raniretail.com</p>
            <p>Phone: +91 98765 43210</p>
            <p>GSTIN: 27ABCDE1234F1Z5</p>
        </div>
        <div class="info-box">
            <h4>Customer Details</h4>
            <p><strong>Name:</strong> {{ $billDetails['customer_name'] }}</p>
            <p><strong>Email:</strong> {{ $billDetails['customer_email'] }}</p>
            <p><strong>Mobile:</strong> {{ $billDetails['customer_mobile'] }}</p>
            <p><strong>Date:</strong> {{ $billDetails['sold_date'] }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 40%;">Product Name & Details</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Selling Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($billDetails['products'] as $product)
            @php
            $productModel = \App\Models\Product::find($product['product_id']);
            $fieldValues = is_string($productModel->field_values ?? null)
            ? json_decode($productModel->field_values, true)
            : (is_array($productModel->field_values) ? $productModel->field_values : []);
            @endphp
            <tr>
                <td>
                    <strong>{{ $product['product_name'] }}</strong>
                    @if (!empty($fieldValues))
                    <ul>
                        @foreach($fieldValues as $key => $value)
                        <li><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>
                    @else
                    <div><small>No details available</small></div>
                    @endif
                </td>
                <td>{{ $product['customer_purchase_quantity'] }}</td>
                <td>₹{{ number_format($product['customer_product_rate'], 2) }}</td>
                <td>₹{{ number_format($product['customer_product_selling_price'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total Amount: <span>₹{{ number_format($billDetails['customer_overall_total_amount'], 2) }}</span>
    </div>

    <div class="footer">
        <p><strong>Thank you for shopping with Rani Retail.</strong></p>
        <p>All sales are subject to company terms and conditions.</p>
        <p>For queries, contact support@raniretail.com</p>
    </div>
</body>

</html>