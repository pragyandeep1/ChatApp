<!DOCTYPE html>
<html>
<head>
    <title>Best Deals</title>
</head>
<body>
{{-- dd($messageData) --}}
    <h1>Best Deals From {{ $messageData['category_name'] }}</h1>
    <p>Hello User,</p>
    
    <p>Here are the best deals from {{ $messageData['category_name'] }}:</p>
    
    <ul>
        @foreach ($messageData['company_names'] as $key => $company_name)
            <li>
                Company Name: {{ $company_name }}<br>
                Email: {{ $messageData['emails'][$key] }}<br>
                Mobile Number: {{ $messageData['mobile_numbers'][$key] }}<br>
                Google Rating: {{ $messageData['google_ratings'][$key] }}
            </li>
        @endforeach
    </ul>
    
    <!-- <p>Contact Mobile Number: 
    </p> -->
    {{-- $messageData['mobile'] --}}
</body>
</html>
