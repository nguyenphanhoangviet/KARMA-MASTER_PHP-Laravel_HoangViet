<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
</head>
<body>
    <form action="{{ route('vn.payments') }}" method="POST">
        @csrf
        <!-- Các trường input cho đơn hàng -->
        <input type="text" name="order_id" placeholder="Order ID" required>
        <input type="text" name="order_desc" placeholder="Order Description" required>
        <input type="text" name="order_type" placeholder="Order Type" required>
        <input type="number" name="amount" placeholder="Amount" required>
        <input type="text" name="language" placeholder="Language" required>
        <input type="text" name="bank_code" placeholder="Bank Code">
        <input type="text" name="txtexpire" placeholder="Expire Date">
        <input type="text" name="txt_billing_mobile" placeholder="Billing Mobile">
        <input type="email" name="txt_billing_email" placeholder="Billing Email">
        <input type="text" name="txt_billing_fullname" placeholder="Billing Fullname">
        <input type="text" name="txt_inv_addr1" placeholder="Billing Address">
        <input type="text" name="txt_bill_city" placeholder="Billing City">
        <input type="text" name="txt_bill_country" placeholder="Billing Country">
        <input type="text" name="txt_bill_state" placeholder="Billing State">
        <input type="text" name="txt_inv_mobile" placeholder="Invoice Mobile">
        <input type="email" name="txt_inv_email" placeholder="Invoice Email">
        <input type="text" name="txt_inv_customer" placeholder="Invoice Customer">
        <input type="text" name="txt_inv_company" placeholder="Invoice Company">
        <input type="text" name="txt_inv_taxcode" placeholder="Invoice Taxcode">
        <input type="text" name="cbo_inv_type" placeholder="Invoice Type">
        <button type="submit" class="">Thanh toán</button>
    </form>
</body>
</html>
