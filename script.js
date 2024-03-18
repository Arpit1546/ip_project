window.onload = function() {
    document.getElementById("ap").play();
}

function locomotiveScroll(){
    gsap.registerPlugin(ScrollTrigger);


// --- SETUP START ---
// Using Locomotive Scroll from Locomotive https://github.com/locomotivemtl/locomotive-scroll
const locoScroll = new LocomotiveScroll({
  el: document.querySelector("#main"),
  smooth: true
});
// each time Locomotive Scroll updates, tell ScrollTrigger to update too (sync positioning)
locoScroll.on("scroll", ScrollTrigger.update);

// tell ScrollTrigger to use these proxy methods for the "#main" element since Locomotive Scroll is hijacking things
ScrollTrigger.scrollerProxy("#main", {
  scrollTop(value) {
    return arguments.length ? locoScroll.scrollTo(value, {duration: 0, disableLerp: true}) : locoScroll.scroll.instance.scroll.y;
  }, // we don't have to define a scrollLeft because we're only scrolling vertically.
  getBoundingClientRect() {
    return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
  },
  // LocomotiveScroll handles things completely differently on mobile devices - it doesn't even transform the container at all! So to get the correct behavior and avoid jitters, we should pin things with position: fixed on mobile. We sense it by checking to see if there's a transform applied to the container (the LocomotiveScroll-controlled element).
  pinType: document.querySelector("#main").style.transform ? "transform" : "fixed"
});

// each time the window updates, we should refresh ScrollTrigger and then update LocomotiveScroll. 
ScrollTrigger.addEventListener("refresh", () => locoScroll.update());
ScrollTrigger.defaults({ scroller: "#main" });
// --- SETUP END ---




// after everything is set up, refresh() ScrollTrigger and update LocomotiveScroll because padding may have been added for pinning, etc.
ScrollTrigger.refresh();

}
locomotiveScroll()

function kmEffect(){
    var knowText = document.querySelector("#knowwtext")
var km = document.querySelector("#km")

knowText.addEventListener("mousemove",function(val) {
gsap.to(km , {
    x:val.x,
    y:val.y
})

})


knowText.addEventListener("mouseenter",function(val) {
    gsap.to(km , {
        scale:1,
        opacity:1
    })
})

knowText.addEventListener("mouseleave",function(val) {
    gsap.to(km , {
        scale:0,
        opacity:0
    })
})
}

kmEffect();


var km = document.querySelector("#km");

km.addEventListener("click", function() {
    window.location.href = "about.html";
});

function nextAnim(){
    gsap.from(".elem h1" , {
        y:120,
        stagger: 0.25,
        duration:1 ,
        ScrollTrigger: {
            trigger: "#next" , 
            scroller: "#main",
            start: "top 40%",
            end: "top 37%",
            markers :true ,
            scrub:2
        }

    })
}
nextAnim()


