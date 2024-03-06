<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap User Management Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
    .table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #299be4;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn {
		color: #566787;
		float: right;
		font-size: 13px;
		background: #fff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
		background: #f2f2f2;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Create Supplyment</h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{route('user_management')}}" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>User Management</span></a>
                        <a href="{{route('supplement_management')}}" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Supplement Management</span></a>					
                    </div>
                </div>
            </div>
    
               
        
           
        </div>
        
    </div>        
    <div class="container mt-5">
        <form id="productForm" method ="POST" action = "{{route('adding_supplement')}}" enctype=multipart/form-data>
            @csrf
            <div class="mb-3">
                <label for="productOverview" class="form-label">Product Overview</label>
                <textarea class="form-control" id="productOverview" name="productOverview" rows="4"></textarea>
            </div>
            <br>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <textarea class="form-control" id="product_name" name="product_name" rows="4"></textarea>
            </div>
            <br>
            <!-- Add this input to your form -->
            <div class="mb-3">
                <label for="thumbnailImage" class="form-label">Upload Thumbnail Image</label>
                <input type="file" class="form-control" id="thumbnailImage" name="thumbnail_image" accept="image/*" onchange="previewImage('thumbnailImage', 'thumbnailPreview')">
                <br>
                <img id="thumbnailPreview" src="" width="1000px" height="600px" style="display: none;">
            </div>
            <br>
            <div class="mb-3">
                <label for="detailImage" class="form-label">Upload Detail Image</label>
                <input type="file" class="form-control" id="detailImage" name="detail_image" accept="image/*" onchange="previewImage('detailImage', 'detailPreview')">
                <br>
                <img id="detailPreview" src="" width="1000px" height="600px" style="display: none;">
            </div>
            <br>
            
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <br>
                <select class="form-select" id="category" name="category" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Whey">Whey</option>
                    <option value="Multivitamins">Multivitamins</option>
                    <option value="Pre-Workout">Pre-Workout</option>
                    <option value="Post-Workout">Post-Workout</option>
                    <option value="Weight Gainers">Weight Gainers</option>
                    <option value="Sleep Aids">Sleep Aids</option>
                    <option value="Immune Support">Immune Support</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="Bying Link" class="form-label">Bying Link</label>
                <input type="text" class="form-control" id="Bying Link" name="bying_link" required>
            </div>
            <br>
            <div class="mb-3">
                <label for="whatIsIt" class="form-label">What is it</label>
                <textarea class="form-control" id="whatIsIt" name="whatIsIt" rows="4"></textarea>
            </div>
            <br>
            <div class="mb-3">
                <label for="usage" class="form-label">What is it usage</label>
                <ul class="list-unstyled" id="usageList">
                    <li>
                        <input type="text" class="form-control" placeholder="Usage 1" name="usageList[]">
            
                    </li>
                </ul>
                <button type="button" class="btn btn-secondary" onclick="addInput('usageList', 'Usage')">Add Usage</button>
            </div>
            <br>
            <div class="mb-3">
                <label for="components" class="form-label">Component</label>
                <table class="table" id="componentTable">
                    <thead>
                        <tr>
                            <th scope="col">Component</th>
                            <th scope="col">Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" placeholder="Component 1" name = "componentTable[component][]"></td>
                            <td><input type="text" class="form-control" placeholder="Purpose 1" name ="componentTable[purpose][]"></td>
            
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-secondary" onclick="addTableRow('componentTable')">Add Row</button>
            </div>
            <br>    
            <div class="mb-3">
                <label for="how_to_use" class="form-label">How To Use</label>
                <textarea class="form-control" id="how_to_use" name="how_to_use" rows="4"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
</div>     
</body>
<script>
    function addInput(listId, inputName) {
    const list = document.getElementById(listId);
    const newIndex = list.getElementsByTagName('li').length + 1;

    const newInput = document.createElement('li');
    newInput.innerHTML = `
        <br>
        <input type="text" class="form-control" placeholder="${inputName} ${newIndex}" name="usageList[]">
    `;

    list.appendChild(newInput);
}

function addTableRow(tableId) {
    const table = document.getElementById(tableId);
    const newIndex = table.rows.length; // Total number of rows in the table

    const newRow = table.insertRow();
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);

    const input1 = document.createElement('input');
    input1.type = 'text';
    input1.className = 'form-control';
    input1.placeholder = `Component ${newIndex}`; // Use newIndex + 1 to start indexing from 1
    input1.name = `componentTable[component][]`; // Use the same name for all components

    const input2 = document.createElement('input');
    input2.type = 'text';
    input2.className = 'form-control';
    input2.placeholder = `Purpose ${newIndex}`; // Use newIndex + 1 to start indexing from 1
    input2.name = `componentTable[purpose][]`; // Use the same name for all purposes
 
    cell1.appendChild(input1);
    cell2.appendChild(input2);
}
function previewImage(inputId, imgId) {
        const input = document.getElementById(inputId);
        const img = document.getElementById(imgId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                img.src = e.target.result;
                img.style.display = 'block'; // Show the image
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            img.src = '';
            img.style.display = 'none'; // Hide the image
        }
    }


</script>
</html>