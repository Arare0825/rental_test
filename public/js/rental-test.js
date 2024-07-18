document.addEventListener('DOMContentLoaded', function () {
  // モーダル外クリックで閉じるイベントリスナー
  document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target.classList.contains('modal')) {
        closeModal(modal.id);
      }
    });
  });

  // confirmModalの設定
  const confirmModal = document.getElementById('confirmModal');
  if (confirmModal) {
    confirmModal.addEventListener('keydown', handleModalKeyDown);

    const danger2Button = confirmModal.querySelector('.btn-danger2');
    if (danger2Button) {
      danger2Button.addEventListener('click', () => {
        openCompleteModal();
        closeModal('confirmModal');
      });
    }

    const closeButtons = confirmModal.querySelectorAll('.btn-close, .btn-danger3');
    closeButtons.forEach(button => {
      button.addEventListener('click', () => {
        closeModal('confirmModal');
        closeModal('completeModal');
      });
    });
  }

  // completeModalの設定
  const completeModal = document.getElementById('completeModal');
  if (completeModal) {
    completeModal.addEventListener('keydown', handleModalKeyDown);

    // completeModalのすべてのボタンにクリックイベントを追加
    const completeModalButtons = completeModal.querySelectorAll('button');
    completeModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        closeModal('completeModal');
      });
    });
  }
});

// モーダル内のタブキー処理
function handleModalKeyDown(e) {
  if (e.key === 'Tab') {
    const modal = e.currentTarget;
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
}

// モーダルを開く関数
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'block';
  }
}

// モーダルを閉じる関数
function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'none';
  }
}

function openConfirmModal(button) {
  const modal = document.getElementById('confirmModal');
  const selectedItem = document.getElementById('selectedItem');
  // selectedItem.innerText = button.innerText;
  openModal('confirmModal');
  setTimeout(() => {
    modal.querySelector('.btn-danger2').focus();
  }, 100);  // 少し遅らせてフォーカスを設定
}

function openCompleteModal() {
  const modal = document.getElementById('completeModal');
  openModal('completeModal');
  setTimeout(() => {
    modal.querySelector('.btn-danger3').focus();
  }, 100);  // 少し遅らせてフォーカスを設定
}
