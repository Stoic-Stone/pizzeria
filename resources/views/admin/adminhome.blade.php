<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.admincss");
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    
        @include("admin.navbar");
    
    @include("admin.adminscript")
	
	
</body>
</html>