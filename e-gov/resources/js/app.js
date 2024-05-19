import axios from 'axios'; // Import axios library
import './bootstrap';
    
// Function to fetch and populate product data
async function populateProductTable() {
    try {
      // Make a GET request to the API endpoint
      const response = await axios.get('/api/products');
      // Get a reference to the table body
      const tableBody = document.querySelector('.table tbody');
  
      tableBody.innerHTML = "";
      // Loop through the products in the response data
      response.data.forEach((product, index) => {
        // Create a new row element
        const row = document.createElement('tr');
        // Populate the row with product data
        row.innerHTML = `
          <td>${index + 1}</td> <!-- Incremental numbering -->
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
        // Append the row to the table body
        tableBody.appendChild(row);
      });
    } catch (error) {
      console.error("Error fetching products:", error);
    }
  }
  
  // This will run after the page finishes loading
  window.onload = () => {
    populateProductTable(); // Call the function to fetch and populate product data
  
    const saveButton = document.getElementById('save');
    saveButton.addEventListener('click', saveChanges);
  };
  
  // Function to handle saving changes
  function saveChanges() {
      // Get form input values
      const name = document.getElementById('name').value;
      const cpNumber = document.getElementById('cpNumber').value;
      const gender = document.getElementById('gender').value;
      const barangay = document.getElementById('barangay').value;
      const sitio = document.getElementById('sitio').value;
      const visit = document.getElementById('visit').value;
      
      
      // Prepare data object to send in the POST or PUT request
      const data = {
        name: name,
        cpNumber: cpNumber,
        gender: gender,
        barangay: barangay,
        sitio: sitio,
        visit: visit
      };
      
      // Check if it's an update or add operation
      const productId = document.getElementById('save').getAttribute('data-id');
      const method = productId ? 'put' : 'post'; // If productId exists, it's an update, otherwise it's an add
      
      // Make a POST or PUT request to the API endpoint
      const url = productId ? `/api/products/${productId}` : '/api/products';
      axios[method](url, data)
        .then(response => {
          // Handle successful response
          console.log(method === 'put' ? "Product updated:" : "Product created:", response.data);
          // Close the modal by generating a click event on the close button
          document.getElementById('closeModal').click();
          // Clear the form
          clearForm();
          // Refresh table
          populateProductTable();
        })
        .catch(error => {
          // Handle error
          console.error(method === 'put' ? "Error updating product:" : "Error creating product:", error);
        });
    }
  
    // Function to clear the form
  function clearForm() {
      document.getElementById('name').value = '';
      document.getElementById('cpNumber').value = '';
      document.getElementById('gender').value = '';
      document.getElementById('barangay').value = '';
      document.getElementById('sitio').value = '';
      document.getElementById('visit').value = '';
      // Reset modal title
      document.getElementById('productModalLabel').innerText = 'Add Product';
      // Remove data-id attribute
      document.getElementById('save').removeAttribute('data-id');
    }
  
    document.addEventListener('click', function (event){
      if (event.target.classList.contains('btn-update')) {
        const productId = event.target.getAttribute('data-id');
        updateProduct(productId);
      }
    });
  
    // Function to handle update
  async function updateProduct(productId) {
    // Find the product by ID and retrieve its data
    const productToUpdate = await getProductById(productId);
    console.log(productToUpdate);
  
    // Populate the form fields with the product data
    document.getElementById('name').value = productToUpdate.name;
    document.getElementById('cpNumber').value = productToUpdate.cpNumber;
    document.getElementById('gender').value = productToUpdate.gender;
    document.getElementById('barangay').value = productToUpdate.barangay;
    document.getElementById('sitio').value = productToUpdate.sitio;
    document.getElementById('visit').value = productToUpdate.visit;
  
    // Change the modal title to indicate update
    document.getElementById('productModalLabel').innerText = 'Update Product';
  
    // Display the modal
    document.getElementById("addProduct").click();
  
    // Save the product ID to the modal's save button
    const saveButton = document.getElementById('save');
    saveButton.setAttribute('data-id', productId);
  }
  
  // Function to get product by ID
  async function getProductById(productId) {
    try {
      // Make a GET request to the API endpoint with the product ID
      const response = await axios.get(`/api/products/${productId}`);
      // Return the product data from the response
      return response.data;
    } catch (error) {
      console.error("Error fetching product:", error);
      return null;
    }
  }
  
  // Function to delete a product
  async function deleteProduct(productId) {
    try {
      // Make a DELETE request to the API endpoint with the product ID
      await axios.delete(`/api/products/${productId}`);
      
      // Optionally, you can remove the deleted product from the UI
      // For example, you can reload the product table to reflect the changes
      populateProductTable();
      
      console.log("Product deleted successfully");
    } catch (error) {
      console.error("Error deleting product:", error);
    }
  }
  
  // Event listener for delete buttons
  document.addEventListener('click', function(event) {
    // Check if the clicked element is a delete button
    if (event.target.classList.contains('btn-delete')) {
      // Get the product ID from the data-id attribute
      const productId = event.target.getAttribute('data-id');
      // Call the deleteProduct function with the product ID
      deleteProduct(productId);
    }
  });
  
    
  
    // JavaScript function to check if password and confirm password fields match
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
    
    // Event listeners to trigger the password match check
    document.getElementById("password").addEventListener("keyup", checkPasswordMatch);
    document.getElementById("password_confirmation").addEventListener("keyup", checkPasswordMatch);

    // user-client
    







    
    
