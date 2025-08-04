<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Purchase Summary</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            color: #333;
        }

        .container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #4CAF50;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #4CAF50;
            color: white;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Thank you, {{ $billDetails['customer_name'] }}!</h2>
        <p>Your purchase on <strong>{{ $billDetails['sold_date'] }}</strong> has been recorded successfully.</p>

        <h3>Order Summary</h3>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Details</th>
                    <th>Qty</th>
                    <th>Amount</th>
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
                    <td>{{ $productModel->product_name ?? 'N/A' }}</td>

                    <td>
                        @if (!empty($fieldValues))
                        <ul style="padding-left: 16px; margin: 0;">
                            @foreach($fieldValues as $key => $value)
                            <li><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
                            @endforeach
                        </ul>
                        @else
                        N/A
                        @endif
                    </td>

                    <td>{{ $product['customer_purchase_quantity'] }}</td>
                    <td>₹{{ number_format($product['customer_product_selling_price'], 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top: 15px; font-weight: bold"><strong>Total:</strong> ₹{{ number_format($billDetails['customer_overall_total_amount'], 2) }}</p>

        <div class="footer">
            If you have questions, reply to this email or contact support.
            <br><br>
            — Team Rani Retail
        </div>
    </div>
</body>

</html>