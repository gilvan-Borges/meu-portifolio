


    const btnLigth = document.querySelector("#tema-light");
    const btnDark = document.querySelector("#tema-dark");
    const temaUso = document.querySelector("#tema-uso");



    function temaEscolhido(tema) {
        document.body.classList.remove("tema-light", "tema-dark");
        document.body.classList.add(`tema-${tema}`);

 
        if (tema === "dark") {
            temaUso.innerHTML = '<img src="img/lua.svg" alt="">'; 
        } else {
            temaUso.innerHTML = '<img src="img/sol.svg" alt="">'; 
        }
    }

    btnLigth.addEventListener("click", () =>        temaEscolhido("light"));
    btnDark.addEventListener("click", () =>     temaEscolhido("dark"));

    const savedTheme = localStorage.getItem("tema") || "light";
    temaEscolhido(savedTheme);

    btnLigth.addEventListener("click", function() {
        temaEscolhido("light");
        localStorage.setItem("tema", "light");
    });

    btnDark.addEventListener("click", function() {
        temaEscolhido("dark");
        localStorage.setItem("tema", "dark");
    });

