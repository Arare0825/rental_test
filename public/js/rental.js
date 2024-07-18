
// ----------ここまで----------

document.addEventListener('DOMContentLoaded', function () {
  const modal = document.querySelector('#confirmModal');

  modal.addEventListener('keydown', function (e) {
    if (e.key === 'Tab') {
      const focusableElements = 'button, [href], input';
      const focusableContent = modal.querySelectorAll(focusableElements);
      const firstFocusableElement = focusableContent[0];
      const lastFocusableElement = focusableContent[focusableContent.length - 1];

      if (e.shiftKey) { // Shift + Tab
        if (document.activeElement === firstFocusableElement) {
          lastFocusableElement.focus();
          e.preventDefault();
        }
      } else { // Tab
        if (document.activeElement === lastFocusableElement) {
          firstFocusableElement.focus();
          e.preventDefault();
        }
      }
    }
  });

  // confirmModalのcloseボタンとdanger3ボタンを選択
  const closeButtons = document.querySelectorAll('#confirmModal .btn-close, #confirmModal .btn-danger3');
  
  closeButtons.forEach(button => {
    button.addEventListener('click', () => {
      closeModal('confirmModal');
      closeModal('completeModal');  // confirmModalも閉じる
    });
  });

  // danger2ボタンのイベントリスナー
  const danger2Button = document.querySelector('#confirmModal .btn-danger2');
  
  if (danger2Button) {
    danger2Button.addEventListener('click', () => {
      openModal('completeModal');
      closeModal('confirmModal');
    });
  }
});


function openConfirmModal(button) {
  const modal = document.getElementById('confirmModal');
  const selectedItem = document.getElementById('selectedItem');
  selectedItem.innerText = button.innerText;
  modal.style.display = 'block';
  setTimeout(() => {
    modal.querySelector('.btn-danger2').focus();
  }, 100);  // 少し遅らせてフォーカスを設定
}

// openCompleteModal関数の定義
function openCompleteModal() {
  const modal = document.getElementById('completeModal');
  modal.style.display = 'block';
  setTimeout(() => {
    modal.querySelector('.btn-danger3').focus();
  }, 100);  // 少し遅らせてフォーカスを設定
}


function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  var qnt = document.getElementById("qnt").value;
  qnt.innerText = 1;
  console.log(qnt)

  modal.style.display = 'none';
}

function openModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = 'block';
}
