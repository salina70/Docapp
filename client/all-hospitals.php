<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Hospitals | DocApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
.flex{
    display: flex;
    justify-content: center;
    align-items: center;
}
  .inp {
            width: 40%;
            padding: .3rem;
            font-size: 1rem;
        }

        #div {
               position: relative;
            width: 80%;
            margin: 2rem;
            font-size: 1.3rem;
        }
         #cross {
            position: absolute;
            display: none;
            right: 26.5rem;
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
      .hospital-div{
        flex-wrap: wrap;
        gap: 1.7rem;
        width: 90vw;
        margin: 0 auto;

      }
      .hosp-name{
        text-align: center;
      }
      .hosp-img{
        width: 15rem;
        height: 10rem;
      }
      .hosp-card{
        width: 15rem;
      }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div id="div"> Search for Hospitals: <input type="text" placeholder="norvic, neuro, kmc, bir, civil, eye hospital" class="inp">
        <div class="flex" id="cross" hidden><i class="fa-solid fa-xmark"></i></div>

    </div>
    <div class="hospital-div flex">
    </div>

    <script>
        let inp = document.querySelector(".inp");
        let cross = document.querySelector("#cross");
        cross.addEventListener("click", function(){
            inp.value='';
            cross.style.display="none";

        })

        inp.addEventListener("input", function(e){
            if(e.target.value===""){
                cross.style.display='none';
            }else{
cross.style.display='flex';

            }
        })

        let hospitalDiv = document.querySelector(".hospital-div");


    const hospitals = [
  { name: "Kathmandu Cancer Care Hospital - KCCH", image: "../public/images/ktm-cancer-center.jpg" },
  { name: "Frontline Hospital", image: "../public/images/frontline.jpg" },
  { name: "Nepal Eye Hospital", image: "../public/images/nepal-eye.jpg" },
  { name: "Patan Mental Hospital", image: "../public/images/patan-mental.jpg" },
  { name: "Star Hospital", image: "../public/images/star.jpg" },
  { name: "Vayodha Hospital", image: "../public/images/vayodha.jpg" },
  { name: "Norvic Hospital", image: "../public/images/norvic.jpg" },
  { name: "Neuro Hospital", image: "../public/images/neuro.jpg" },
  { name: "Norvic Hospital", image: "../public/images/norvic.jpg" },
  { name: "Kmc Hospital", image: "../public/images/kmc.jpg" },
  { name: "Green City Hospital", image: "../public/images/green-city.jpg" },
  { name: "Civil Hospital", image: "../public/images/civil.jpg" },
  { name: "Bharosa Hospital", image: "../public/images/bharosa.jpg" },
  { name: "Ent Hospital", image: "../public/images/ent.jpg" },
  { name: "Bhaktapur Cancer Hospital", image: "../public/images/bhaktapur-cancer.jpg" },
  { name: "Everest Hospital", image: "../public/images/everest.jpg" },
];

hospitals.forEach(hosp => {
    let hospCard = `
    <div class="hosp-card">
    <div class="hosp-img-div">
        <img class="hosp-img" src="${hosp.image}" alt="${hosp.name}">
    </div>
    <h3 class="hosp-name">${hosp.name}</h3>
</div>
    `;

    hospitalDiv.innerHTML += hospCard;
});
let originalHospital = hospitalDiv.innerHTML;

inp.addEventListener("input", function(e){
    if(e.target.value===""){
        cross.style.display='none';
    }

})
    </script>
</body>

</html>