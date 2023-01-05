const modal = document.querySelector("#modal");
modal.classList.add("cacher");

const btn_modal = document.querySelectorAll(".btn_modal");
console.log(btn_modal);
for (let i = 0; i < btn_modal.length; i++) {
  btn_modal[i].addEventListener("click", function () {
    modal.classList.toggle("cacher");
  });
}
//   e.preventDefault;
