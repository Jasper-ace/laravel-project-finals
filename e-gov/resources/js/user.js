import axios from 'axios'; // Ensure the path is correct

async function populateProductTable() {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/products'); // Ensure this URL is correct
    const tableBody = document.querySelector('.table tbody');
    tableBody.innerHTML = "";

    response.data.forEach((product, index) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${index + 1}</td>
        <td>${product.name}</td>
        <td>${product.cpNumber}</td>
        <td>${product.gender}</td>
        <td>${product.barangay}</td>
        <td>${product.sitio}</td>
        <td>${product.visit}</td>
        <td>
          <button type="button" data-id="${product._id}" class="btn btn-danger btn-delete">Delete</button>
          <button type="button" data-id="${product._id}" class="btn btn-success btn-update">Update</button>
        </td>
      `;
      tableBody.appendChild(row);
    });
  } catch (error) {
    console.error("Error fetching products:", error);
  }
}

window.onload = () => {
  populateProductTable();

  const saveButton = document.getElementById('save');
  saveButton.addEventListener('click', saveChanges);
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
      document.getElementById('closeModal').click();
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
  
  document.getElementById('productModalLabel').innerText = 'Update Product';
  document.getElementById("addProduct").click();
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

function checkPasswordMatch() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("password_confirmation").value;
  var message = document.getElementById("passwordMatchMessage");

  if (confirmPassword.trim() !== "" && password !== confirmPassword) {
    message.innerHTML = "Passwords do not match";
  } else {
    message.innerHTML = "";
  }
}

document.getElementById("password").addEventListener("keyup", checkPasswordMatch);
document.getElementById("password_confirmation").addEventListener("keyup", checkPasswordMatch);
