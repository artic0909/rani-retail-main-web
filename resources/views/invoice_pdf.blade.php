<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $sale->id }}</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: local('DejaVu Sans'), url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/fonts/DejaVuSans.ttf') format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #2c3e50;
        }

        .header-column {
            width: 48%;
        }

        .header-column h2 {
            margin: 0 0 10px;
            color: #2c3e50;
        }

        .header-column p {
            margin: 4px 0;
        }

        h4 {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #2c3e50;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #2c3e50;
            color: #fff;
            font-weight: bold;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        td:first-child {
            text-transform: capitalize;
        }

        .total {
            margin-top: 15px;
            text-align: right;
            font-size: 14px;
            font-weight: bold;
            color: #000;
            border-top: 2px solid #2c3e50;
            padding-top: 10px;
        }

        .footer {
            margin-top: 40px;
            font-size: 11px;
            color: #666;
            text-align: center;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <!-- Store Info -->
        <div class="header-column">
            <h2>Rani Retail</h2>
            <p><strong>Invoice #:</strong> {{ $sale->id }}</p>
            <p><strong>Date:</strong> {{ $sale->sold_date }}</p>
            <p><strong>Store Contact:</strong> +91 98765 43210</p>
            <p><strong>Address:</strong> 123 Main Bazaar, Surat, Gujarat, India</p>
        </div>

        <!-- Customer Info -->
        <div class="header-column">
            <h2>Customer Info</h2>
            <p><strong>Name:</strong> {{ $sale->customer_name }}</p>
            <p><strong>Email:</strong> {{ $sale->custome_email }}</p>
            <p><strong>Mobile:</strong> {{ $sale->custome_mobile }}</p>
        </div>
    </div>

    <h4>Product Details</h4>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Details</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productDetails as $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>
                    @foreach($product['field_values'] as $label => $value)
                        <strong>{{ ucfirst($label) }}:</strong> {{ $value }}<br>
                    @endforeach
                </td>
                <td>{{ $product['quantity'] }}</td>
                <td>₹{{ number_format($product['selling_price'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total Amount: ₹{{ number_format($sale->customer_overall_total_amount, 2) }}
    </div>

    <div class="footer">
        Thank you for shopping with Rani Retail.<br>
        Need help? Call us at +91 6292237205 or email raniretail.shop@gmail.com
    </div>

</body>
</html>
