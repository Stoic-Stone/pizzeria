<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss");
    <style>
        .form-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            color:black;
        }
        .form-container h4 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .form-container input[type="text"]:focus,
        .form-container input[type="number"]:focus,
        .form-container input[type="file"]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-container .form-row {
            margin-bottom: 20px;
        }
        table{
            color:white;
        }
       
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
        background-color: #2c3e50;
        border-radius: 10px;
        overflow: hidden;
    }

    
    th {
        padding: 15px;
        text-align: center;
        background-color: #34495e;
        color: white;
        font-size: 18px;
    }

  
    td {
        padding: 15px;
        text-align: center;
        color: white;
        font-size: 16px;
    }

    
    tr:hover {
        background-color: #3e5667;
    }

 
    td img {
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

  
    td img:hover {
        transform: scale(1.1);
    }

    
    td a {
        padding: 8px 15px;
        background-color: #e74c3c;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    
    td a:hover {
        background-color: #c0392b;
    }

    
    tr:nth-child(even) {
        background-color: #3a4a59;
    }

    tr:nth-child(odd) {
        background-color: #34495e;
        
        @media (max-width: 768px) {
            .form-container {
                width: 80%;
            }
        }
    </style>
</head>
<body>
@include("admin.navbar");

<div class="main-content">
   <div class="form-container" style="margin-top: 60px;">
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <h4>Title:</h4>
                <input type="text" name="title" placeholder="Write a title" required>
            </div>

            <div class="form-row">
                <h4>Price:</h4>
                <input type="number" name="price" placeholder="Price" required>
            </div>

            <div class="form-row">
                <h4>Image:</h4>
                <input type="file" name="image" required>
            </div>

            <div class="form-row">
                <h4>Description:</h4>
                <input type="text" name="description" placeholder="Write a description" required>
            </div>

            <div class="form-row">
                <input type="submit" value="Save">
            </div>

        </form>

        <div>
            <table bgcolor="black">
                <tr>
                    <th style="padding: 30px">Food Name</th>
                    <th style="padding: 30px">Price</th>
                    <th style="padding: 30px">Description</th>
                    <th style="padding: 30px">Image</th>
                    <th style="padding: 30px">Action</th>
                </tr>
                  
                @foreach ($data as $data)
                <tr align="center">
                   <td>{{$data->title}}</td>
                   <td>{{$data->price}}</td>
                   <td>{{$data->description}}</td>
                   <td><img height="200" width=200 src="/foodimage/{{$data->image}}" alt=""></td>
                   <td><a href="{{url('/deletemenu',$data->id)}}">Delete</a></td>
                </tr>

                @endforeach


            </table>
        </div>


    </div>
</div>

@include("admin.adminscript")

</body>
</html>
