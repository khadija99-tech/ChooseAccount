// Handle Phase Button Clicks
const phaseButtons = document.querySelectorAll('.phase');
phaseButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    phaseButtons.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    updateTable(); 
  });
});

// Handle Amount Button Clicks
const amountButtons = document.querySelectorAll('.amounts button');
amountButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    amountButtons.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    updateTable(); 
  });
});

// Simple content changer logic 
function updateTable() {
  const selectedPhase = document.querySelector('.phase.active')?.textContent.trim();
  const selectedAmount = document.querySelector('.amounts button.active')?.textContent.trim();

  const table = document.querySelector('.table-wrapper table');

  if (!selectedPhase || !selectedAmount || !table) return;

  // Example: Change Price cell dynamically
  const priceCell = table.querySelector('tbody tr:first-child td:nth-child(2)');
  if (priceCell) {
    if (selectedAmount === '$100k') {
      priceCell.textContent = selectedPhase.includes('One') ? '$549' : '$599';
    } else if (selectedAmount === '$10k') {
      priceCell.textContent = selectedPhase.includes('One') ? '$99' : '$129';
    } else {
      priceCell.textContent = '$---'; // Default value
    }
  }
 
  const phaseRow = table.querySelector('tbody tr:first-child td:nth-child(2)');
  if (phaseRow) {
    if (selectedAmount === '$100k') {
      phaseRow.textContent = selectedPhase.includes('One') ? '$509' : '$1.599';
    } else if (selectedAmount === '$10k') {
      phaseRow.textContent = selectedPhase.includes('One') ? '$989' : '$29';
    } else {
      phaseRow.textContent = '$---'; // Default value
    }
  }
  
}
const showMoreBtn = document.querySelector('.show-more');
let isExpanded = false;

showMoreBtn.addEventListener('click', () => {
  const extraRows = document.querySelectorAll('.table-wrapper table .extra');

  extraRows.forEach(row => {
    row.classList.toggle('hidden');
  });

  // Toggle button text
  isExpanded = !isExpanded;
  showMoreBtn.textContent = isExpanded ? 'Show Less Conditions' : 'Show More Conditions';
});

