<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f3f3f3; color: #555;">
    <div style="background-color: #fff; padding: 20px; text-align: center; border-bottom: 2px solid #ddd;">
        <h1>Invoice</h1>
    </div>
    
    @foreach ($orders as $order)
        
    <div style="margin-top: 40px; background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 4px;">
        <div style="width: 100%;">
            <table style="width: 100%;">
                <tr>
                    <th style="background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #ddd; font-weight: normal; text-align: left;">Order ID</th>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $order->code }}</td>
                </tr>
                <tr>
                    <th style="background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #ddd; font-weight: normal; text-align: left;">Order Date</th>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $order->date }}</td>
                </tr>
                <tr>
                    <th style="background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #ddd; font-weight: normal; text-align: left;">Name</th>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th style="background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #ddd; font-weight: normal; text-align: left;">Email</th>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $order->user->email }}</td>
                </tr>
                <tr>
                    <th style="background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #ddd; font-weight: normal; text-align: left;">Phone</th>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $order->user->phone }}</td>
                </tr>
                <tr>
                    <th style="background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #ddd; font-weight: normal; text-align: left;">Phone Two</th>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $order->user->addition_phone }}</td>
                </tr>
                <tr>
                    <th style="background-color: #f5f5f5; padding: 10px; border-bottom: 1px solid #ddd; font-weight: normal; text-align: left;">Civil ID</th>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $order->user->civil_id }}</td>
                </tr>
            </table>
        </div>
        
        <div style="margin-top: 20px; text-align: right; font-size: 18px;">
            <p style="margin: 0; color: #333;">Total: ${{ $order->image->price }}</p>
        </div>
    </div>
    
    @endforeach
    
    <div style="margin-top: 40px; text-align: center; font-size: 12px;">
        <p style="margin: 0; color: #777;">Thank you for your business!</p>
    </div>
</body>
</html>