// export default {
//   mounted() {
//     window.addEventListener("scroll", this.handleScroll);
//   },
//   beforeDestroy() {
//     window.removeEventListener("scroll", this.handleScroll);
//   },
//   methods: {
//     handleScroll() {
//       const navbar = document.querySelector("nav");
//       if (window.scrollY > 50) {
//         navbar.classList.add("shrunk");
//       } else {
//         navbar.classList.remove("shrunk");
//       }
//     },
//   },
// };


document.addEventListener("scroll", function() {
    const navbar = document.querySelector("nav");
    if (window.scrollY > 50) {
        navbar.classList.add("shrunk");
    } else {
        navbar.classList.remove("shrunk");
    }
});