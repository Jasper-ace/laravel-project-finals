<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    @vite(['resources/css/app.css'])

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
    /* Custom CSS for increasing table width */
    .custom-table {
        width: 110%;
        margin-left: -5%; 
        margin-right: -5%;
    }
</style>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex align-items-start justify-content-between">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <img style="height: 100px; width: 100px; margin-right: 20px;" src="{{ asset('images/naguilian.jpg') }}" alt="Your Logo">
            </a>
            <div style="text-align: left;">
                <h1 style="font-weight: bold; font-size: 24px; margin-top: 20px;">Barangay Electronic Help Desk</h1>
                <h3 style="font-size: 14px; margin-top: 10px;">Suguidan Norte, Naguilian, La Union, 2511</h3>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h2>Visitor History</h2>
        <div id="clock" style="font-size: 18px;"></div>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <input id="dateFilter" class="form-control" style="width: 250px;" placeholder="Select date range">
    </div>
    <table class="table table-striped custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>CP Number</th>
                <th>Gender</th>
                <th>Barangay</th>
                <th>Sitio</th>
                <th>Visit</th>
                <th>Time In</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be populated here by JavaScript -->
        </tbody>
    </table>
</div>

<!-- Modal for Add/Edit Product -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="cpNumber">CP Number</label>
                        <input type="text" class="form-control" id="cpNumber">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                            <option id="default">Select Gender</option>
                            <option id="male">Male</option>
                            <option id="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="barangay">Barangay</label>
                        <select class="form-control" name="barangay" id="barangay">
                            <option value="">Select Barangay</option>
                            <option value="Aguioas">Aguioas</option>
                            <option value="Al-alinao Norte">Al-alinao Norte</option>
                            <option value="Al-alinao Sur">Al-alinao Sur</option>
                            <option value="Ambaracao Norte">Ambaracao Norte</option>
                            <option value="Ambaracao Sur">Ambaracao Sur</option>
                            <option value="Angin">Angin</option>
                            <option value="Balecbec">Balecbec</option>
                            <option value="Bancagan">Bancagan</option>
                            <option value="Baraoas Norte">Baraoas Norte</option>
                            <option value="Baraoas Sur">Baraoas Sur</option>
                            <option value="Bariquir">Bariquir</option>
                            <option value="Bato">Bato</option>
                            <option value="Bimmotobot">Bimmotobot</option>
                            <option value="Cabaritan Norte">Cabaritan Norte</option>
                            <option value="Cabaritan Sur">Cabaritan Sur</option>
                            <option value="Casilagan">Casilagan</option>
                            <option value="Dal-lipaoen">Dal-lipaoen</option>
                            <option value="Daramuangan">Daramuangan</option>
                            <option value="Guesset">Guesset</option>
                            <option value="Gusing Norte">Gusing Norte</option>
                            <option value="Gusing Sur">Gusing Sur</option>
                            <option value="Imelda">Imelda</option>
                            <option value="Lioac Norte">Lioac Norte</option>
                            <option value="Lioac Sur">Lioac Sur</option>
                            <option value="Magungunay">Magungunay</option>
                            <option value="Mamat-ing Norte">Mamat-ing Norte</option>
                            <option value="Mamat-ing Sur">Mamat-ing Sur</option>
                            <option value="Nagsidorisan">Nagsidorisan</option>
                            <option value="Natividad">Natividad</option>
                            <option value="Ortiz">Ortiz</option>
                            <option value="Ribsuan">Ribsuan</option>
                            <option value="San Antonio">San Antonio</option>
                            <option value="San Isidro">San Isidro</option>
                            <option value="Sili">Sili</option>
                            <option value="Suguidan Norte">Suguidan Norte</option>
                            <option value="Suguidan Sur">Suguidan Sur</option>
                            <option value="Tuddingan">Tuddingan</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="sitio">Sitio</label>
                        <input type="text" class="form-control" id="sitio">
                    </div>
                    <div class="form-group">
                        <label for="visit">Visit</label>
                        <select class="form-control" name="visit" id="visit">
                            <option id="">Select Purpose of Visit</option>
                            <option id="personal">Personal Errands and Documentation</option>
                            <option id="gov">Government and Administrative Services</option>
                            <option id="health">Health and Social Services</option>
                            <option id="community">Community Events and Activities</option>
                            <option id="educ">Education and Information</option>
                            <option id="eco">Economic Activities</option>
                            <option id="env">Environmental and Infrastructure Concerns</option>
                            <option id="report">Safety and Security Report</option>
                            </select>   
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
async function populateProductTable(startDate, endDate) {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/products');
    const tableBody = document.querySelector('.table tbody');
    tableBody.innerHTML = "";

    const filteredData = response.data.filter(product => {
      const productDate = new Date(product.created_at).setHours(0, 0, 0, 0);
      if (startDate && endDate) {
        return productDate >= startDate.setHours(0, 0, 0, 0) && productDate <= endDate.setHours(0, 0, 0, 0);
      }
      return true;
    });

    filteredData.forEach((product, index) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${index + 1}</td>
        <td>${product.name}</td>
        <td>${product.cpNumber}</td>
        <td>${product.gender}</td>
        <td>${product.barangay}</td>
        <td>${product.sitio}</td>
        <td>${product.visit}</td>
        <td>${new Date(product.created_at).toLocaleString()}</td>
        <td>
        <button type="button" data-id="${product._id}" class="btn btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete this data if the person does not show up">Delete</button>
    <button type="button" data-id="${product._id}" class="btn btn-success btn-update" data-toggle="tooltip" data-placement="top" title="Update this data if the person have a mistake from their data">Update</button>
        </td>
        </td>
      `;
      tableBody.appendChild(row);
    });

    $('[data-toggle="tooltip"]').tooltip();

  } catch (error) {
    console.error("Error fetching products:", error);
  }
}

window.onload = () => {
  populateProductTable();
  startClock();

  const saveButton = document.getElementById('save');
  saveButton.addEventListener('click', saveChanges);

  $('[data-toggle="tooltip"]').tooltip();


  flatpickr("#dateFilter", {
    mode: "range",
    dateFormat: "Y-m-d",
    onClose: function(selectedDates) {
      if (selectedDates.length === 2) {
        populateProductTable(selectedDates[0], selectedDates[1]);
      }
    }
  });
};

function saveChanges() {
  const name = document.getElementById('name').value;
  const cpNumber = document.getElementById('cpNumber').value;
  const gender = document.getElementById('gender').value;
  const barangay = document.getElementById('barangay').value;
  const sitio = document.getElementById('sitio').value;
  const visit = document.getElementById('visit').value;

  const data = {
    name: name,
    cpNumber: cpNumber,
    gender: gender,
    barangay: barangay,
    sitio: sitio,
    visit: visit
  };

  const productId = document.getElementById('save').getAttribute('data-id');
  const method = productId ? 'put' : 'post';
  const url = productId ? `http://127.0.0.1:8000/api/products/${productId}` : 'http://127.0.0.1:8000/api/products';
  
  axios[method](url, data)
    .then(response => {
      console.log(method === 'put' ? "Product updated:" : "Product created:", response.data);
      $('#productModal').modal('hide');
      clearForm();
      populateProductTable();
    })
    .catch(error => {
      console.error(method === 'put' ? "Error updating product:" : "Error creating product:", error);
    });
}

function clearForm() {
  document.getElementById('name').value = '';
  document.getElementById('cpNumber').value = '';
  document.getElementById('gender').value = '';
  document.getElementById('barangay').value = '';
  document.getElementById('sitio').value = '';
  document.getElementById('visit').value = '';
  document.getElementById('productModalLabel').innerText = 'Add Product';
  document.getElementById('save').removeAttribute('data-id');
}

document.addEventListener('click', function (event) {
  if (event.target.classList.contains('btn-update')) {
    const productId = event.target.getAttribute('data-id');
    updateProduct(productId);
  }
});

async function updateProduct(productId) {
  const productToUpdate = await getProductById(productId);
  if (!productToUpdate) return;

  document.getElementById('name').value = productToUpdate.name;
  document.getElementById('cpNumber').value = productToUpdate.cpNumber;
  document.getElementById('gender').value = productToUpdate.gender;
  document.getElementById('barangay').value = productToUpdate.barangay;
  document.getElementById('sitio').value = productToUpdate.sitio;
  document.getElementById('visit').value = productToUpdate.visit;
  
  document.getElementById('productModalLabel').innerText = 'Update Visitor data';
  $('#productModal').modal('show');
  const saveButton = document.getElementById('save');
  saveButton.setAttribute('data-id', productId);
}

async function getProductById(productId) {
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/products/${productId}`);
    return response.data;
  } catch (error) {
    console.error("Error fetching product:", error);
    return null;
  }
}

async function deleteProduct(productId) {
  try {
    await axios.delete(`http://127.0.0.1:8000/api/products/${productId}`);
    populateProductTable();
    console.log("Product deleted successfully");
  } catch (error) {
    console.error("Error deleting product:", error);
  }
}

document.addEventListener('click', function(event) {
  if (event.target.classList.contains('btn-delete')) {
    const productId = event.target.getAttribute('data-id');
    deleteProduct(productId);
  }
});

// Clock script
function startClock() {
  const clockElement = document.getElementById('clock');
  function updateClock() {
    const now = new Date();
    const timeString = now.toLocaleTimeString();
    clockElement.textContent = timeString;
  }
  updateClock();
  setInterval(updateClock, 1000);
}
</script>
</body>
</html>
