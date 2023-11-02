(function () {
  // Inisialisasi Snow Theme Quill Editor
  const snowEditor = new Quill('#snow-editor', {
    modules: {
      formula: true,
      toolbar: '#snow-toolbar'
    },
    theme: 'snow'
  });

  // Event listener untuk setiap perubahan (keyup) pada editor Quill
  snowEditor.on('text-change', function () {
    // Mengambil konten saat ini dari editor Quill
    var editorContent = snowEditor.root.innerHTML;

    // Mengisi nilai elemen input dengan konten dari editor
    document.querySelector('#content').value = editorContent;
  });

  // Event listener untuk form submission
  var form = document.querySelector('form');
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    // Mengambil konten saat ini dari editor Quill dan mengisinya ke input sebelum mengirimkan form
    var editorContent = snowEditor.root.innerHTML;
    document.querySelector('#content').value = editorContent;
    this.submit();
  });
})();
