// ajouter une quantité
let prodDs = document.querySelectorAll("#card-det");
prodDs.forEach((prodD) => {
  prodD.addEventListener("click", (e) => {
    e.stopPropagation();
    id = e.target.getAttribute("data-id");
    console.log(id);
  });
});
