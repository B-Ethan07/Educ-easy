
function afficherPopup() {
    let popupBackground = document.querySelector(".popupBackground")
    popupBackground.style.display="flex"
}

function cacherPopup() {
    let popupBackground = document.querySelector(".popupBackground")
    popupBackground.style.display="none"
}


function initAddEventListenerPopup() {
    let btnPartage = document.getElementById("btnPartagee")
    let popupBackground = document.querySelector(".popupBackground")
    btnPartage.addEventListener("click", () => {
        console.log('bouton cliquer')
        afficherPopup()
    })

    popupBackground.addEventListener("click", (event) => {
        if (event.target === popupBackground) {
            cacherPopup()
        }
    })
}

