<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Customer Bill</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2>Customer Bill</h2>
    <p><strong>Name:</strong> {{ $billDetails['customer_name'] }}</p>
    <p><strong>Email:</strong> {{ $billDetails['customer_email'] }}</p>
    <p><strong>Mobile:</strong> {{ $billDetails['customer_mobile'] }}</p>
    <p><strong>Date:</strong> {{ $billDetails['sold_date'] }}</p>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
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
                    <ul style="margin: 0; padding-left: 16px;">
                        @foreach($fieldValues as $key => $value)
                        <li><small><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</small></li>
                        @endforeach
                    </ul>
                    @else
                    <div><small>No details</small></div>
                    @endif
                </td>
                <td>{{ $product['customer_purchase_quantity'] }}</td>
                <td>₹{{ number_format($product['customer_product_rate'], 2) }}</td>
                <td>₹{{ number_format($product['customer_product_selling_price'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <h4>Total Amount: ₹{{ number_format($billDetails['customer_overall_total_amount'], 2) }}</h4>
</body>

</html>