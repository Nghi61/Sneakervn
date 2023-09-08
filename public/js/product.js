const checkboxes = document.querySelectorAll('.category-checkbox');
let selectedCount = 0;

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            if (selectedCount < 2) {
                selectedCount++;
            } else {
                this.checked = false;
            }
        } else {
            selectedCount--;
        }
    });
});
const checkboxes1 = document.querySelectorAll('.size-checkbox');
let selectedCount1 = 0;

checkboxes1.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            if (selectedCount1 < 1) {
                selectedCount1++;
            } else {
                this.checked = false;
            }
        } else {
            selectedCount1--;
        }
    });
});
const checkboxes2 = document.querySelectorAll('.price-checkbox');
let selectedCount2 = 0;

checkboxes2.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            if (selectedCount2 < 1) {
                selectedCount2++;
            } else {
                this.checked = false;
            }
        } else {
            selectedCount2--;
        }
    });
});
