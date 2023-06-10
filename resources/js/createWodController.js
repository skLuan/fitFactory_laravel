function setActiveButton(e, button) {
    e.preventDefault();

    let buttons = document.querySelectorAll('button[name="btn-type"]');
    buttons.forEach((btn) => {
        if (
            !btn.classList.contains("bg-ffGreen") &&
            !btn.classList.contains("text-ffGreen-black")
        )
            return;

        btn.classList.remove("bg-ffGreen", "text-ffGreen-black");
    });
    // buttons.classlist.add('bg-ffGreen', 'text-ffGreen-black');
    button.classList.add("bg-ffGreen", "text-ffGreen-black");
    var requestField = document.querySelector(`#typeEntreno`);
    requestField.value = button.value;
}

function settingWodName() {
    const inputWodName = document.querySelector("#WodName");
    const renderWodName = document.querySelector("#renderWodName");
    const realWodName = document.querySelector("#realWodName");
    console.log(realWodName);
    inputWodName.addEventListener("input", () => {
        renderWodName.textContent = inputWodName.value;
        realWodName.value = inputWodName.value;
        if(renderWodName.textContent == '') renderWodName.textContent = 'Nombre del wod';
    });
}
settingWodName();
