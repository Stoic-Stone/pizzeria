<x-app-layout></x-app-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    @include("admin.admincss")
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }

        .form-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h3, h4, h5, p, li {
            color: black; /* Ensure all text is black */
        }

        .form-row {
            margin-bottom: 20px;
        }

        .form-row label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-row input, 
        .form-row textarea,
        .supply-row input,
        .supply-row textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            color: black; /* Ensure input text is black */
        }

        .form-row input::placeholder, 
        .form-row textarea::placeholder,
        .supply-row input::placeholder,
        .supply-row textarea::placeholder {
            color: black; /* Ensure placeholder text is black */
        }

        .form-row input:focus, 
        .form-row textarea:focus,
        .supply-row input:focus,
        .supply-row textarea:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        .add-supply-btn, 
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .add-supply-btn:hover, 
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .supply-row {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .supply-row input, 
        .supply-row textarea {
            flex: 1;
        }

        @media (max-width: 768px) {
            .supply-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
@include("admin.navbar")

<div class="main-content">
    <div class="form-container">
        <form action="{{ url('/uploadsuppliers') }}" method="POST">
            @csrf
            <h3>Add Supplier and Supplies</h3>

            <div class="form-row">
                <label for="name">Supplier Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter supplier name" required>
            </div>

            <div class="form-row">
                <label for="contact_name">Contact Name:</label>
                <input type="text" id="contact_name" name="contact_name" placeholder="Enter contact person" required>
            </div>

            <div class="form-row">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number" required>
            </div>

            <div class="form-row">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email address" required>
            </div>

            <div class="form-row">
                <label for="address">Address:</label>
                <textarea id="address" name="address" placeholder="Enter supplier address" required></textarea>
            </div>

            <h4>Supplies (Ingredients):</h4>
            <div id="supplies-container">
                <div class="supply-row">
                    <input type="text" name="supplies[0][name]" placeholder="Enter ingredient name" required>
                    <textarea name="supplies[0][description]" placeholder="Enter ingredient description" required></textarea>
                    <input type="number" step="0.01" name="supplies[0][price]" placeholder="Enter ingredient price" required>
                </div>
            </div>

            <button type="button" class="add-supply-btn" onclick="addSupply()">Add Another Supply</button>

            <div class="form-row">
                <input type="submit" value="Save">
            </div>
        </form>
    </div>

    <div class="form-container" style="margin-top: 40px;">
        <h3>Current Suppliers and Supplies</h3>
        @foreach ($suppliers as $supplier)
            <h4>Supplier: {{ $supplier->name }}</h4>
            <p><strong>Contact Name:</strong> {{ $supplier->contact_name }}</p>
            <p><strong>Phone:</strong> {{ $supplier->phone }}</p>
            <p><strong>Email:</strong> {{ $supplier->email }}</p>
            <p><strong>Address:</strong> {{ $supplier->address }}</p>
            <h5>Supplies:</h5>
            <ul>
                @foreach ($supplier->ingredients as $ingredient)
                    <li>{{ $ingredient->name }} - ${{ number_format($ingredient->price, 2) }} ({{ $ingredient->description }})</li>
                @endforeach
            </ul>
            <hr>
        @endforeach
    </div>
</div>

@include("admin.adminscript")

<script>
    let supplyCount = 1;

    function addSupply() {
        const container = document.getElementById('supplies-container');
        const supplyRow = document.createElement('div');
        supplyRow.classList.add('supply-row');
        supplyRow.innerHTML = `
            <input type="text" name="supplies[${supplyCount}][name]" placeholder="Enter ingredient name" required>
            <textarea name="supplies[${supplyCount}][description]" placeholder="Enter ingredient description" required></textarea>
            <input type="number" step="0.01" name="supplies[${supplyCount}][price]" placeholder="Enter ingredient price" required>
        `;
        container.appendChild(supplyRow);
        supplyCount++;
    }
</script>
</body>
</html>
