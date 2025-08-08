<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Purchase Summary | Rani Retail</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f2f9 100%);
            padding: 30px 20px;
            color: #333;
            line-height: 1.6;
        }

        .email-container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: "";
            position: absolute;
            top: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .header::after {
            content: "";
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            letter-spacing: 0.5px;
        }

        .logo i {
            margin-right: 10px;
            color: #ffd166;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .header p {
            font-size: 18px;
            opacity: 0.95;
            max-width: 500px;
            margin: 0 auto;
        }

        .body-content {
            padding: 40px;
        }

        .thank-you {
            margin-bottom: 30px;
            text-align: center;
        }

        .thank-you h2 {
            color: #4e54c8;
            font-size: 28px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .thank-you p {
            font-size: 18px;
            color: #555;
        }

        .order-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 30px 0;
            background: #f8f9ff;
            padding: 25px;
            border-radius: 15px;
            border-left: 4px solid #4e54c8;
        }

        .info-card {
            flex: 1;
            min-width: 200px;
        }

        .info-card h3 {
            font-size: 18px;
            color: #666;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .info-card p {
            font-size: 19px;
            font-weight: 600;
            color: #333;
        }

        .order-summary {
            margin: 40px 0 30px;
        }

        .order-summary h3 {
            font-size: 22px;
            color: #4e54c8;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f2f9;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .products-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.04);
        }

        .products-table thead {
            background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
            color: white;
        }

        .products-table th {
            padding: 18px 20px;
            text-align: left;
            font-weight: 600;
            font-size: 16px;
        }

        .products-table tbody tr {
            transition: all 0.2s ease;
        }

        .products-table tbody tr:nth-child(even) {
            background-color: #f9faff;
        }

        .products-table tbody tr:hover {
            background-color: #f0f2ff;
        }

        .products-table td {
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: top;
        }

        .product-details ul {
            padding-left: 20px;
            margin: 0;
        }

        .product-details li {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .total-amount {
            margin-top: 30px;
            text-align: right;
            padding: 25px;
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
            border-radius: 12px;
            font-size: 22px;
            font-weight: 700;
            color: #4e54c8;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            font-size: 18px;
            color: #555;
        }

        .support {
            margin-top: 40px;
            padding: 25px;
            background: #f8f9ff;
            border-radius: 15px;
            text-align: center;
        }

        .support h3 {
            font-size: 20px;
            color: #4e54c8;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .contact-methods {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            margin-top: 20px;
        }

        .contact-method {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: white;
            border-radius: 50px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: #4e54c8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .footer {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 35px 30px;
            text-align: center;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 25px 0;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: #4e54c8;
            transform: translateY(-3px);
        }

        .copyright {
            margin-top: 25px;
            color: #bdc3c7;
            font-size: 14px;
            line-height: 1.6;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-left: 10px;
        }

        .badge-success {
            background: #e6f7ee;
            color: #0a9c4a;
        }

        @media (max-width: 650px) {
            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 28px;
            }

            .body-content {
                padding: 30px 20px;
            }

            .products-table {
                display: block;
                overflow-x: auto;
            }

            .info-card {
                min-width: 100%;
            }

            .contact-methods {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>

    <!-- Font Awesome 5 (solid icons like fas fa-store) -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-store"></i>Rani Retail
                </div>
                <h1>Thank You For Your Purchase!</h1>
                <p>
                    Your order has been processed successfully. Here's your
                    purchase summary.
                </p>
            </div>
        </div>

        <!-- Body Content -->
        <div class="body-content">
            <div class="thank-you">
                <h2>
                    <i class="fas fa-check-circle"></i> Thank You, {{
                        $billDetails['customer_name'] }}!
                </h2>
                <p>
                    Your purchase on
                    <strong>{{ $billDetails['sold_date'] }}</strong> has
                    been recorded successfully.
                </p>
            </div>

            <div class="order-info">

                <div class="info-card">
                    <h3>Order Status</h3>
                    <p>
                        Completed
                        <span class="badge badge-success">Confirmed</span>
                    </p>
                </div>
            </div>

            <div class="order-summary">
                <h3><i class="fas fa-receipt"></i> Order Summary</h3>

                <table class="products-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Details</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP loop for products -->
                        @foreach($billDetails['products'] as $product) @php
                        $productModel =
                        \App\Models\Product::find($product['product_id']);
                        $fieldValues = is_string($productModel->field_values
                        ?? null) ? json_decode($productModel->field_values,
                        true) : (is_array($productModel->field_values) ?
                        $productModel->field_values : []); @endphp
                        <tr>
                            <td style="text-transform: capitalize;">
                                <strong>{{ $productModel->product_name ?? 'N/A'}}</strong>
                            </td>
                            <td class="product-details">
                                @if (!empty($fieldValues))
                                <ul>
                                    @foreach($fieldValues as $key => $value)
                                    <li>
                                        <strong>{{ ucwords(str_replace('_', '
                                                ', $key)) }}:</strong>
                                        {{ $value }}
                                    </li>
                                    @endforeach
                                </ul>
                                @else N/A @endif
                            </td>
                            <td>
                                {{ $product['customer_purchase_quantity'] }}
                            </td>
                            <td>
                                ₹{{
                                    number_format($product['customer_product_selling_price'],
                                    2) }}
                            </td>
                        </tr>
                        @endforeach
                        <!-- End PHP loop -->
                    </tbody>
                </table>

                <div class="total-amount">
                    <div class="total-label">Total Amount:</div>
                    <div>
                        ₹{{
                            number_format($billDetails['customer_overall_total_amount'],
                            2) }}
                    </div>
                </div>
            </div>

            <div class="support">
                <h3>
                    <i class="fas fa-headset"></i> Need Help With Your
                    Order?
                </h3>
                <p>
                    Our support team is ready to assist you with any
                    questions about your purchase.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="copyright">
                &copy; {{ date('Y') }} Rani Retail. All rights reserved.<br />
                This is an automated message. Please do not reply directly
                to this email.
            </div>
        </div>
    </div>
</body>

</html>