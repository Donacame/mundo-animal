// VALIDACIONES DEL FORMULARIO
document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    if (!form) return; // Evita errores si no hay formulario

    form.addEventListener("submit", (e) => {

        let errores = [];

        // Campos
        const nombreAnimal = document.querySelector("input[name='nombre_animal']");
        const tipo = document.querySelector("select[name='tipo']");
        const otroTipo = document.querySelector("input[name='otro_tipo']");
        const edad = document.querySelector("input[name='edad']");
        const color = document.querySelector("input[name='color']");
        const nombreDueno = document.querySelector("input[name='nombre_dueno']");
        const telefono = document.querySelector("input[name='telefono']");
        const correo = document.querySelector("input[name='correo']");
        const direccion = document.querySelector("input[name='direccion']");

        // Validación nombre animal
        if (!nombreAnimal || nombreAnimal.value.trim() === "") {
            errores.push("El nombre del animal es obligatorio.");
        }

        // Validación tipo
        if (!tipo || tipo.value === "") {
            errores.push("Debe seleccionar un tipo de animal.");
        }

        // Validación "otro tipo"
        if (tipo && tipo.value === "Otro") {
            if (!otroTipo || otroTipo.value.trim() === "") {
                errores.push("Debe especificar el tipo de animal.");
            }
        }

        // Validación edad
        if (!edad || edad.value === "" || edad.value < 0) {
            errores.push("La edad debe ser un número válido.");
        }

        // Validación color
        if (!color || color.value.trim() === "") {
            errores.push("El color es obligatorio.");
        }

        // Validación nombre dueño
        if (!nombreDueno || nombreDueno.value.trim() === "") {
            errores.push("El nombre del dueño es obligatorio.");
        }

        // Validación teléfono (solo números)
        if (!telefono || telefono.value.trim() === "") {
            errores.push("El teléfono es obligatorio.");
        } else if (!/^[0-9]+$/.test(telefono.value)) {
            errores.push("El teléfono solo debe contener números.");
        }

        // Validación correo
        if (!correo || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo.value)) {
            errores.push("Debe ingresar un correo válido.");
        }

        // Validación dirección
        if (!direccion || direccion.value.trim() === "") {
            errores.push("La dirección es obligatoria.");
        }

        // Si hay errores, detener envío
        if (errores.length > 0) {
            e.preventDefault();
            alert("Corrige lo siguiente:\n\n" + errores.join("\n"));
        }
    });

});
