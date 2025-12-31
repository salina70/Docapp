<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Doctor | DocApp</title>
    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .inp {
            width: 40%;
            padding: .3rem;
            font-size: 1rem;
        }

        #div {
            margin: 2rem;
            font-size: 1.3rem;
               position: relative;
            width: 80%;
        }

        .dr {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 19rem;
            height: 10rem;
            gap: 1rem;
        }

        .drimg img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }

        .drimg {
            height: 100px;
            width: 100px;

        }

        .dr-card {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: .7rem;
            max-width: 100vw;
            flex-wrap: wrap;

        }

        .drdetails {
            display: flex;
            flex-direction: column;
        }

        .drdetails p {
            margin-top: .5rem;
        }

        #cross {
            position: absolute;
            right: 28rem;
            top: 5px;
            border-radius: 50%;
            font-size: .7rem;
            padding: .2rem;
            height: 20px;
            width: 20px;
            background-color: #D3D3D3;
            padding-top: .3rem;
        }

        #cross:hover {
            cursor: pointer;
            background-color: #FF7F7F ;

        }

        .flex{
            display: none;
            justify-content: center;
            align-items: center;
        }
        .consult{
            cursor: pointer;
            color: var(--primary-color);
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div id="div"> Find by speciality: <input type="text" placeholder="dermatologist, cardiologist, dentist, ent"
            class="inp">
        <div class="flex" ><i class="fa-solid fa-xmark" id="cross"></i></div>

    </div>
    <div class="dr-card">
    </div>

    <script>
        let doctors = [
            { "image": "../public/images/01.jpg", "name": "Dr. Ayesha Mainali", "speciality": "Cardiologist" },
            { "image": "../public/images/02.jpg", "name": "Dr. Neha Mehta", "speciality": "Dermatologist" },
            { "image": "../public/images/03.jpg", "name": "Dr. Rohan Sharma", "speciality": "Pediatrician" },
            { "image": "../public/images/04.jpg", "name": "Dr. Sana Patel", "speciality": "Orthopedic Surgeon" },
            { "image": "../public/images/05.jpg", "name": "Dr. Arjun Ali", "speciality": "Neurologist" },
            { "image": "../public/images/06.jpg", "name": "Dr. Pranaya Singh", "speciality": "Ophthalmologist" },
            { "image": "../public/images/07.jpg", "name": "Dr. Karan Nair", "speciality": "Gynecologist" },
            { "image": "../public/images/08.jpg", "name": "Dr. Vikram Das", "speciality": "Oncologist" },
            { "image": "../public/images/09.jpg", "name": "Dr. Meera Kapoor", "speciality": "Endocrinologist" },
            { "image": "../public/images/10.jpg", "name": "Dr. Rahul Bhatia", "speciality": "ENT Specialist" },
            { "image": "../public/images/11.jpg", "name": "Dr. Shyam Reddy", "speciality": "Psychiatrist" },
            { "image": "../public/images/12.jpg", "name": "Dr. Mohita Verma", "speciality": "Dentist" },
            { "image": "../public/images/13.jpg", "name": "Dr. Fatima Baral", "speciality": "Rheumatologist" },
            { "image": "../public/images/14.jpg", "name": "Dr. Harshita Vora", "speciality": "Urologist" },
            { "image": "../public/images/15.jpg", "name": "Dr. Anjali Joshi", "speciality": "Gastroenterologist" },
            { "image": "../public/images/16.jpg", "name": "Dr. Mohit Desai", "speciality": "Pulmonologist" },
            { "image": "../public/images/17.jpg", "name": "Dr. Kavita Rao", "speciality": "General Physician" },
            { "image": "../public/images/18.jpg", "name": "Dr. Ritu Pillai", "speciality": "Nephrologist" },
            { "image": "../public/images/19.jpg", "name": "Dr. Sandeep Jain", "speciality": "Hematologist" },
            { "image": "../public/images/20.jpg", "name": "Dr. Nikhil Gupta", "speciality": "Radiologist" },
            { "image": "../public/images/21.jpg", "name": "Dr. Swastik Menon", "speciality": "Physiotherapist" },
            { "image": "../public/images/22.jpg", "name": "Dr. Aditya Khan", "speciality": "Plastic Surgeon" },
            { "image": "../public/images/23.jpg", "name": "Dr. Laila Qureshi", "speciality": "Obstetrician" },
            { "image": "../public/images/24.jpg", "name": "Dr. Pooja Anand", "speciality": "Immunologist" },
            { "image": "../public/images/25.jpg", "name": "Dr. Deepak Sinha", "speciality": "Allergist" },
            { "image": "../public/images/26.jpg", "name": "Dr. Manish Arora", "speciality": "Geriatrician" },
            { "image": "../public/images/27.jpg", "name": "Dr. Kunal Gill", "speciality": "Pathologist" },
            { "image": "../public/images/28.jpg", "name": "Dr. Tanya Raj", "speciality": "Anesthesiologist" },
            { "image": "../public/images/29.jpg", "name": "Dr. Rachna Bhatt", "speciality": "Infectious Disease Specialist" },
            { "image": "../public/images/30.jpg", "name": "Dr. Varun Iyer", "speciality": "Surgeon" }
        ];
        let docCard = document.querySelector(".dr-card");
       let originalCards;
        doctors.forEach((dr) => {
            let card = `
    <div class="dr">
    <div class="drimg"><img src="${dr.image} " alt=""></div>
    <div class="drdetails">
    <h3>${dr.name}</h3>
    <p class="spec">${dr.speciality}</p>
    <p class="consult">Consult</p>
    </div>
</div>
    `;

            docCard.innerHTML += card;

        });
           originalCards = docCard.innerHTML;


        let cross = document.querySelector("#cross");
        cross.addEventListener("click", function () {
            document.querySelector("input").value = '';
            docCard.innerHTML=originalCards;
            cross.style.display="none";
        })

        let inp = document.querySelector(".inp");
        inp.addEventListener("input", function (e) {
            if(e.target.value===""){
                cross.style.display='none';
            }
            let inpVal = e.target.value.toLowerCase();
            let spec = document.querySelectorAll(".spec");
            let cards = document.querySelectorAll(".dr");
            document.querySelector(".flex").style.display="flex";

            spec.forEach((input, idx) => {
                let para = input.textContent.toLowerCase();
                if (para.includes(inpVal)) {
                    cards[idx].style.display = "flex";
                } else {
                    cards[idx].style.display = "none";
                }
            });


        });
    </script>
</body>

</html>