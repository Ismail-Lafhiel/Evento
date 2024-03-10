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

// delete functionality
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

// search events

$(document).ready(function () {
    const searchForm = $('#searchForm');
    const searchInput = $('#search-dropdown');
    const categoryDropdown = $('#category-dropdown');
    const eventGrid = $('#eventGrid');
    const searchResultsContainer = $('#searchResults');
    const searchUrl = searchForm.data('url');

    function performSearch() {
        const name = searchInput.val().trim();
        const category = categoryDropdown.val();

        $.ajax({
            url: searchUrl,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: { name: name, category: category },
            dataType: 'json',
            success: function (data) {
                // Always hide the eventGrid when performing a search
                eventGrid.hide();

                // Clear existing results before appending new ones
                searchResultsContainer.html('');

                if (data.length > 0) {
                    data.forEach(event => {
                        const resultHtml = `
                            <div onclick="window.location.href = '${searchUrl}/event/${event.id}'"
                                class="bg-gradient-to-b cursor-pointer from-primary-800 to-primary-600 text-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                                <img src="storage/${event.event_img}" alt="${event.title}"
                                    class="w-full h-64 object-cover" />
                                <div class="p-6">
                                    <h3 class="text-2xl font-semibold mb-2 capitalize">${event.title}</h3>
                                    <p class="text-sm opacity-75 capitalize truncate">${event.description}</p>
                                    <a href="${searchUrl}/event/${event.id}"
                                        class="mt-4 inline-block text-blue-200 text-sm hover:underline">Discover</a>
                                </div>
                            </div>
                        `;

                        searchResultsContainer.append(resultHtml);
                    });
                } else {
                    searchResultsContainer.html('<p>No results found</p>');
                }
            },
            error: function (error) {
                console.error('Error fetching search results:', error);
            }
        });
    }

    searchInput.on('input', performSearch);
    categoryDropdown.on('change', performSearch);

    searchForm.on('submit', function (event) {
        event.preventDefault();
    });
});
