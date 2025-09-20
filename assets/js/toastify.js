// Toast persistente indicando "Sitio en desarrollo"
Toastify({
    text: "Este sitio web esta aun en desarrollo constante, \npor lo que algunas funciones pueden no estar disponibles.",
    duration: 5000, // persistente
    close: true,
    gravity: "top", // top o bottom
    position: "right", // left, center, right
    style: {
        background: "#f39c12",
        color: "#fff",
        fontWeight: "bold",
        fontSize: "14px"
    }
}).showToast();
