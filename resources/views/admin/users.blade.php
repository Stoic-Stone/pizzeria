<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss");
</head>
<body>
@include("admin.navbar");


<div class="main-content" style="position: relative; top: 60px; right: -150px; overflow-x: auto;">
   <table style="width: 80%; border-collapse: collapse; background-color: #f4f4f4; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
      <thead>
         <tr style="background-color: #4CAF50; color: white; text-align: center;">
            <th style="padding: 15px 30px; font-size: 18px;">Name</th>
            <th style="padding: 15px 30px; font-size: 18px;">Email</th>
            <th style="padding: 15px 30px; font-size: 18px;">Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($data as $user)
            <tr align="center" style="background-color:rgba(17, 13, 13, 0.4); transition: background-color 0.3s ease;">
               <td style="padding: 15px; font-size: 16px;">{{$user->name}}</td>
               <td style="padding: 15px; font-size: 16px;">{{$user->email}}</td>
               <td>
                  @if($user->usertype == 1)
                     <span style="color: red; font-weight: bold;">Not Allowed</span>
                  @else
                     <form action="{{ route('updateRole', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <select name="usertype" style="padding: 5px 15px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc; cursor: pointer;">
                           <option value="0" {{ $user->usertype == 0 ? 'selected' : '' }}>User</option>
                           <option value="2" {{ $user->usertype == 2 ? 'selected' : '' }}>Chef</option>
                           <option value="3" {{ $user->usertype == 3 ? 'selected' : '' }}>Cashier</option>
                        </select>
                        <button type="submit" style="padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px; font-size: 16px; cursor: pointer; border: none;">Update</button>
                     </form>
                     <form action="{{ url('/deleteuser/'.$user->id) }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="padding: 8px 16px; background-color: #ff2a2a; color: white; border-radius: 5px; font-size: 16px; cursor: pointer; border: none;">Delete</button>
                     </form>
                  @endif
               </td>
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