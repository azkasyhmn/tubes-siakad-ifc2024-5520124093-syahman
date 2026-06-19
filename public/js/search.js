/**
 * @param {string} inputId
 * @param {string} tableId
 * @param {Array}  columns
 */
function initSearch(inputId, tableId, columns = []) {
    const input = document.getElementById(inputId);
    const table = document.getElementById(tableId);

    if (!input || !table) return;

    input.addEventListener('keyup', function () {
        const keyword = this.value.toLowerCase().trim();
        const rows    = table.querySelectorAll('tbody tr');
        let   visible = 0;

        rows.forEach(row => {
            if (row.classList.contains('no-data')) return;

            const cells = row.querySelectorAll('td');
            let match   = false;

            cells.forEach((cell, index) => {
                if (columns.length === 0 || columns.includes(index)) {
                    if (cell.textContent.toLowerCase().includes(keyword)) {
                        match = true;
                    }
                }
            });

            row.style.display = match ? '' : 'none';
            if (match) visible++;
        });

        let emptyRow = table.querySelector('tbody tr.no-result');
        if (visible === 0 && keyword !== '') {
            if (!emptyRow) {
                emptyRow = document.createElement('tr');
                emptyRow.classList.add('no-result');
                emptyRow.innerHTML = `
                    <td colspan="10" class="text-center text-muted py-3">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                        Tidak ada data yang cocok dengan "<strong>${keyword}</strong>"
                    </td>`;
                table.querySelector('tbody').appendChild(emptyRow);
            } else {
                emptyRow.style.display = '';
                emptyRow.querySelector('strong').textContent = keyword;
            }
        } else if (emptyRow) {
            emptyRow.style.display = 'none';
        }
    });
}