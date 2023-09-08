function addNewInput() {
    var sizeContainer = document.getElementById('sizeContainer');
    var size = prompt('Vui lòng điền size cần thêm:');
    if (!size || isNaN(size)) {
        alert('Sai định dạng, vui lòng điền giá trị là số');
        return;
    }

    const labels = sizeContainer.querySelectorAll('label');
    let check = false;

    for (let i = 0; i < labels.length; i++) {
        const label = labels[i];
        if (label.textContent.trim() === 'Size ' + size) {
            alert('Size đã tồn tại!');
            check = true; // Sửa thành check = true;
            break; // Thêm lệnh break để thoát khỏi vòng lặp khi đã tìm thấy
        }
    }

    if (!check) {
        var newCol = document.createElement('div');
        newCol.classList.add('col');

        var newSizeLabel = document.createElement('label');
        newSizeLabel.classList.add('form-label');
        newSizeLabel.textContent = 'Size ' + size;
        newSizeLabel.contentEditable = true;

        var newInput = document.createElement('input');
        newInput.type = 'number';
        newInput.classList.add('form-control');
        newInput.name = 'size[' + size + ']';
        newInput.placeholder = 'Ví dụ: 10';

        // Create a button to remove the input
        var removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-sm', 'btn-danger', 'float-end');
        removeButton.textContent = '-';
        removeButton.onclick = function() {
            sizeContainer.removeChild(newCol);
        };

        // Create a div to hold the label and the delete button
        var labelDiv = document.createElement('div');
        labelDiv.appendChild(newSizeLabel);
        labelDiv.appendChild(removeButton);

        // Append the new elements to the container
        newCol.appendChild(labelDiv);
        newCol.appendChild(newInput);

        if (size < 39) {
            sizeContainer.insertBefore(newCol, sizeContainer.firstElementChild);
        } else {
            sizeContainer.insertBefore(newCol, sizeContainer.lastElementChild);
        }
    }

}
