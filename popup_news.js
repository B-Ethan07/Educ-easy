
function afficherPopup() {
    let popupBackground = document.querySelector(".popupBackground")
    popupBackground.style.display = "flex";
}

function cacherPopup() {
    let popupBackground = document.querySelector(".popupBackground")
    popupBackground.style.display = "none"
}

function initAddEventListenerPopup() {
    let btnPartage = document.querySelector("#btnPartagee")
    let btnQuit = document.querySelector("#quit")
    btnPartage.addEventListener("click", () => {
        console.log('bouton cliquer')
        afficherPopup()
    })

    btnQuit.addEventListener("click", () => {
            cacherPopup()
        }
    )
}
initAddEventListenerPopup()

