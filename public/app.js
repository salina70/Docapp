const doctors = [
  { "image": "public/images/01.jpg", "name": "Dr. Ayesha Mainali", "speciality": "Cardiologist" },
  { "image": "public/images/02.jpg", "name": "Dr. Neha Mehta", "speciality": "Dermatologist" },
  { "image": "public/images/03.jpg", "name": "Dr. Rohan Sharma", "speciality": "Pediatrician" },
  { "image": "public/images/04.jpg", "name": "Dr. Sana Patel", "speciality": "Orthopedic Surgeon" },
  { "image": "public/images/05.jpg", "name": "Dr. Arjun Ali", "speciality": "Neurologist" },
  { "image": "public/images/06.jpg", "name": "Dr. Pranaya Singh", "speciality": "Ophthalmologist" },
  { "image": "public/images/07.jpg", "name": "Dr. Karan Nair", "speciality": "Gynecologist" },
  { "image": "public/images/08.jpg", "name": "Dr. Vikram Das", "speciality": "Oncologist" },
  { "image": "public/images/09.jpg", "name": "Dr. Meera Kapoor", "speciality": "Endocrinologist" },
  { "image": "public/images/10.jpg", "name": "Dr. Rahul Bhatia", "speciality": "ENT Specialist" },
  { "image": "public/images/11.jpg", "name": "Dr. Shyam Reddy", "speciality": "Psychiatrist" },
  { "image": "public/images/12.jpg", "name": "Dr. Mohita Verma", "speciality": "Dentist" },
  { "image": "public/images/13.jpg", "name": "Dr. Fatima Baral", "speciality": "Rheumatologist" },
  { "image": "public/images/14.jpg", "name": "Dr. Harshita Vora", "speciality": "Urologist" },
  { "image": "public/images/15.jpg", "name": "Dr. Anjali Joshi", "speciality": "Gastroenterologist" },
  { "image": "public/images/16.jpg", "name": "Dr. Mohit Desai", "speciality": "Pulmonologist" },
  { "image": "public/images/17.jpg", "name": "Dr. Kavita Rao", "speciality": "General Physician" },
  { "image": "public/images/18.jpg", "name": "Dr. Ritu Pillai", "speciality": "Nephrologist" },
  { "image": "public/images/19.jpg", "name": "Dr. Sandeep Jain", "speciality": "Hematologist" },
  { "image": "public/images/20.jpg", "name": "Dr. Nikhil Gupta", "speciality": "Radiologist" },
  { "image": "public/images/21.jpg", "name": "Dr. Swastik Menon", "speciality": "Physiotherapist" },
  { "image": "public/images/22.jpg", "name": "Dr. Aditya Khan", "speciality": "Plastic Surgeon" },
  { "image": "public/images/23.jpg", "name": "Dr. Laila Qureshi", "speciality": "Obstetrician" },
  { "image": "public/images/24.jpg", "name": "Dr. Pooja Anand", "speciality": "Immunologist" },
  { "image": "public/images/25.jpg", "name": "Dr. Deepak Sinha", "speciality": "Allergist" },
  { "image": "public/images/26.jpg", "name": "Dr. Manish Arora", "speciality": "Geriatrician" },
  { "image": "public/images/27.jpg", "name": "Dr. Kunal Gill", "speciality": "Pathologist" },
  { "image": "public/images/28.jpg", "name": "Dr. Tanya Raj", "speciality": "Anesthesiologist" },
  { "image": "public/images/29.jpg", "name": "Dr. Rachna Bhatt", "speciality": "Infectious Disease Specialist" },
  { "image": "public/images/30.jpg", "name": "Dr. Varun Iyer", "speciality": "Surgeon" }
];


// Generate doctor cards
const doctorSlider = document.getElementById("doctorSlider");

doctors.forEach(doctor => {
    const card = document.createElement("div");
    card.classList.add("doctor-card");

    card.innerHTML = `
        <img src="${doctor.image}" alt="${doctor.name}">
        <h3>${doctor.name}</h3>
        <p>${doctor.speciality}</p>
        <button class="book-btn">Book Now</button>
    `;

    doctorSlider.appendChild(card);
});

// Slider functionality
const slideLeft = document.getElementById("slideLeft");
const slideRight = document.getElementById("slideRight");

slideLeft.addEventListener("click", () => {
    doctorSlider.scrollBy({ left: -300, behavior: "smooth" });
});

slideRight.addEventListener("click", () => {
    doctorSlider.scrollBy({ left: 300, behavior: "smooth" });
});


// HOSPITAL SECTION
const hospitals = [
  { name: "Kathmandu Cancer Care Hospital - KCCH", image: "public/images/ktm-cancer-center.jpg" },
  { name: "Frontline Hospital", image: "public/images/frontline.jpg" },
  { name: "Nepal Eye Hospital", image: "public/images/nepal-eye.jpg" },
  { name: "Patan Mental Hospital", image: "public/images/patan-mental.jpg" },
  { name: "Star Hospital", image: "public/images/star.jpg" },
  { name: "Vayodha Hospital", image: "public/images/vayodha.jpg" },
  { name: "Norvic Hospital", image: "public/images/norvic.jpg" },
  { name: "Neuro Hospital", image: "public/images/neuro.jpg" },
  { name: "Norvic Hospital", image: "public/images/norvic.jpg" },
  { name: "Kmc Hospital", image: "public/images/kmc.jpg" },
  { name: "Green City Hospital", image: "public/images/green-city.jpg" },
  { name: "Civil Hospital", image: "public/images/civil.jpg" },
  { name: "Bharosa Hospital", image: "public/images/bharosa.jpg" },
  { name: "Ent Hospital", image: "public/images/ent.jpg" },
  { name: "Bhaktapur Cancer Hospital", image: "public/images/bhaktapur-cancer.jpg" },
  { name: "Everest Hospital", image: "public/images/everest.jpg" },
];
const hospitalCards = document.getElementById('hospitalCards');

// Create hospital cards
hospitals.forEach(hospital => {
    const card = document.createElement('div');
    card.classList.add('hospital-card');
    card.innerHTML = `
        <img src="${hospital.image}" alt="${hospital.name}">
        <h3>${hospital.name}</h3>
    `;
    hospitalCards.appendChild(card);
});

let currentIndex = 0;
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

function updateCarousel() {
    const cardWidth = hospitalCards.querySelector('.hospital-card').offsetWidth + 20; // including gap
    hospitalCards.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
}

// Next
nextBtn.addEventListener('click', () => {
    if (currentIndex < hospitals.length - 3) currentIndex++;
    updateCarousel();
});

// Prev
prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) currentIndex--;
    updateCarousel();
});

// Update carousel on window resize
window.addEventListener('resize', updateCarousel);


// LOGIN/SIGNUP JS
// Get elements
const modal = document.getElementById("authModal");
const closeBtn = document.querySelector(".close-btn");
const loginBtn = document.getElementById("loginBtn");
const registerBtn = document.getElementById("registerBtn");
const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");

// Open modal when "Join" button is clicked
document.getElementById("joinBtn").addEventListener("click", () => {
    modal.style.display = "flex";
    loginForm.style.display = "flex";
    registerForm.style.display = "none";
});

// Close modal
closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

// Switch to login form
loginBtn.addEventListener("click", () => {
    loginForm.style.display = "flex";
    registerForm.style.display = "none";
});

// Switch to register form
registerBtn.addEventListener("click", () => {
    loginForm.style.display = "none";
    registerForm.style.display = "flex";
});

// Close modal if clicked outside the modal content
window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});


// book appointment
const bookModal = document.getElementById("bookModal");
const closeBookBtn = document.querySelector(".close-book");
const bookDoctorName = document.getElementById("bookDoctorName");
const bookDoctorSpecialty = document.getElementById("bookDoctorSpecialty");

// Add click event to all "Book Now" buttons
document.querySelectorAll(".book-btn").forEach(button => {
    
    button.addEventListener("click", function() {
        const card = this.parentElement;
        const doctorName = card.querySelector("h3").textContent;
        const doctorSpecialty = card.querySelector("p").textContent;

        bookDoctorName.textContent = doctorName;
        bookDoctorSpecialty.textContent = doctorSpecialty;

        bookModal.style.display = "flex";
    });
});

// Close modal
closeBookBtn.addEventListener("click", () => {
    bookModal.style.display = "none";
});

// Close modal if clicked outside
window.addEventListener("click", (e) => {
    if (e.target === bookModal) {
        bookModal.style.display = "none";
    }
});

window.onload = function(){
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('appointment_date').min = today;
};


// SYMPTOMS
document.addEventListener("DOMContentLoaded", function() {
    const symptomsDiv = document.querySelector(".symptoms-div");

    if (!symptomsDiv) {
        console.warn("No element with class 'symptoms-div' found!");
        return; // stop execution if container doesn't exist
    }

    const symptoms = [
        { id: 1, name: "Fever", image: "public/images/pulmonologist.jpg" },
        { id: 2, name: "Cough", image: "public/images/stomachpain.jpg" },
        { id: 3, name: "Surgery", image: "public/images/surgery.jpg" },
        { id: 4, name: "Headache", image: "public/images/headache.jpg" },
        { id: 5, name: "Stomach Pain", image: "public/images/stomachpain.jpg" },
        { id: 6, name: "Psychiatrist", image: "public/images/psychiatrist.jpg" },
        { id: 7, name: "Toothache", image: "public/images/physiotherapist.jpg" },
        { id: 8, name: "Physiotherapist", image: "public/images/physiotherapist.jpg" },
        { id: 9, name: "Pulmonologist", image: "public/images/pulmonologist.jpg" }
    ];

    symptoms.forEach(element => {
        const card = document.createElement("div");
        card.classList.add("symptoms-card");

        const img = document.createElement("img");
        img.src = element.image;
        img.classList.add("symptoms-img");

        const p = document.createElement("p");
        p.textContent = element.name;

        card.appendChild(img);
        card.appendChild(p);

        symptomsDiv.appendChild(card);
    });
});


const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');
const body = document.querySelector("body");
menuToggle.addEventListener('click', () => {
    // Toggle the "active" class
    navLinks.classList.toggle('active');

    // Show/hide for small screens
    if(navLinks.classList.contains('active')){
        navLinks.style.display = "flex";
    } else {
        navLinks.style.display = "none";
    }
    
});
document.addEventListener('click', (e) => {
    if(!navLinks.contains(e.target) && !menuToggle.contains(e.target)){
        navLinks.classList.remove('active');
    }
});

