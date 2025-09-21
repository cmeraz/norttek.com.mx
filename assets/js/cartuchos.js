// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Botón y input para foto
    const fotoBtn = document.getElementById('fotoBtn');
    const fotoInput = document.getElementById('fotoInput');
    const buscador = document.getElementById('buscador');

    if (fotoBtn && fotoInput && buscador) {
        fotoBtn.addEventListener('click', () => {
            fotoInput.click();
        });

        fotoInput.addEventListener('change', async function() {
            if (!this.files || !this.files[0]) return;
            const file = this.files[0];

            buscador.value = "Analizando imagen...";
            buscador.disabled = true;

            // Procesar imagen con Tesseract.js (español + inglés)
            const { data: { text } } = await Tesseract.recognize(
                file,
                'spa+eng',
                { logger: m => console.log(m) }
            );

            // Procesar línea por línea
            const lines = text.split('\n').map(l => l.trim()).filter(l => l.length > 0);

            // Palabras clave típicas de modelos
            const keywords = ['LASERJET', 'DESKJET', 'OFFICEJET', 'MFP', 'ENVY', 'ECOSYS', 'WORKFORCE', 'PIXMA', 'BROTHER', 'HP', 'SAMSUNG', 'KYOCERA', 'XEROX', 'CANON', 'EPSON'];
            const blacklist = ['IMPRESORA', 'PRINTER', 'SERIE', 'MODEL', 'MODELO'];

            // Buscar líneas candidatas
            let candidatos = lines.filter(line =>
                /\d/.test(line) && // debe tener número
                !blacklist.some(b => line.toUpperCase().includes(b)) &&
                line.length > 6
            );

            // Prioriza líneas con palabras clave de modelo
            let modelos = candidatos.filter(line =>
                keywords.some(k => line.toUpperCase().includes(k))
            );

            // Si no hay, usa los candidatos generales
            if (modelos.length === 0) modelos = candidatos;

            // Si sigue sin haber, usa la primera línea con número
            if (modelos.length === 0) {
                modelos = lines.filter(line => /\d/.test(line));
            }

            // Si hay varias opciones, pregunta al usuario
            let modelo = '';
            if (modelos.length === 1) {
                modelo = modelos[0];
            } else if (modelos.length > 1) {
                modelo = window.prompt(
                    "Se detectaron varios posibles modelos. Elige o corrige el modelo de tu impresora:",
                    modelos.join(' / ')
                ) || modelos[0];
            } else {
                modelo = text.trim().split('\n')[0];
            }

            buscador.value = modelo.trim();
            buscador.disabled = false;
            buscador.dispatchEvent(new Event('input'));
        });
    }
});