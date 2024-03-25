function anim() {
    var elemC = document.querySelector("#main-ele");
    var fixedImage = document.querySelector("#fix-div");

    elemC.addEventListener("mouseenter", function () {
        fixedImage.style.display = "block";
    });

    elemC.addEventListener("mouseleave", function () {
        fixedImage.style.display = "none";
    });

    var elems = document.querySelectorAll(".elem");

    elems.forEach(function (e) {
        e.addEventListener("mouseenter", function () {
            var paragraphText = e.getAttribute("data-paragraph");
            fixedImage.innerHTML = "<p>" + paragraphText + "</p>";
        });

        e.addEventListener("mouseleave", function () {
            fixedImage.innerHTML = "";
        });
    });
}

anim();
