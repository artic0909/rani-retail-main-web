<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Invoice #{{ $sale->id }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 20px;
        }

        .invoice-header h1 {
            color: #3b82f6;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .invoice-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .info-section {
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #3b82f6;
        }

        .info-section h3 {
            color: #1e293b;
            font-size: 1.1rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .info-section p {
            color: #64748b;
            margin: 8px 0;
            font-size: 0.95rem;
        }

        .info-section strong {
            color: #334155;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
        }

        thead {
            background: #3b82f6;
            color: white;
        }

        thead th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.95rem;
        }

        tbody td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }

        .product-details {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 5px;
        }

        .total-section {
            text-align: right;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e2e8f0;
        }

        .total-amount {
            font-size: 1.5rem;
            color: #3b82f6;
            font-weight: 700;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e2e8f0;
            color: #64748b;
        }

        .footer p {
            margin: 5px 0;
        }

        .print-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #3b82f6;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .print-btn:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .invoice-container {
                box-shadow: none;
                padding: 20px;
            }

            .print-btn {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .invoice-info {
                grid-template-columns: 1fr;
            }

            .invoice-container {
                padding: 20px;
            }

            .print-btn {
                bottom: 20px;
                right: 20px;
                padding: 12px 24px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <h1>Rani Retail</h1>
            <p style="color: #64748b; font-size: 1rem;">Invoice #{{ $sale->id }}</p>
            <p style="color: #64748b; font-size: 0.9rem;">Date:
                {{ \Carbon\Carbon::parse($sale->sold_date)->format('Y-m-d') }}</p>
        </div>

        <!-- Company & Customer Info -->
        <div class="invoice-info">
            <div class="info-section">
                <h3>Store Contact</h3>
                <p><strong>Phone:</strong> +91 6292237204</p>
                <p><strong>Address:</strong> Raniahti, Amta-road, Near Indian Oil Pump, Howrah</p>
            </div>

            <div class="info-section">
                <h3>Customer Info</h3>
                <p><strong>Name:</strong> {{ $sale->customer_name }}</p>
                <p><strong>Email:</strong> {{ $sale->custome_email }}</p>
                <p><strong>Mobile:</strong> {{ $sale->custome_mobile }}</p>
            </div>
        </div>

        <!-- Product Details Table -->
        <h3 style="color: #1e293b; margin-bottom: 15px;">Product Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $products = is_string($sale->products) ? json_decode($sale->products, true) : $sale->products;
                @endphp

                @foreach($products as $item)
                    @php
                        $product = \App\Models\Product::find($item['product_id'] ?? null);
                        $fields = $product ? (is_string($product->field_values) ? json_decode($product->field_values, true) : $product->field_values) : [];
                    @endphp
                    <tr>
                        <td>
                            <strong>{{ $product->product_name ?? 'N/A' }}</strong>
                        </td>
                        <td>
                            @if(!empty($fields) && is_array($fields))
                                @foreach($fields as $key => $value)
                                    <span class="product-details">{{ ucfirst($key) }}: {{ $value }}</span><br>
                                @endforeach
                            @else
                                <span class="product-details">-</span>
                            @endif
                        </td>
                        <td style="text-align: center;">{{ $item['customer_purchase_quantity'] ?? 0 }}</td>
                        <td style="text-align: right;">
                            <strong>₹{{ number_format($item['customer_product_selling_price'] ?? 0, 2) }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Amount -->
        <div class="total-section">
            <p style="color: #64748b; margin-bottom: 10px;">Total Amount:</p>
            <p class="total-amount">₹{{ number_format($sale->customer_overall_total_amount, 2) }}</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Thank you for shopping with Rani Retail.</strong></p>
            <p>Need help? Call us at <strong>+91 6292237204</strong> or email <strong>raniretail.shop@gmail.com</strong>
            </p>
        </div>
    </div>

    <!-- Print Button -->
    <button class="print-btn" onclick="window.print()">
        <i class="fa fa-print"></i> Print Now
    </button>

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</body>

</html>