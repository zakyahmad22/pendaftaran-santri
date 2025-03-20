document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const tableRows = document.querySelectorAll("#dataTable tr");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();

        tableRows.forEach((row) => {
            const nameCell = row.querySelector("td:nth-child(2)"); // Kolom Nama Lengkap
            if (nameCell) {
                const nameText = nameCell.textContent.toLowerCase();
                row.style.display = nameText.includes(searchTerm) ? "" : "none";
            }
        });
    });
});
