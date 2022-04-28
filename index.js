function addFlexDisplayOnChildren(element) {
    for (let i = 0; i < element.children.length; i++) {
        const child = element.children[i];
        child.style["display"] = "flex";
    }
}

function switchDetailedActivities() {
    const locaCont = document.getElementById("detailed-activities-locations-container");
    const typeCont = document.getElementById("detailed-activities-type-container");
    const title = document.getElementById("detailed-activities-title")
    if (locaCont.children[0].classList.contains("invisible")) {
        for (let i = 0; i < locaCont.children.length; i++) {
            locaCont.children[i].classList.remove("invisible");
            locaCont.children[i].classList.add("visible");
        }
        for (let i = 0; i < typeCont.children.length; i++) {
            typeCont.children[i].classList.remove("visible");
            typeCont.children[i].classList.add("invisible");
            typeCont.children[i].addEventListener("animationend", () => {
                typeCont.children[i].style["display"] = "none";
                if (i===0) {
                    addFlexDisplayOnChildren(locaCont);
                }
            }, { once: true});
        }
        title.innerHTML = "Locations";
    } else {
        for (let i = 0; i < typeCont.children.length; i++) {
            typeCont.children[i].classList.remove("invisible");
            typeCont.children[i].classList.add("visible");
        }
        for (let i = 0; i < locaCont.children.length; i++) {
            locaCont.children[i].classList.remove("visible");
            locaCont.children[i].classList.add("invisible");
            locaCont.children[i].addEventListener("animationend", () => {
                locaCont.children[i].style["display"] = "none";
                if (i===0) {
                    addFlexDisplayOnChildren(typeCont);
                }
            }, { once: true});
        }
        title.innerHTML = "Types";
    }
}