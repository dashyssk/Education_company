function initializeColorPicker() {
    $("#colorPicker").spectrum({
        preferredFormat: "hex",
        showInput: true,
        showAlpha: true,
        color: "#D8E5F8",
        showPalette: true,
        showSelectionPalette: true,
        palette: [],
        localStorageKey: "spectrum.homepage",
        chooseText: "Підтвердити",
        cancelText: "Відміна",
        change: function (color) {
            let newColor = color.toHexString();
            let panel = document.getElementById("panel");
            panel.style.backgroundColor = newColor;

            document.cookie = "bg_color=" + newColor;
        }
    });
}

initializeColorPicker();