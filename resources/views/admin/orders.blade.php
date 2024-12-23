<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss");
</head>
<body>
@include("admin.navbar");


<div style="position: relative; top: 3px; right: -365px; overflow-x: auto;">
    
    <form action="{{url('/search')}}" method="get">
        @csrf
        <input type="text" name="search" style="color:blue;">
        <input type="submit" value="search" class="btn btn-success">
    </form>
    <table style="width: 80%; border-collapse: collapse; font-family: Arial, sans-serif; text-align: center;">
        <thead style="background-color: #333; color: #fff;">
            <tr>
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Phone</th>
                <th style="padding: 10px;">Address</th>
                <th style="padding: 10px;">Food Name</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                <td style="padding: 10px;">{{$data->name}}</td>
                <td style="padding: 10px;">{{$data->phone}}</td>
                <td style="padding: 10px;">{{$data->address}}</td>
                <td style="padding: 10px;">{{$data->foodname}}</td>
                <td style="padding: 10px;">${{number_format($data->price, 2)}}</td>
                <td style="padding: 10px;">{{$data->quantity}}</td>
                <td style="padding: 10px;">${{number_format($data->price * $data->quantity, 2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>


@include("admin.adminscript")
	
</body>
</html>
</body>
</html>