function showModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('show');
    }
}

function closeModal(modal) {
    if (modal) {
        modal.classList.remove('show');
    }
}

// Add event listeners to images with data-modal attribute
const images = document.querySelectorAll('img[data-modal]');
images.forEach(img => {
    img.addEventListener('click', () => {
        const modalId = img.getAttribute('data-modal');
        showModal(modalId);
    });
});

// Add event listeners to all close buttons
const closeButtons = document.querySelectorAll('.close-modal-btn');
closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal');
        closeModal(modal);
    });
});