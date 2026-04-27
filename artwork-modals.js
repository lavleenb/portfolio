const pic = document.getElementById('myImg')
const btn = document.getElementById('close-modal-btn');
/* TODO: brute force all the modals tbh */
const modals = document.querySelectorAll('#ariModal', '#charliModal', '#glitzySabrinaModal');
modals.forEach(modal => {
    pic.addEventListener('click', function() {
        showModal(modal);
    })
    btn.addEventListener('click', function() {
        closeModal(modal);
    })
});

function showModal(input){
  if(input){
    input.style.display == 'flex';
  }
}

function closeModal(input){
  if(input){
    input.style.display == 'none';
  }
}
/* if (pic) {
    pic.addEventListener('click', function(){
        showModal()
    }, false);
}
if (btn) {
    btn.addEventListener('click', closeModal, false);
} */