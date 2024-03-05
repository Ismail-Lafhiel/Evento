import './bootstrap';
import 'flowbite';

// load Create button
document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById('createBtn').click();
});

// create
// prevent submitting untill the everything is correct
document.addEventListener('DOMContentLoaded', function () {
    const roleForm = document.getElementById('roleForm');

    roleForm.addEventListener('submit', function (event) {
        const nameInput = document.getElementById('name');

        if (nameInput.value.trim() === '') {
            event.preventDefault();

            const errorElement = document.getElementById('outlined_error_help');
            errorElement.innerHTML = '<span class="font-medium">Oh, snapp!</span> The name field is required.';
            errorElement.style.display = 'block';
        } else if (nameInput.value.trim().length < 3) {
            event.preventDefault();

            const errorElement = document.getElementById('outlined_error_help');
            errorElement.innerHTML = '<span class="font-medium">Oh, snapp!</span> The name must be at least 3 characters long.';
            errorElement.style.display = 'block';
        } else {
            const errorElement = document.getElementById('outlined_error_help');
            errorElement.innerHTML = '';
            errorElement.style.display = 'none';
        }
    });
});

// delete role
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('[data-modal-target="deleteModal"]');
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const deleteRecordIdInput = document.getElementById('deleteRecordId');
    const deleteConfirmButton = deleteModal.querySelector('.delete-confirm-button');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const recordId = button.getAttribute('data-record-id');
            const deleteAction = button.getAttribute('data-action');

            deleteForm.action = deleteAction;
            deleteRecordIdInput.value = recordId;

            deleteModal.classList.remove('hidden');
        });
    });

    deleteForm.addEventListener('submit', function (e) {
        e.preventDefault();

        fetch(deleteForm.action, {
            method: 'POST',
            body: new FormData(deleteForm),
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    console.log(data.message);

                    const successMessage = document.getElementById('successMessage');
                    if (successMessage) {
                        successMessage.innerText = data.message;
                    }

                    location.reload();
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error deleting record:', error.message);
            })
            .finally(() => {
                deleteModal.classList.add('hidden');
            });
    });
});

