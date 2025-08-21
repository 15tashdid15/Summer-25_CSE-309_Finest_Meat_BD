document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("retailerForm");
  const retailerList = document.getElementById("retailer-list");
  const apiBase = "http://localhost:3000/Spring-25_CSE-303_Grading-Packaging-and-Transport-Management-System-for-Meat-Based-Products/backend/retailer_actions.php";

  // Ensure form exists before adding event listener
  if (form) {
    // Handle form submit to add or update retailer
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const retailerData = {
        retailer_id: document.getElementById("retailer_id").value, // Updated field name to retailer_id
        first_name: document.getElementById("first_name").value,
        middle_name: document.getElementById("middle_name").value,
        last_name: document.getElementById("last_name").value,
        warehouse: document.getElementById("warehouse").value,
        road: document.getElementById("road").value,
        block: document.getElementById("block").value,
        street_name: document.getElementById("street_name").value,
        postal_code: document.getElementById("postal_code").value,
        country: document.getElementById("country").value
      };

      console.log("Form Data Being Sent:", retailerData); // Log the form data

      // Send data via POST
      fetch(apiBase, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(retailerData) // Use retailerData here
      })
      .then(res => res.json()) // Wait for JSON response from the backend
      .then(response => {
        console.log("Server Response:", response); // Log the response from the server
        form.reset();
        document.getElementById("retailer_id").value = ""; // Clear the form's retailer_id
        loadRetailers(); // Reload retailers after adding
      })
      .catch(error => console.error('Error adding retailer:', error));
    });
  } else {
    console.error('Form element #retailerForm not found!');
  }

  // Load all retailers and update stats
  function loadRetailers() {
    fetch(apiBase)
      .then(res => res.json())
      .then(data => {
        retailerList.innerHTML = '';
        let warehouses = new Set();

        data.forEach(retailer => {
          warehouses.add(retailer.warehouse);
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${retailer.first_name} ${retailer.middle_name || ''} ${retailer.last_name}</td>
            <td>${retailer.warehouse}</td>
            <td>${retailer.road}, ${retailer.block}, ${retailer.street_name}, ${retailer.postal_code}</td>
            <td>${retailer.country}</td>
            <td>
              <button class="btn-green" onclick='editRetailer(${JSON.stringify(retailer)})'>Edit</button>
              <button class="btn-green" onclick='deleteRetailer(${retailer.retailer_id})'>Delete</button>
            </td>
          `;
          retailerList.appendChild(row);
        });

        // Update statistics dynamically
        document.getElementById('total-retailers')?.innerText = data.length;
        document.getElementById('active-warehouses')?.innerText = warehouses.size;
        document.getElementById('products-available')?.innerText = data.length * 2; // Example logic
        document.getElementById('orders-progress')?.innerText = data.length;
        document.getElementById('avg-delivery-time')?.innerText = `${Math.floor(Math.random() * 5) + 1} Days`;
      })
      .catch(error => console.error('Error loading retailer data:', error));
  }

  // Populate form with retailer data for editing
  window.editRetailer = (retailer) => {
    document.getElementById("retailer_id").value = retailer.retailer_id; // Updated field name to retailer_id
    document.getElementById("first_name").value = retailer.first_name;
    document.getElementById("middle_name").value = retailer.middle_name;
    document.getElementById("last_name").value = retailer.last_name;
    document.getElementById("warehouse").value = retailer.warehouse;
    document.getElementById("road").value = retailer.road;
    document.getElementById("block").value = retailer.block;
    document.getElementById("street_name").value = retailer.street_name;
    document.getElementById("postal_code").value = retailer.postal_code;
    document.getElementById("country").value = retailer.country;
  };

  // Delete retailer
  window.deleteRetailer = (id) => {
    if (!confirm("Are you sure you want to delete this retailer?")) return;
    fetch(apiBase, {
      method: "DELETE",
      body: new URLSearchParams({ id }) // Sending id using URLSearchParams for DELETE request
    })
    .then(res => res.text())
    .then(() => loadRetailers()) // Reload retailers after deletion
    .catch(error => console.error('Error deleting retailer:', error));
  };

  // Search Filter functionality
  document.getElementById("search-bar")?.addEventListener("input", function (e) {
    const val = e.target.value.toLowerCase();
    const rows = document.querySelectorAll("#retailer-list tr");
    rows.forEach(row => {
      const match = Array.from(row.cells).some(cell =>
        cell.textContent.toLowerCase().includes(val)
      );
      row.style.display = match ? "" : "none";
    });
  });

  // Initial load of retailer data
  loadRetailers();
});
