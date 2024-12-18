$(document).ready(function () {
    $('#addRow').click(function () {
        const newRow = `
            <tr>
                <td><input type="text" name="subjectCode[]" required></td>
                <td><input type="text" name="subjectName[]" required></td>
                <td><input type="text" name="status[]" required></td>
            </tr>`;
        $('.subject-table tbody').append(newRow);
    });
});