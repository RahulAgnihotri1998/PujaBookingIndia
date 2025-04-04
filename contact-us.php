<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<!--===== HERO AREA STARTS =======-->
<div class="hero-inner-section-area-sidebar">
    <img alt="housebox" class="hero-img1" src="img/contact-us-2.jpg" />
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-header-area text-center">
                    <a href="index.php">Home <svg fill="currentColor" viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                            </path>
                            <path
                                d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                            </path>
                        </svg> Contact Us </a>
                    <div class="space24"></div>
                    <h1>Contact Us </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nice-select {
        margin-top: 20px;
    }
    .contact-inner-section .contact-form-area {

    background: #f5d3ae;
  
}
</style>
<!--===== HERO AREA ENDS =======-->
<!--===== CONTACT AREA STARTS =======-->

<div class="contact-inner-section sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="contact-form-area">
                    <h4>Book Your Puja Today</h4>
                    <form id="pujaBookingForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <input id="name" placeholder="First Name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <input id="lastName" placeholder="Last Name" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <input id="email" placeholder="Email Address" type="email" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <input id="phone" placeholder="Phone Number" type="number" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <select id="pujaType" class="nice-select" aria-invalid="false"
                                        name="your-puja-service">
                                        <option value="">—Please choose a puja—</option>
                                        <option value="satyanarayan-katha">Satyanarayan Katha</option>
                                        <option value="ganesh-pooja">Ganesh Pooja</option>
                                        <option value="lakshmi-pooja">Lakshmi Pooja</option>
                                        <!-- Add other puja options as needed -->
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <select id="pujaMode" class="nice-select" aria-invalid="false" name="puja-mode">
                                        <option value="">Select Puja Mode</option>
                                        <option value="online">Online Puja</option>
                                        <option value="offline">Offline Puja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <input id="pujaDate" type="date" min="2025-03-31" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-area">
                                    <select id="extraServices" class="nice-select" aria-invalid="false"
                                        name="extra-services">
                                        <option value="">Extra Services (Optional)</option>
                                        <option value="puja-samagri">Puja Samagri (Materials)</option>
                                        <option value="live-streaming">Live Streaming</option>
                                        <option value="priest-arrangement">Priest Arrangement</option>
                                        <option value="prasad-delivery">Prasad Delivery</option>
                                        <option value="none">None</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Address field (hidden by default) -->
                            <div class="col-lg-12" id="addressContainer" style="display: none;">
                                <div class="input-area">
                                    <textarea id="address"
                                        placeholder="Enter your address (required for Offline Puja)"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <textarea id="message"
                                        placeholder="Your Message (e.g., special requests)"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <button class="theme-btn1" type="submit">Book Now <span class="arrow1"><svg
                                                fill="currentColor" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                                            </svg></span><span class="arrow2"><svg fill="currentColor" height="24"
                                                viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 13H4V11H12V4L20 12L12 20V13Z"></path>
                                            </svg></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="heading1">
                    <h5>Contact Us</h5>
                    <div class="space32"></div>
                    <h2>Let’s Start the Conversation</h2>
                    <div class="space24"></div>
                    <p>At Puja Booking India, we are committed to helping you connect with the divine through seamless puja services. Whether you need assistance booking a puja, understanding rituals, or seeking guidance from our expert pandits, our team is here to support you. Reach out to us via phone, email, or WhatsApp—let us help you bring peace, prosperity, and blessings into your life with every ceremony.</p>
                    <div class="space40"></div>
              
                    <div class="social">
                    <ul>
                    <li><a href="https://www.facebook.com/panditpavan.dwivedi.5"><i class="fa-brands fa-facebook-f"></i></a></li>
<li><a href="https://instagram.com/acharypavanjimaharajofficial"><i class="fa-brands fa-instagram"></i></a></li>
<li><a href="https://youtube.com/@acharypavanjimaharaj1608?si=tgdhC3uXlKYrNsnd"><i class="fa-brands fa-youtube"></i></a></li>
      </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="mapouter">
    <div class="gmap_canvas">
        <iframe allowfullscreen="" height="450" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4506257.120552435!2d88.67021924228865!3d21.954385721237916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1704088968016!5m2!1sen!2sbd"
            style="border:0;" width="600"></iframe>
    </div>
</div>
<!--===== CONTACT AREA ENDS =======-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pujaModeField = document.getElementById("pujaMode");
        const addressContainer = document.getElementById("addressContainer");

        // Show/hide address field based on puja mode selection
        pujaModeField.addEventListener("change", function () {
            if (this.value === "offline") {
                addressContainer.style.display = "block";
            } else {
                addressContainer.style.display = "none";
                document.getElementById("address").value = ""; // Clear address when hidden
            }
        });

        document.getElementById("pujaBookingForm").addEventListener("submit", function (event) {
            event.preventDefault();
            let isValid = true;

            // Clear previous error messages
            document.querySelectorAll(".error-message").forEach(el => el.remove());

            // Validate Name
            let nameField = document.getElementById("name");
            if (nameField.value.trim() === "") {
                showError(nameField, "Please enter your first name.");
                isValid = false;
            }

            // Validate Email
            let emailField = document.getElementById("email");
            if (emailField.value.trim() === "" || !validateEmail(emailField.value)) {
                showError(emailField, "Please enter a valid email address.");
                isValid = false;
            }

            // Validate Phone
            let phoneField = document.getElementById("phone");
            if (phoneField.value.trim() === "" || !validatePhone(phoneField.value)) {
                showError(phoneField, "Please enter a valid 10-digit phone number.");
                isValid = false;
            }

            // Validate Puja Type
            let pujaTypeField = document.getElementById("pujaType");
            if (pujaTypeField.value.trim() === "") {
                showError(pujaTypeField, "Please select a puja type.");
                isValid = false;
            }

            // Validate Puja Mode
            let pujaModeField = document.getElementById("pujaMode");
            if (pujaModeField.value.trim() === "") {
                showError(pujaModeField, "Please select online or offline puja.");
                isValid = false;
            }

            // Validate Date
            let dateField = document.getElementById("pujaDate");
            let today = new Date("2025-03-31");
            let selectedDate = new Date(dateField.value);
            if (dateField.value.trim() === "") {
                showError(dateField, "Please select a date.");
                isValid = false;
            } else if (selectedDate < today) {
                showError(dateField, "Date cannot be in the past.");
                isValid = false;
            }

            // Validate Address (only if Offline Puja is selected)
            let addressField = document.getElementById("address");
            if (pujaModeField.value === "offline" && addressField.value.trim() === "") {
                showError(addressField, "Please enter your address for offline puja.");
                isValid = false;
            }

            if (isValid) {
                // Prepare form data
                const formData = {
                    name: nameField.value,
                    lastName: document.getElementById("lastName").value,
                    email: emailField.value,
                    phone: phoneField.value,
                    pujaType: pujaTypeField.value,
                    pujaMode: pujaModeField.value,
                    pujaDate: dateField.value,
                    extraServices: document.getElementById("extraServices").value || "",
                    address: pujaModeField.value === "offline" ? addressField.value : "", // Include address only for offline
                    message: document.getElementById("message").value
                };

                // Send AJAX request to PHP script
                fetch('submit-form-endpoint.php', { // Update to your actual PHP endpoint
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert(data.message); // Show success message
                            document.getElementById("pujaBookingForm").reset(); // Reset form
                            addressContainer.style.display = "none"; // Hide address field after reset
                        } else {
                            alert(data.message); // Show error message
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while submitting the form.');
                    });
            }
        });

        function showError(inputElement, message) {
            let errorDiv = document.createElement("div");
            errorDiv.className = "error-message";
            errorDiv.style.color = "red";
            errorDiv.style.fontSize = "0.9em";
            errorDiv.innerText = message;
            inputElement.parentNode.appendChild(errorDiv);
        }

        function validateEmail(email) {
            let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validatePhone(phone) {
            let re = /^\d{10}$/;
            return re.test(phone);
        }
    });
</script>
<?php include 'footer.php'; ?>